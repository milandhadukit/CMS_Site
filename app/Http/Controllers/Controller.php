<?php

namespace App\Http\Controllers;

use App\Models\CityGovernment;
use App\Models\Community;
use App\Models\Contact;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\UserLog;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function commonUserLog($logType, $moduleId, $module, $desc) {
        UserLog::create([
            'log_type' => $logType,
            'module_id' => $moduleId,
            'module_name' => $module,
            'description' => $desc,
            'user_id' => auth()->user()->id,


        ]);
    }

    function commonHeader()
    {
        $data = [];
        $data['contact'] = Contact::get();
        $data['city'] = CityGovernment::all();
        $data['department'] = Department::all();
        $data['service'] = Service::all();
        $data['community'] = Community::all();
        return $data;
    }


    function headerData($slug)
    {
        $header = [];
        $header['contact'] = Contact::where('slug', $slug)->get();
        $header['city'] = CityGovernment::where('slug', $slug)->get();
        $header['department'] = Department::where('slug', $slug)->get();
        $header['service'] = Service::where('slug', $slug)->where('status',1)->get();
        $header['community'] = Community::where('slug', $slug)->get();
        return $header;
    }


}
