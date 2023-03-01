<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Service;
use App\Models\Community;
use App\Models\Contact;
use App\Models\CityGovernment;
use App\Models\DeshboardPage;
use App\Models\Menu;

class DashboardUserController extends Controller
{
    public function index()
    {
       
        $city=CityGovernment::where('status',1)->get();
        $department = Department::where('status',1)->get();
        $service = Service::where('status',1)->get();
        $community = Community::where('status',1)->get();
        $contact = Contact::where('status',1)->get();
        // $allMenus = Menu::pluck('name','id')->all();
       
        // $deshboard=DeshboardPage::get();
        return view('user.Deshboad', compact('department', 'service', 'community', 'contact', 'city'));

        // return view('user.Deshboad');
    }

    
    

    
}
