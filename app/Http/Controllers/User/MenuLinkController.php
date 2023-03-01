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
use App\Models\UserEmailNews;
use App\Models\Event;


class MenuLinkController extends Controller
{   
    public function menuLink()
    {
        $community = Community::where('status',1)->get();
        $city = CityGovernment::where('status',1)->get();
        $department = Department::where('status',1)->get();
        $service = Service::where('status',1)->get();
        $contact = Contact::where('status',1)->get();
        return view('user.menuLink', compact('department', 'service', 'community', 'contact', 'city'));
    }

    public function viewEvent()
    {
        $eventCalander=Event::where('status',1)->get();
        $city = CityGovernment::where('status',1)->get();
        $department = Department::where('status',1)->get();
        $service = Service::where('status',1)->get();
        $contact = Contact::where('status',1)->get();
        $community=Community::where('status',1)->get();
        return view('user.viewEvent', compact('eventCalander','department', 'service', 'community', 'contact', 'city'));
    } 
    public function viewEventDetails($slug)
    {
        $eventCalander=Event::where('status',1)->where('slug',$slug)->get();
        $city = CityGovernment::where('status',1)->get();
        $department = Department::where('status',1)->get();
        $service = Service::where('status',1)->get();
        $contact = Contact::where('status',1)->get();
        $community=Community::where('status',1)->get();
        return view('user.viewevent_details', compact('eventCalander','department', 'service', 'community', 'contact', 'city'));
    }

    public function emailNewsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:user_email_news,email',
           
        ]);

        


        $emailNews=new UserEmailNews();
        $emailNews->name=$request->name;
        $emailNews->email=$request->email;
        $emailNews->save();
        return redirect()
        ->back()
        ->with('message', ' Successfully Subscribe');


    }

    public function  viewCalanderEvent()
    {
        $events = array();
        $evnetData = Event::all();

        foreach($evnetData as $setEvent){
            $events[] = [
                'title' => $setEvent->title_event,
                'start' => $setEvent->start_date,
                
            ];
        }

        // return $events;

      
        return view('user.show_calanderEvent',['events' => $events]);
    }


    public function eventDetails(Request $request)
    {
      
        $title = $request->get('title');
        $events = Event::where('title_event', $title)->get();

        $html = '';
        foreach($events as $event){

        $html =
        ' Event Title = ' . $event->title_event  . 
        'Description = ' . $event->description . 
        'Start Time = ' . $event->time  . 
        'End Time = ' . $event->end_time  . 
        'Location = ' . $event->location;
        }
        return $html;

    }



}
