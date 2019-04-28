<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;

class newscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $news=news::orderBy('created_at','desc')->paginate(10);
        return view('news.index')->with('newss',$news);
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
         $news = new news;
        $news->user_id=auth()->user()->id;
        $news->title=$request->input('title');
        $news->body=$request->input('body');
        $news->save();

        return redirect('/news_create')->with('success','News created');
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
         $news=news::find($id);
              return view('news.edit')->with('newss',$news); 
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
        $news=news::find($id);
        $news->user_id=auth()->user()->id;
        $news->title=$request->input('title');
        $news->body=$request->input('body');
        $news->save();

        return redirect('/news')->with('success','News Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=news::find($id);
        $news->delete();
         return redirect('/news')->with('success','deleted');
    }
}
