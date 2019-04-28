<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newsletter;

class newslettercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $news_letters=newsletter::orderBy('created_at','desc')->paginate(10);
        return view('publications.news_letters.index')->with('news_letters',$news_letters);
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
          $news_letters = new newsletter;
        $news_letters->user_id=auth()->user()->id;
        $news_letters->title=$request->input('title');
        $news_letters->body=$request->input('body');
        $news_letters->save();

        return redirect('/news_letters_create')->with('success','News Letter created');
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
        $news_letters=newsletter::find($id);
        return view('publications.news_letters.edit')->with('news_letters',$news_letters); 
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
        $news_letters=newsletter::find($id);
         $news_letters->user_id=auth()->user()->id;
        $news_letters->title=$request->input('title');
        $news_letters->body=$request->input('body');
        $news_letters->save();

        return redirect('/news_letters')->with('success','News Letter Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $news_letters=newsletter::find($id);
         $news_letters->delete();
         return redirect('/news_letters')->with('success','Deleted');
    }
}
