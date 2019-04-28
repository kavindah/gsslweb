<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\iesocom;

class iesocomcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $iesocom=iesocom::orderBy('created_at','desc')->paginate(10);
        return view('sleso.iesocom.index')->with('iesocs',$iesocom);
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
        $iesocom = new iesocom;
        $iesocom->user_id=auth()->user()->id;
        $iesocom->title=$request->input('title');
        $iesocom->body=$request->input('body');
        $iesocom->save();

        return redirect('/iesocom_create')->with('success','Post created');
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
        $iesocom=iesocom::find($id);
              return view('sleso.iesocom.edit')->with('iesocs',$iesocom); 
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
         $iesocom=iesocom::find($id);
          $iesocom->user_id=auth()->user()->id;
        $iesocom->title=$request->input('title');
        $iesocom->body=$request->input('body');
        $iesocom->save();

        return redirect('/iesocom')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $iesocom=iesocom::find($id);
           $iesocom->delete();
        return redirect('/iesocom')->with('success','Post Deleted');
    }
}
