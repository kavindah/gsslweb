<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vitanage;

class pwvitanagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $vitana=vitanage::orderBy('created_at','desc')->paginate(10);
        return view('awards.tissa_munasinghe.index')->with('vitanas',$vitana);
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
        $vitana = new vitanage;
        $vitana->user_id=auth()->user()->id;
        $vitana->title=$request->input('title');
        $vitana->body=$request->input('body');
        $vitana->save();

        return redirect('/pw_vitanage_memorial_scholarship_create')->with('success','P.W.Vitanage Memorial Scholarship created');
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
          $vitana=vitanage::find($id);
              return view('awards.pw_vitanage_memorial_scholarship.edit')->with('vitanas',$vitana);   
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
      $vitana=vitanage::find($id);
       $vitana->user_id=auth()->user()->id;
        $vitana->title=$request->input('title');
        $vitana->body=$request->input('body');
        $vitana->save();

        return redirect('/pw_vitanage_memorial_scholarship')->with('success','P.W.Vitanage Memorial Scholarship Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitana=vitanage::find($id);
        $vitana->delete();
        return redirect('/pw_vitanage_memorial_scholarship')->with('success','deleted');
    }
}
