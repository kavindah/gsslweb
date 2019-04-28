<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anandamedal;
class anandamedalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ananda=anandamedal::orderBy('created_at','desc')->paginate(10);
        return view('awards.ananda_coomaraswamy_medal.index')->with('anandas',$ananda);
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
       
         $ananda = new anandamedal;
        $ananda->user_id=auth()->user()->id;
        $ananda->title=$request->input('title');
        $ananda->body=$request->input('body');
        $ananda->save();

        return redirect('/ananda_coomaraswamy_medal_create')->with('success','Ananda Coomaraswamy Medal created');
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
                $ananda=anandamedal::find($id);
        return view('awards.ananda_coomaraswamy_medal.edit')->with('anandas',$ananda);
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
         $ananda=anandamedal::find($id);
          $ananda->user_id=auth()->user()->id;
        $ananda->title=$request->input('title');
        $ananda->body=$request->input('body');
        $ananda->save();

        return redirect('/ananda_coomaraswamy_medal')->with('success','Ananda Coomaraswamy Medal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ananda=anandamedal::find($id);
        $ananda->delete();
         return redirect('/ananda_coomaraswamy_medal')->with('success','deleted');
    }
}
