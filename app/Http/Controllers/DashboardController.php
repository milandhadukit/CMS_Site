<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeshboardPage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function addDeshboard()
    {
        return view('admin.DeshboardPage.create');
    }

    public function storeDeshboard(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'description' => 'nullable',
            'left_content' => 'nullable|min:5',
            'right_content' => 'nullable|min:5',
        ]);
        try {
            $deshboard = new DeshboardPage();
            $deshboard->title = $request->title;
            $deshboard->description = $request->description;
            $deshboard->left_content = $request->left_content;
            $deshboard->right_content = $request->right_content;
            $deshboard->slug = Str::slug($request->title);
            // dd($deshboard);
            $deshboard->save();
            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
