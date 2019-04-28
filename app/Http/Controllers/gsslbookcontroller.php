<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gsslbook;

class gsslbookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gsslbook=gsslbook::orderBy('created_at','desc')->paginate(10);
        return view('publications.gssl_book.index')->with('gssl_books',$gsslbook);
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
        $gsslbook = new gsslbook;
        $gsslbook->user_id=auth()->user()->id;
        $gsslbook->title=$request->input('title');
        $gsslbook->body=$request->input('body');
        $gsslbook->save();

        return redirect('/gssl_book_create')->with('success','GSSL Book created');
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
           $gsslbook=gsslbook::find($id);
        return view('publications.gssl_book.edit')->with('gssl_books',$gsslbook);
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
        $gsslbook=gsslbook::find($id);
        $gsslbook->user_id=auth()->user()->id;
        $gsslbook->title=$request->input('title');
        $gsslbook->body=$request->input('body');
        $gsslbook->save();

        return redirect('/gssl_book')->with('success','GSSL Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gsslbook=gsslbook::find($id);
        $gsslbook->delete();
        return redirect('/gssl_book')->with('success','Deleted');

    }
}
