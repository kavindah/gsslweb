<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\technicalsession;

class technicalsessoioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technical_session=technicalsession::orderBy('created_at','desc')->paginate(10);
        return view('activities.technical_session.index')->with('technical_sessions',$technical_session);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('activities.technical_session.create');
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
        $technicalsessions=new technicalsession;
           if($request->hasFile('technicalsession_image')){
                $filenameWithExt=$request->file('technicalsession_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('technicalsession_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('technicalsession_image')->storeAs('public/technicalsession_images',$fileNameToStore);
                $technicalsessions->technicalsession_image=$fileNameToStore;
           }
            
    $technicalsessions->title=$request->input('title');
    $technicalsessions->body=$request->input('body');
    $technicalsessions->user_id=auth()->user()->id;
    
    $technicalsessions->save();

    return redirect('/activities_technical_session_create')->with('success','New event uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technicalsession=technicalsession::find($id);
        return view('activities.technical_session.edit')->with('technicalsessions',$technicalsession);
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
        $technicalsessions=technicalsession::find($id);
        if($request->hasFile('technicalsession_image')){
                $filenameWithExt=$request->file('technicalsession_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('technicalsession_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('technicalsession_image')->storeAs('public/technicalsession_images',$fileNameToStore);
                $technicalsessions->technicalsession_image=$fileNameToStore;
           }
            
    $technicalsessions->title=$request->input('title');
    $technicalsessions->body=$request->input('body');
    $technicalsessions->user_id=auth()->user()->id;
    
    $technicalsessions->save();

    return redirect('/activities_technical_session')->with('success','Event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $technicalsession=technicalsession::find($id);
        $technicalsession->delete();
        return redirect('/activities_technical_session')->with('success','Event Deleted');
    }
}
