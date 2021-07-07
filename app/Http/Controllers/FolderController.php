<?php

namespace App\Http\Controllers;

use session;
use App\folders;
use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    
    public function index()
    {
        $folders = folders::all();
        $sections = sections::all();
        return view('folders.files_main', compact('folders','sections'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //return $request;
        // $input = $request->all();

        // $is_exist = folders::where('name','=', $input['name'])->exists();

        // if($is_exist)
        // {
        //     session()->flash('Error', 'اسم الملف موجودمسبقا');
        //     return redirect('/folders');
        // }
        // else
        // {
            // folders::create([
            //         'name'          => $request->name ,
            //         'folder_desc'   => $request->description,
            //         'created_by'    => (Auth::user()->name),
            //     ]);
                // session()->flash('Add', 'تم إضافة القسم بنجاح');
                // return redirect('/folders');
        // }


        $validatedData = $request->validate([
            'folder_name' => 'required|unique:folders|max:25',
            
        ],
        [
            'folder_name.required' => 'يرجى ادخال اسم الملف',
            'folder_name.unique'   =>  'اسم الملف موجود في قاعدة البيانات'
        ]);

        folders::create([
            'folder_name'           => $request->folder_name,
            'folder_desc'           => $request->description,
            'section_id'           => $request->section_id,    
           'created_by'            => (Auth::user()->name),
        ]);
        session()->flash('Add', 'تم إضافة القسم بنجاح');
        return redirect('/folders');
    }

    
    public function show(folders $folders)
    {
        //
    }

    
    public function edit(folders $folders)
    {
        //
    }

   
    public function update(Request $request, folders $folders)
    {
        $id = $request->id;

        $this->validate($request, [

            'folder_name' => 'required|max:255|unique:folders,folder_name,'.$id,
            
        ],[

            'folder_name.required' =>'يرجي ادخال اسم الملف',
            'folder_name.unique' =>'اسم الملف مسجل مسبقا',
            

        ]);

        $folder = folders::find($id);
        $folder->update([
            'folder_name' => $request->folder_name,
            'folder_desc' => $request->folder_desc,
           
        ]);

        session()->flash('edit','تم تعديل الملف بنجاج');
        return redirect('/folders');
    }

    
    public function destroy(Request $request,folders $folders)
    {
        $id = $request->id;
        folders::find($id)->delete();
        session()->flash('delete','تم حذف الملف بنجاح');
        return redirect('/folders');
    }
}
