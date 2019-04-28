<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\journal;

 
class journalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|max:255|min:5'
        ]);
               $journals=new journal;
 
           if($request->hasFile('journal_file')){
                $filenameWithExt=$request->file('journal_file')->getClientOriginalName();
                 $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('journal_file')->getClientOriginalExtension();
                $fileNameToStore=$filename.'.'.$extension;
                $path=$request->file('journal_file')->storeAs('public/volume/journal_images/files',$filenameWithExt);
           }
     $journals->volume_id=$request->input('volume_id');       
    $journals->title=$request->input('title');
    $journals->abstract=$request->input('abstract');
    $journals->user_id=auth()->user()->id;
    
    $journals->save();

    return redirect('/journal_browse')->with('success','New Volume Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journals=journal::find($id);
        return view('journal.browse.edit')->with('journals',$journals);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $journals=journal::find($id);

           if($request->hasFile('journal_file')){
                $filenameWithExt=$request->file('journal_file')->getClientOriginalName();
                 $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('journal_file')->getClientOriginalExtension();
                $fileNameToStore=$filename.'.'.$extension;
                $path=$request->file('journal_file')->storeAs('public/volume/journal_images/files',$filenameWithExt);
           }
            
    $journals->title=$request->input('title');
    $journals->abstract=$request->input('abstract');
    $journals->user_id=auth()->user()->id;
    
    $journals->save();

    return redirect('/journal_browse')->with('success',' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $journals=journal::find($id);
       $journals->delete();
       return redirect('/journal_browse')->with('success','Deleted');
    
    }
}
