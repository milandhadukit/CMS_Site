<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function indexDepartment()
    {
        $department = Department::paginate(6);
        return view('admin.CMSPages.Department.index', compact('department'));
    }
    public function addDepartment()
    {
        return view('admin.CMSPages.Department.create');
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'title_department' => 'required|min:2',
            'description_department' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $department = new Department();
            $department->title_department = $request->title_department;
            $department->description_department =
                $request->description_department;
            $department->left_content = $request->left_content;
            $department->right_content = $request->right_content;
            $department->slug = Str::slug($request->title_department);
            // dd($department);
            $department->save();
            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteDepartment($id)
    {
        try {
            $department = Department::where('id', $id)->first();

            $department->delete();

            return redirect()
                ->back()
                ->with('message', ' Delete Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editDepartment($id)
    {
        $department = Department::where('slug', $id)->first();
        return view('admin.CMSPages.Department.edit', compact('department'));
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'title_department' => 'required|min:2',
            'description_department' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $department = Department::where('slug', $id)->first();
            $department->title_department = $request->title_department;
            $department->description_department =
                $request->description_department;
            $department->left_content = $request->left_content;
            $department->right_content = $request->right_content;
            $department->slug = Str::slug($request->title_department);
            // dd($department);
            $department->update();
            return redirect()
                ->back()
                ->with('message', ' update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function changeStatusDepartment(Request $request)
    {
        $department = Department::find($request->id);
        $department->status = $request->status;
        $department->save();
        return response()->json(['message' => 'Status change successfully.']);
    }

    public function searchDepartment(Request $request)
    {
        $department = Department::where(
            'description_department',
            'like',
            '%' . $request->search . '%'
        )
            ->orWhere('title_department', 'like', '%' . $request->search . '%')
            ->orWhere('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%')

            ->paginate(6);

        return view('admin.CMSPages.Department.index', compact('department'));
    }
}
