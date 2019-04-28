<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ljdmedal;
class ljdmedalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ljdmedal=ljdmedal::orderBy('created_at','desc')->paginate(10);
        return view('awards.ljd_medal.index')->with('ljd_medals',$ljdmedal);
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
        $ljdmedal = new ljdmedal;
          if($request->hasFile('ljdmedal_file')){
                $filenameWithExt=$request->file('ljdmedal_file')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('ljdmedal_file')->getClientOriginalExtension();
                $fileNameToStore=$filename.'.'.$extension;
                $path=$request->file('ljdmedal_file')->storeAs('public/ljdmedal_file',$fileNameToStore);
                
           }
        $ljdmedal->user_id=auth()->user()->id;
        $ljdmedal->title=$request->input('title');
        $ljdmedal->body=$request->input('body');
        $ljdmedal->save();

        return redirect('/ljd_medal_create')->with('success','New L.J.D.Fernando Memorial Medal created');
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
           
         $ljdmedal=ljdmedal::find($id);
        return view('awards.ljd_medal.edit')->with('ljdmedals',$ljdmedal);
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
        $ljdmedal=ljdmedal::find($id);
        if($request->hasFile('ljdmedal_file')){
                $filenameWithExt=$request->file('ljdmedal_file')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('ljdmedal_file')->getClientOriginalExtension();
                $fileNameToStore=$filename.'.'.$extension;
                $path=$request->file('ljdmedal_file')->storeAs('public/ljdmedal_file',$fileNameToStore);
                
           }
        $ljdmedal->user_id=auth()->user()->id;
        $ljdmedal->title=$request->input('title');
        $ljdmedal->body=$request->input('body');
        $ljdmedal->save();

        return redirect('/ljd_medal')->with('success','L.J.D.Fernando Memorial Medal Updateed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $ljdmedal=ljdmedal::find($id);
        $ljdmedal->delete();
         return redirect('/ljd_medal')->with('success','deleted');
    }
}
