<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pgmedal;

class pgcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pg=anandamedal::orderBy('created_at','desc')->paginate(10);
        return view('awards.pg_cooray_medal.index')->with('pgs',$pg);
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
          $pg = new pgmedal;
        $pg->user_id=auth()->user()->id;
        $pg->title=$request->input('title');
        $pg->body=$request->input('body');
        $pg->save();

        return redirect('/pg_cooray_medal_create')->with('success','PG Cooray Medal created');
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
           $pg=pgmedal::find($id);
              return view('awards.pg_cooray_medal.edit')->with('pgs',$pg);
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
       $pg=pgmedal::find($id);
         $pg->user_id=auth()->user()->id;
        $pg->title=$request->input('title');
        $pg->body=$request->input('body');
        $pg->save();

        return redirect('/pg_cooray_medal')->with('success','PG Cooray Medal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pg=pgmedal::find($id);
         $pg->delete();
         return redirect('/pg_cooray_medal')->with('success','deleted');
    }
}
