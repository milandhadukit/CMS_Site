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

class DashboardUserController extends Controller
{
    public function index()
    {
       
        $city=CityGovernment::all();
        $department = Department::all();
        $service = Service::all();
        $community = Community::all();
        $contact = Contact::where('status',1)->get();
        

        // $data = $this->commonHeader();
        // return $data; 
      
        $deshboard=DeshboardPage::get();
        return view('user.Deshboad', compact('department', 'service', 'community', 'contact', 'city','deshboard'));

        // return view('user.Deshboad');
    }

 

    
}
