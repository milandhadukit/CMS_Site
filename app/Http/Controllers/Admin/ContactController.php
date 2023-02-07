<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use File;

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
            'title' => 'required',
            'description' => 'required',
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

            $contact->save();

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

        return response()->json(['success'=>'Status change successfully.']);
    }


}
