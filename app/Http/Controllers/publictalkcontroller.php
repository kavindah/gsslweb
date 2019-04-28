<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publictalk;
use Illuminate\Support\Facades\Crypt;

class publictalkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $publictalk=publictalk::orderBy('created_at','desc')->paginate(10);
        return view('activities.public_talk.index')->with('publictalks',$publictalk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.public_talk.create');
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
      
            $publictalks=new publictalk;
           if($request->hasFile('publictalk_image')){
                $filenameWithExt=$request->file('publictalk_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('publictalk_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('publictalk_image')->storeAs('public/publictalk_images',$fileNameToStore);
                $publictalks->publictalk_image=$fileNameToStore;
           }
            
    $publictalks->title=$request->input('title');
    $publictalks->body=$request->input('body');
    $publictalks->user_id=auth()->user()->id;
    
    $publictalks->save();

    return redirect('/activities_publictalk_create')->with('success','Public Talk uploaded');
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
        $iddecrypt=Crypt::decrypt($id);
        $publictalks=publictalk::find($iddecrypt);
        return view('activities.public_talk.edit')->with('publictalks',$publictalks);
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
    
           $publictalks=publictalk::find($id);
           if($request->hasFile('publictalk_image')){
                $filenameWithExt=$request->file('publictalk_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('publictalk_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('publictalk_image')->storeAs('public/publictalk_images',$fileNameToStore);
                $publictalks->publictalk_image=$fileNameToStore;
           }
            
    $publictalks->title=$request->input('title');
    $publictalks->body=$request->input('body');
    $publictalks->user_id=auth()->user()->id;
    
    $publictalks->save();

    return redirect('/activities_publictalk')->with('success','Public Talk Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publictalks=publictalk::find($id);
        $publictalks->delete();
        return redirect('/activities_publictalk')->with('success','Public Talk deleted');
    }
}
