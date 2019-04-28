<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\focuses;

class focusescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $focuses=focuses::orderBy('created_at','desc')->get();
        return view('/')->with('focuses',$focuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('focuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        $focuses = new focuses;
        $focuses->user_id=auth()->user()->id;
        $focuses->title=$request->input('title');
        $focuses->body=$request->input('body');
        $focuses->save();

        return redirect('/')->with('success','New Focuses Created');
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
        $focuses=focuses::find($id);
        return view('focuses.edit')->with('focuses',$focuses);
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
               $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
  
    $focuses=focuses::find($id);
        $focuses->title=$request->input('title');
        $focuses->body=$request->input('body');
        $focuses->user_id=auth()->user()->id;
        $focuses->save();

    return redirect('/')->with('success','focuses Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $focuses=focuses::find($id);
      $focuses->delete();
      return redirect('/')->with('success','Focuses deleted');
    }
}
