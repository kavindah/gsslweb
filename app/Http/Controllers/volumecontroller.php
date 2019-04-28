<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\volume;
use App\journal;
use DB;

class volumecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:5'
        ]);
        $volumes = new volume;
        $volumes->volume = $request->input('volume');
        $volumes->user_id = auth()->user()->id;

        $volumes->save();

        return redirect('/journal_browse')->with('success', 'New Volume Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('journals')
            ->select('*')
            ->where('volume_id', $id)
            ->get();


        return view('journal.browse.show', ['data' => $data], compact('id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volume = volume::find($id);
        return view('journal.browse.volume.edit')->with('volumes', $volume);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $volumes = volume::find($id);
        $volumes->volume = $request->input('volume');
        $volumes->save();

        return redirect('/journal_browse')->with('success', ' Volume Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volume = volume::find($id);
        $volume->delete();
        return redirect('/journal_browse')->with('success', 'Volume Deleted');
    }


}
