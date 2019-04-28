<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\specialpublications;

class specialpublicationscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
         $specialpublications=specialpublications::orderBy('created_at','desc')->paginate(10);
        return view('publications.special_publications.index')->with('special_publications',$specialpublications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        $special_publications = new specialpublications;
        $special_publications->user_id=auth()->user()->id;
        $special_publications->title=$request->input('title');
        $special_publications->body=$request->input('body');
        $special_publications->save();

        return redirect('/special_publications_create')->with('success','Special publications created');
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
             $special_publications=specialpublications::find($id);
        return view('publications.special_publications.edit')->with('special_publications',$special_publications);
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
           $special_publications=specialpublications::find($id);
            $special_publications->user_id=auth()->user()->id;
        $special_publications->title=$request->input('title');
        $special_publications->body=$request->input('body');
        $special_publications->save();

        return redirect('/special_publications')->with('success','Special publications Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $special_publications=specialpublications::find($id);
         $special_publications->delete();
          return redirect('/special_publications')->with('success','deleted');

    }
}
