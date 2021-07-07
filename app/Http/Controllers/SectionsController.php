<?php

namespace App\Http\Controllers;

use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    
    public function index()
    {
        $sections = sections::all();
        return view('sections.section_main', compact('sections'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:25',
            
        ],
        [
            'section_name.required' => 'يرجى ادخال اسم القسم',
            'section_name.unique'   =>  'اسم القسم موجود في قاعدة البيانات'
        ]);

        sections::create([
            'section_name'          => $request->section_name ,
            'description'   => $request->description,
            'created_by'    => (Auth::user()->name),
        ]);
        session()->flash('Add', 'تم إضافة القسم بنجاح');
        return redirect('/sections');
    }
    

    
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    
    public function update(Request $request, sections $sections)
    {
        $id = $request->id;

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description' => 'required',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

        $sections = sections::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/sections');
    }

   
    public function destroy(Request $request)
    {
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
