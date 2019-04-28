<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\undergraduateresearchaward;

class undergraduateresearchawardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $undergraduateresearchaward=undergraduateresearchaward::orderBy('created_at','desc')->paginate(10);
        return view('awards.undergraduate_research_awards.index')->with('undergraduateresearchawards',$undergraduateresearchaward);
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
          $undergraduateresearchaward = new undergraduateresearchaward;
          if($request->hasFile('undergraduateresearchaward_file')){
                $filenameWithExt=$request->file('undergraduateresearchaward_file')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('undergraduateresearchaward_file')->getClientOriginalExtension();
                $fileNameToStore=$filename.'.'.$extension;
                $path=$request->file('undergraduateresearchaward_file')->storeAs('public/undergraduateresearchaward_file',$fileNameToStore);
                
           }
        $undergraduateresearchaward->user_id=auth()->user()->id;
        $undergraduateresearchaward->title=$request->input('title');
        $undergraduateresearchaward->body=$request->input('body');
        $undergraduateresearchaward->save();

        return redirect('/undergraduate_research_awards_create')->with('success','New undergraduate research award created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
         $undergraduateresearchaward=undergraduateresearchaward::find($id);
        return view('awards.undergraduate_research_awards.edit')->with('undergraduateresearchaward',$undergraduateresearchaward);
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
         $undergraduateresearchaward=undergraduateresearchaward::find($id);
       if($request->hasFile('undergraduateresearchaward_file')){
                $filenameWithExt=$request->file('undergraduateresearchaward_file')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('undergraduateresearchaward_file')->getClientOriginalExtension();
                $fileNameToStore=$filename.'.'.$extension;
                $path=$request->file('undergraduateresearchaward_file')->storeAs('public/undergraduateresearchaward_file',$fileNameToStore);
              
           }
        $undergraduateresearchaward->user_id=auth()->user()->id;
        $undergraduateresearchaward->title=$request->input('title');
        $undergraduateresearchaward->body=$request->input('body');
        $undergraduateresearchaward->save();

        return redirect('/undergraduate_research_awards')->with('success','undergraduate research award updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $undergraduateresearchaward=undergraduateresearchaward::find($id);
        $undergraduateresearchaward->delete();
         return redirect('/undergraduate_research_awards')->with('success','deleted');
    }
}
