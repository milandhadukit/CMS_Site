<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function indexService()
    {
        $service = Service::paginate(6);
        return view('admin.CMSPages.Service.index', compact('service'));
    }

    public function addService()
    {
        return view('admin.CMSPages.Service.create');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $service = new Service();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->left_content = $request->left_content;
            $service->right_content = $request->right_content;
            $service->slug = Str::slug($request->title);

            if ($request->has('left_image')) {
                $leftImage = $request->left_image->getClientOriginalName();
                $fileNameLeft = pathinfo($leftImage, PATHINFO_FILENAME);
                $leftImageExtension = pathinfo($leftImage, PATHINFO_EXTENSION);
                $imageName1 =
                    $fileNameLeft . time() . '.' . $leftImageExtension;
                $nameImage1 = str_replace(' ', '_', $imageName1);
                $image = $request->left_image->move(
                    public_path('/Service_Image'),
                    $nameImage1
                );

                $service->left_image = $nameImage1;
            }

            if ($request->has('right_image')) {
                $rightImage = $request->right_image->getClientOriginalName();
                $filename = pathinfo($rightImage, PATHINFO_FILENAME);
                $rightImageExtension = pathinfo(
                    $rightImage,
                    PATHINFO_EXTENSION
                );

                $imageName2 = $filename . time() . '.' . $rightImageExtension;

                $nameImage2 = str_replace(' ', '_', $imageName2);
                $image = $request->right_image->move(
                    public_path('/Service_Image'),
                    $imageName2
                );

                $service->right_image = $nameImage2;
            }
            $service->save();
            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editService($slug)
    {
        $service = Service::where('slug', $slug)->first();
        return view('admin.CMSPages.Service.edit', compact('service'));
    }

    public function updateService(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $service = Service::where('slug', $slug)->first();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->left_content = $request->left_content;
            $service->right_content = $request->right_content;
            $service->slug = Str::slug($request->title);

            if ($request->has('left_image')) {
                $leftImage = $request->left_image->getClientOriginalName();
                $fileNameLeft = pathinfo($leftImage, PATHINFO_FILENAME);
                $leftImageExtension = pathinfo($leftImage, PATHINFO_EXTENSION);

                $path = public_path('Service_Image/' . $service->left_image);
                if (File::exists($path)) {
                    unlink($path);
                }

                $imageName1 =
                    $fileNameLeft . time() . '.' . $leftImageExtension;
                $nameImage1 = str_replace(' ', '_', $imageName1);
                $image = $request->left_image->move(
                    public_path('/Service_Image'),
                    $nameImage1
                );

                $service->left_image = $nameImage1;
            }

            if ($request->has('right_image')) {
                $rightImage = $request->right_image->getClientOriginalName();
                $filename = pathinfo($rightImage, PATHINFO_FILENAME);
                $rightImageExtension = pathinfo(
                    $rightImage,
                    PATHINFO_EXTENSION
                );

                $path = public_path('Service_Image/' . $service->right_image);
                if (File::exists($path)) {
                    unlink($path);
                }
                $imageName2 = $filename . time() . '.' . $rightImageExtension;
                $nameImage2 = str_replace(' ', '_', $imageName2);
                $image = $request->right_image->move(
                    public_path('/Service_Image'),
                    $imageName2
                );

                $service->right_image = $nameImage2;
            }

            $service->update();
            return redirect()
                ->back()
                ->with('message', ' Update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteService($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $service->delete();
    }

    public function changeStatusService(Request $request)
    {
        $service = Service::find($request->id);
        $service->status = $request->status;
        $service->save();
        return response()->json(['message' => 'Status change successfully.']);
    }

    public function searchService(Request $request)
    {
        $service = Service::where(
            'description',
            'like',
            '%' . $request->search . '%'
        )
            ->orWhere('title', 'like', '%' . $request->search . '%')
            ->orWhere('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%')

            ->paginate(6);

        return view('admin.CMSPages.Service.index', compact('service'));

        // if ($request->ajax()) {
        //     $output = '';
        //     $service = DB::table('services')
        //         ->where('description', 'LIKE', '%' . $request->search . '%')
        //         ->get();

        //     if ($service) {

        //         foreach ($service as $key => $data) {

        //            return $data;
        //             $output .=
        //                 '<tr>' .
        //                 '<td>' .
        //                 $data->title .
        //                 '</td>' .
        //                 '<td>' .
        //                 $data->description .
        //                 '</td>' .
        //                 '<td>' .
        //                 $data->description .
        //                 '</td>' .
        //                 '</tr>';
        //         }
        //         return Response($output);
        //     }
        // }
    }
}
