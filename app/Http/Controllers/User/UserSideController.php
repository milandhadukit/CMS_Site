<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Community;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\CityGovernment;
use App\Http\Controllers\Controller;

class UserSideController extends Controller
{
    public function viewCity($slug)
    {
        $city = CityGovernment::where('slug', $slug)->get();
        $service = Service::all();
        $community = Community::all();
        $contact = Contact::all();
        $department = Department::all();
        return view(
            'user.cityview',
            compact('city', 'department', 'service', 'community', 'contact')
        );
    }
    public function viewDepartment($slug)
    {
        $department = Department::where('slug', $slug)->get();
        $city = CityGovernment::all();
        $service = Service::all();
        $community = Community::all();
        $contact = Contact::all();
        return view(
            'user.department',
            compact('department', 'service', 'community', 'contact', 'city')
        );
        // return view('user.department',compact('department'));
    }

    public function viewService($slug)
    {
        $service = Service::where('slug', $slug)->get();
        $city = CityGovernment::all();
        $department = Department::all();
        $community = Community::all();
        $contact = Contact::all();
        return view(
            'user.service',
            compact('department', 'service', 'community', 'contact', 'city')
        );
    }

    public function viewCommunity($slug)
    {
        $community = Community::where('slug', $slug)->get();
        $city = CityGovernment::all();
        $department = Department::all();
        $service = Service::all();
        $contact = Contact::all();

        // $header = $this->headerData($slug);

        // dd($header);
       
        return view('user.community', compact('department', 'service', 'community', 'contact', 'city'));
    }

    public function viewContact($slug)
    {
        $contact = Contact::where('slug', $slug)->get();
        $city = CityGovernment::all();
        $department = Department::all();
        $service = Service::all();
        $community = Community::all();
        return view(
            'user.contact',
            compact('department', 'service', 'community', 'contact', 'city')
        );
    }

    public function searchData(Request $request)
    {
        $contact = Contact::all();
        $city = CityGovernment::all();
        $department = Department::all();
        $service = Service::all();
        $community = Community::all();

        $cityData = CityGovernment::select(
            'id',
            'left_content',
            'right_content'
        )
            ->Where('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%');

        $departmentData = Department::select(
            'id',
            'left_content',
            'right_content'
        )
            ->Where('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%');

        $communityData = Community::select(
            'id',
            'left_content',
            'right_content'
        )
            ->Where('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%');

        $results = Service::select('id', 'left_content', 'right_content')
            ->Where('left_content', 'like', '%' . $request->search . '%')
            ->orWhere('right_content', 'like', '%' . $request->search . '%')
            ->union($cityData)
            ->union($departmentData)
            ->union($communityData)
            ->get();

        return view(
            'user.Deshboad',
            compact(
                'results',
                'department',
                'service',
                'community',
                'contact',
                'city'
            )
        );
    }
}
