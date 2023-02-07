<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CalendarManagementController extends Controller
{
    public function indexEvent()
    {
        $event = Event::paginate(6);
        return view('admin.CalendarManagement.index', compact('event'));
    }
    public function addEvent()
    {
        return view('admin.CalendarManagement.create');
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title_event' => 'required|min:2',
            'start_date' => 'required',
            'description' => 'nullable',
            'time' => 'required',
            'location'=>'nullable|min:5',
            
        ]);
        try {
            $event = new Event();
            $event->title_event = $request->title_event;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->time = $request->time;
            $event->end_time = $request->end_time;
            $event->location = $request->location;
            $event->slug=Str::slug($request->title_event);
            dd($event);
            $event->save();

            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('admin.CalendarManagement.edit', compact('event'));
    }

    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title_event' => 'required|min:2',
            'start_date' => 'required',
            'description' => 'nullable',
            'time' => 'required',
            'location'=>'nullable|min:5',
            
        ]);
        try {
            $event = Event::find($id);
            $event->title_event = $request->title_event;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->time = $request->time;
            $event->end_time = $request->end_time;
            $event->location = $request->location;
            $event->update();

            return redirect()
                ->back()
                ->with('message', ' update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteEvent($id)
    {
        try {
            $event = Event::find($id);
         
            $event->delete();

            return redirect()
                ->back()
                ->with('message', ' Delete Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function changeStatusEvent(Request $request)
    {
        $event = Event::find($request->id);
        $event->status = $request->status;
        $event->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
