<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ContactController extends Controller
{
    public function indexContactDetails()
    {
        $details = Contact::get();
        return view('admin.CMSPages.Contact.index', compact('details'));
    }
    public function addContactDetails()
    {
        return view('admin.CMSPages.Contact.create');
    }
    public function storeContactDetails(Request $request)
    {
        $request->validate([
            'employment_descreption' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        try {
            $contact = new Contact();
            $contact->employment_descreption = $request->employment_descreption;
            $contact->title = $request->title;
            $contact->description = $request->description;
            $imageName =
                time() . '.' . $request->image->getClientOriginalExtension();
            $image = $request->image->move(
                public_path('/Contact_image'),
                $imageName
            );
            $contact->image = $imageName;
            $contact->slug = Str::slug($request->title);

            $contact->save();

               // user log 
               if($contact){
                $logType = 'Created';
                $moduleId = $contact->id;
                $module = 'Contact';
                $desc = auth()->user()->name .' '. $logType .' ' . $module . $contact->title;
                $this->commonUserLog($logType, $moduleId, $module, $desc);
                
            }

            return redirect()
                ->back()
                ->with('message', ' Add Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function editContactDetails($id)
    {
        $details = Contact::find($id);
        return view('admin.CMSPages.Contact.edit', compact('details'));
    }

    public function updateContactDetails(Request $request, $id)
    {
        $request->validate([
            'employment_descreption' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);
        try {
            $contact = Contact::find($id);
            $contact->employment_descreption = $request->employment_descreption;
            $contact->title = $request->title;
            $contact->description = $request->description;
            $contact->slug = Str::slug($request->title);


            if ($request->has('image')) {
                $path = public_path('Contact_image/' . $contact->image);
                if (File::exists($path)) {
                    unlink($path);
                }
                $imageName =
                    time() .
                    '.' .
                    $request->image->getClientOriginalExtension();
                $image = $request->image->move(
                    public_path('/Contact_image'),
                    $imageName
                );

                $contact->image = $imageName;

            }

            $contact->update();


             // user log 
             if($contact){
                $logType = 'Updated';
                $moduleId = $contact->id;
                $module = 'Contact';
                $desc = auth()->user()->name .' '. $logType .' ' . $module . $contact->title;
                $this->commonUserLog($logType, $moduleId, $module, $desc);
                
            }

            return redirect()
                ->back()
                ->with('message', ' update Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function disableContactDetails($id,Request $request)
    {
        // $details = Contact::where('id',$id)->update(['status'=>'0']);

        try {
            $contact = Contact::find($id);
            $path = public_path('Contact_image/' . $contact->image);
            if (File::exists($path)) {
                unlink($path);
            }
            $contact->delete();

             // user log 
        if($contact){
            $logType = 'Deleted';
            $moduleId = $contact->id;
            $module = 'Contact';
            $desc = auth()->user()->name .' '. $logType .' ' . $module . $contact->title;
            $this->commonUserLog($logType, $moduleId, $module, $desc);
            
        }

            return redirect()
                ->back()
                ->with('message', ' Delete Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()
                ->back()
                ->with('message', ' Successfully');
    }


    public function changeStatusContact(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->status = $request->status;
        $contact->save();

        // user log 
        if($contact){
            $logType = 'Status change';
            $moduleId = $contact->id;
            $module = 'Contact';
            $desc = auth()->user()->name .' '. $logType .' ' . $module . $contact->title;
            $this->commonUserLog($logType, $moduleId, $module, $desc);
            
        }

        return response()->json(['success'=>'Status change successfully.']);
    }


}
