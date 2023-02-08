<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Video;

class VideoManagementController extends Controller
{
    public function indexVideo()
    {
        $video = Video::paginate(6);
        return view('admin.VideoManagement.index', compact('video'));
    }
    public function addVideo()
    {
        return view('admin.VideoManagement.create');
    }

    public function storeVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable',
            'link' => 'required|url',

        ]);
        try {
            $video = new Video();
            $video->title = $request->title;
            $video->description = $request->description;
            $video->link = $request->link;
            $video->slug = Str::slug($request->title);
            // dd($video);
            $video->save();
            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteVideo($id)
    {
        try {
            $video = Video::where('id', $id)->first();

            $video->delete();

            return redirect()
                ->back()
                ->with('message', ' Delete Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editVideo($id)
    {
        $video = Video::where('id', $id)->first();
        return view('admin.VideoManagement.edit', compact('video'));
    }

    public function updateVideo(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable',
            'link' => 'required|url',

        ]);
        try {
            $video = Video::where('id', $id)->first();
            $video->title = $request->title;
            $video->description = $request->description;
            $video->link = $request->link;
            $video->slug = Str::slug($request->title);
            // dd($video);
            $video->update();
            return redirect()
                ->back()
                ->with('message', ' update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function changeStatusVideo(Request $request)
    {
        $video = Video::find($request->id);
        $video->status = $request->status;
        $video->save();
        return response()->json(['message' => 'Status change successfully.']);
    }
}
