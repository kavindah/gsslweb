<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\tissa;

class tissamunasinghecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $tissa=tissa::orderBy('created_at','desc')->paginate(10);
        return view('awards.tissa_munasinghe.index')->with('tissas',$tissa);
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
         $tissa = new tissa;
        $tissa->user_id=auth()->user()->id;
        $tissa->title=$request->input('title');
        $tissa->body=$request->input('body');
        $tissa->save();

        return redirect('/tissa_munasinghe_scholarship_create')->with('success','Tissa Munasinghe Scholarship created');
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
         $tissa=tissa::find($id);
              return view('awards.tissa_munasinghe.edit')->with('tissas',$tissa);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tissa=tissa::find($id);
         $tissa->user_id=auth()->user()->id;
        $tissa->title=$request->input('title');
        $tissa->body=$request->input('body');
        $tissa->save();

        return redirect('/tissa_munasinghe_scholarship')->with('success','Tissa Munasinghe Scholarship Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $tissa=tissa::find($id);
          $tissa->delete();
          return redirect('/tissa_munasinghe_scholarship')->with('success','deleted');
    }
}
