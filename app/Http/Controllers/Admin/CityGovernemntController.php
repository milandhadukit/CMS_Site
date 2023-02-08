<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\CityGovernment;

class CityGovernemntController extends Controller
{
    public function indexCity()
    {
        $cityGoverment = CityGovernment::paginate(6);
        return view(
            'admin.CMSPages.CityGovernment.index',
            compact('cityGoverment')
        );
    }
    public function addCity()
    {
        return view('admin.CMSPages.CityGovernment.create');
    }
    public function storeCity(Request $request)
    {
        $request->validate([
            'title_city' => 'required|min:2',
            'descreption_city' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $cityGoverment = new CityGovernment();
            $cityGoverment->title_city = $request->title_city;
            $cityGoverment->descreption_city = $request->descreption_city;
            $cityGoverment->left_content = $request->left_content;
            $cityGoverment->right_content = $request->right_content;
            $cityGoverment->slug = Str::slug($request->title_city);
            // dd($cityGoverment);
            $cityGoverment->save();

            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteCity($id)
    {
        try {
            $cityGoverment = CityGovernment::where('id', $id)->first();
            $cityGoverment->delete();
            return redirect()
                ->back()
                ->with('message', ' Delete Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function editCity($id)
    {
        $cityGoverment = CityGovernment::where('id', $id)->first();
        return view(
            'admin.CMSPages.CityGovernment.edit',
            compact('cityGoverment')
        );
    }
    public function updateCity(Request $request, $id)
    {
        $request->validate([
            'title_city' => 'required|min:2',
            'descreption_city' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $cityGoverment = CityGovernment::where('id', $id)->first();
            $cityGoverment->title_city = $request->title_city;
            $cityGoverment->descreption_city = $request->descreption_city;
            $cityGoverment->left_content = $request->left_content;
            $cityGoverment->right_content = $request->right_content;
            $cityGoverment->slug = Str::slug($request->title_city);
            // dd($cityGoverment);
            $cityGoverment->update();

            return redirect()
                ->back()
                ->with('message', ' update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function changeStatusCity(Request $request)
    {
        $cityGoverment = CityGovernment::find($request->id);
        $cityGoverment->status = $request->status;
        $cityGoverment->save();
        return response()->json(['message' => 'Status change successfully.']);
    }

    public function searchCity(Request $request)
    {
        $cityGoverment = CityGovernment::where(
            'descreption_city',
            'like',
            '%' . $request->search . '%'
        )
            ->orWhere('title_city', 'like', '%' . $request->search . '%')
            ->orWhere('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%')

            ->paginate(6);

        return view('admin.CMSPages.CityGovernment.index', compact('cityGoverment'));
    }
}
