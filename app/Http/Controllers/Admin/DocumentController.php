<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use App\Models\UserLog;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate(6);
        return view('admin.DocumentManagement.index', compact('documents'));
        // return view('admin.DocumentManagement.check', compact('list'));
    }

    public function create()
    {
        return view('admin.DocumentManagement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:pdf',
            'title' => 'required',
            'description' => 'nullable|min:5',
            'publish_date' => 'nullable',
        ]);

      
        $documents = new Document();
        $documents->slug = Str::slug($request->title);

        if ($request->file('document')) {
            $fileName = $request->document->getClientOriginalName();
            $filePath = $request
                ->file('document')
                ->storeAs('uploads', $fileName, 'public');
            $documents->document = $fileName;
        }
        $documents->title = $request->title;
        $documents->description = $request->description;
        $documents->publish_date = $request->publish_date;
        $documents->save();


       // user log create
        if($documents){
            $logType = 'Created';
            $moduleId = $documents->id;
            $module = 'Document';
            $desc = auth()->user()->name. 'created new Document' . $documents->title;
             $this->commonUserLog($logType, $moduleId, $module, $desc);
               
        }

        return redirect('documents')->with(
            'message',
            'New Document Added Successfully.'
        );
    }

    public function edit($id)
    {
        $document = Document::where('id', $id)->first();

        return view('admin.DocumentManagement.edit', compact('document'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'document' => 'nullable|mimes:pdf',
            'title' => 'required',
            'description' => 'nullable|min:5',
            'publish_date' => 'nullable',
        ]);

        $documents = Document::where('id', $id)->first();
        $documents->slug = Str::slug($request->title);

        if ($request->file('document')) {
            $fileName = $request->document->getClientOriginalName();
            $filePath = $request
                ->file('document')
                ->storeAs('uploads', $fileName, 'public');

                //  $path = public_path('Service_Image/' . $documents->document);
                 $path=storage_path('app/public/uploads/'.$documents->document);
                if (File::exists($path)) {
                    unlink($path);
                }

            $documents->document = $fileName;
        }

        $documents->title = $request->title;
        $documents->description = $request->description;
        $documents->publish_date = $request->publish_date;
        $documents->update();

         // user log create
         if($documents){
            $logType = 'Updated';
            $moduleId = $documents->id;
            $module = 'Document';
            $desc = auth()->user()->name .' '. $logType .' ' . $module.' '. $documents->title;
             $this->commonUserLog($logType, $moduleId, $module, $desc);
               
        }



        return redirect('documents')->with(
            'message',
            'Document Updated Successfully.'
        );
    }

    public function delete($id)
    {
        $documents = Document::where('id', $id)->first();
        $path=storage_path('app/public/uploads/'.$documents->document);
        if (File::exists($path)) {
            unlink($path);

        }
        $documents->delete();

         // user log create
         if($documents){
            $logType = 'Deleted';
            $moduleId = $documents->id;
            $module = 'Document';
            $desc = auth()->user()->name .' '. $logType .' ' . $module . $documents->title;
             $this->commonUserLog($logType, $moduleId, $module, $desc);
               
        }
      
        return redirect('documents')->with(
            'message',
            'Document Deleted Successfully.'
        );
    }

    public function view()
    {
        $documents = Document::all();
        return view('admin.DocumentManagement.view', compact('documents'));
    }

    public function display($file)
    {
        $myFile = storage_path('app/public/uploads/' . $file);
        return response()->file($myFile);
    }

    public function download($file)
    {
        $myFile = storage_path('app/public/uploads/' . $file);
        return response()->download($myFile);
    }

    public function changeStatus(Request $request)
    {
        $documents = Document::find($request->id);
        $documents->status = $request->status;
        $documents->save();

         // user log 
         if($documents){
            $logType = 'Status Change';
            $moduleId = $documents->id;
            $module = 'Document';
            $desc = auth()->user()->name .' '. $logType .' ' . $module.' '. $documents->title;
             $this->commonUserLog($logType, $moduleId, $module, $desc);
               
        }
      
        return response()->json(['message' => 'Status Changed successfully.']);
    }

    public function multipleusersdelete(Request $request)
	{
		$id = $request->id;
        if(empty($id))
        {
            return 'No data Found';
        }
		foreach ($id as $user) 
		{
			$documents=Document::where('id', $user)->delete();

		}

          // user log 
          if($documents){
            $logType = 'Deleted';
            $moduleId = $documents->id;
            $module = 'Document';
            $desc = auth()->user()->name .' '. $logType .' ' . $module.' '. $documents->title;
             $this->commonUserLog($logType, $moduleId, $module, $desc);
               
        }

        return redirect()
        ->back()
        ->with('message', ' Delete Successfully');
		// return response()->json(['message' => ' successfully.']);
	}


}
