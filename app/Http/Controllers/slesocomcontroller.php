<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slesocom;

class slesocomcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $slesocom=abvolume::orderBy('created_at','desc')->paginate(10);
        return view('sleso.slesocom.index')->with('slesocs',$slesocom);
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
        $slesocom = new slesocom;
        $slesocom->user_id=auth()->user()->id;
        $slesocom->title=$request->input('title');
        $slesocom->body=$request->input('body');
        $slesocom->save();

        return redirect('/slesocom_create')->with('success','Post created');
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
        $slesocom=slesocom::find($id);
              return view('sleso.slesocom.edit')->with('slesocs',$slesocom); 
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
        $slesocom=slesocom::find($id);
            $slesocom->user_id=auth()->user()->id;
        $slesocom->title=$request->input('title');
        $slesocom->body=$request->input('body');
        $slesocom->save();

        return redirect('/slesocom')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slesocom=slesocom::find($id);
        $slesocom->delete();
        return redirect('/slesocom')->with('success','Post Deleted');

    }
}
