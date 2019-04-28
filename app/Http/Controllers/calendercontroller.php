<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\calender;

class calendercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calender=calender::orderBy('created_at','desc')->paginate(10);
        return view('/calendar_event')->with('calender',$calender);
  
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
        $calender = new calender;
        $calender->title = $request->input('title');
        $calender->start_date = $request->input('start_date');
        $calender->end_date = $request->input('end_date');
        $calender->user_id = auth()->user()->id;
    
    $calender->save();

    return redirect('/calendar_event_create')->with('success','New calendar event created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calender=calender::find($id);
        return view('calendar.index')->with('calender',$calender);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $calender=calender::find($id);
        return view('calendar.edit')->with('calender',$calender);
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
        $request->validate([

    'start_date' => 'required',
]);

        $calender=calender::find($id);
        $calender->title=$request->input('title');
    $calender->start_date=$request->input('start_date');
     $calender->end_date=$request->input('end_date');
    $calender->user_id=auth()->user()->id;
    
    $calender->save();

    return redirect('/')->with('success','New calendar event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $calender=calender::find($id);
          $calender->delete();
             return redirect('/')->with('success','Calendar event Deleted');
    }
}
