<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Community;

class CommunityController extends Controller
{
    public function indexCommunity()
    {
        $community = Community::paginate(6);
        return view('admin.CMSPages.Community.index', compact('community'));
    }
    public function addCommunity()
    {
        return view('admin.CMSPages.Community.create');
    }
    public function storeCommunity(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable|min:5',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $community = new Community();
            $community->title = $request->title;
            $community->description = $request->description;
            $community->left_content = $request->left_content;
            $community->right_content = $request->right_content;
            $community->slug = Str::slug($request->title);
            // dd($community);
            $community->save();
            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteCommunity($id)
    {
        try {
            $community = Community::where('id', $id)->first();
            $community->delete();
            return redirect()
                ->back()
                ->with('message', ' Delete Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editCommunity($id)
    {
        $community = Community::where('id', $id)->first();
        return view('admin.CMSPages.Community.edit', compact('community'));
    }

    public function updateCommunity(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable|min:5',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $community = Community::where('id', $id)->first();
            $community->title = $request->title;
            $community->description = $request->description;
            $community->left_content = $request->left_content;
            $community->right_content = $request->right_content;
            $community->slug = Str::slug($request->title);
            // dd($community);
            $community->update();
            return redirect()
                ->back()
                ->with('message', ' update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function changeStatusCommunity(Request $request)
    {
        $community = Community::find($request->id);
        $community->status = $request->status;
        $community->save();
        return response()->json(['message' => 'Status change successfully.']);
    }


    public function searchCommunity(Request $request)
    {
        $community = Community::where(
            'description',
            'like',
            '%' . $request->search . '%'
        )
            ->orWhere('title', 'like', '%' . $request->search . '%')
            ->orWhere('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%')

            ->paginate(6);

        return view('admin.CMSPages.Community.index', compact('community'));
    }
}
