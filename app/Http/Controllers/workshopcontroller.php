<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workshop;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

class workshopcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $workshop=workshop::orderBy('created_at','desc')->paginate(10);
        return view('activities.index')->with('workshops',$workshop);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
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
        $workshop = new workshop;
        $workshop->user_id=auth()->user()->id;
        $workshop->title=$request->input('title');
        $workshop->body=$request->input('body');
        $workshop->save();

        return redirect('/activities')->with('success','New wprkshop Created');
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
    {   $iddecrypt=Crypt::decrypt($id);
        $workshops=workshop::find($iddecrypt);
        return view('activities.edit')->with('workshops',$workshops);
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
  
    $workshop=workshop::find($id);
        $workshop->title=$request->input('title');
        $workshop->body=$request->input('body');
        $workshop->user_id=auth()->user()->id;
        $workshop->save();

    return redirect('/activities')->with('success','Article Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $workshops=workshop::find($id);
      $workshops->delete();
      return redirect('/activities')->with('success','Article deleted');
    }
}
