<?php

namespace App\Http\Controllers;

use App\folders;
use App\sections;
use App\documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Block\Element\Document;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = documents::all();
        $folders = folders::all();
        $sections = sections::all();
        return view('documents.documents_main', compact('documents','folders', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $folders = folders::all();
        $sections = sections::all();
        return view('documents.add_document', compact('folders', 'sections'));
    }

    
    public function store(Request $request)
    {
    //    return $request; 

        $file_extension = $request -> pic ->getClientOriginalExtension();
        $file_name = $request->document_name .'_'. time().'.'.$file_extension;
        $path = 'images/documents';

        $request -> pic -> move($path,$file_name );
        
        documents::create([
            'document_number'  => $request->document_number,
            'document_name'    => $request->document_name,
            'document_date'    => $request->document_date,
            'section_id'       => $request->Section,
            'folder_name'      => $request->folder,
            'document_image'   => $file_name,
            'created_by'       => (Auth::user()->name),
        ]);

        
        session()->flash('Add', 'تم إضافة المعاملة بنجاح');
        return redirect('/documents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(documents $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(documents $documents)
    {
        //
    }

    public function getfolders($id)
    {
        $folders = DB::table("folders")->where("section_id", $id)->pluck("folder_name","id");
        return json_encode($folders);
    }
}
