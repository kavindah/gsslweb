<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\abvolume;
use Illuminate\Support\Facades\DB;

class abvolumecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   $abvolumes=abvolume::orderBy('created_at','desc')->paginate(10);
        return view('publications.abstract_volume.index')->with('abvolumes',$abvolumes);
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
          $abvolume = new abvolume;
        $abvolume->user_id=auth()->user()->id;
        $abvolume->title=$request->input('title');
        $abvolume->body=$request->input('body');
        $abvolume->save();

        return redirect('/abstract_volume_create')->with('success','Abstract Volume created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('abstactvolumemores')
            ->select('*')
            ->where('abstract_volume_id', $id)
            ->get();


        return view('publications.abstract_volume.abstract_volume_more.index', ['abvolumesmores' => $data], compact('id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $abvolume=abvolume::find($id);
              return view('publications.abstract_volume.edit')->with('abvolumes',$abvolume); 
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
         $abvolume=abvolume::find($id);
          $abvolume->user_id=auth()->user()->id;
        $abvolume->title=$request->input('title');
        $abvolume->body=$request->input('body');
        $abvolume->save();

        return redirect('/abstract_volume')->with('success','Abstract Volume Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $abvolume=abvolume::find($id);
         $abvolume->delete();
         return redirect('/abstract_volume')->with('success','Deleted');

    }
}
