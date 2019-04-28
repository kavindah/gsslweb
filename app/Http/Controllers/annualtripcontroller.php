<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\annualtrip;

class annualtripcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annual_trips=annualtrip::orderBy('created_at','desc')->paginate(10);
        return view('activities.annual_trip.index')->with('annual_trips',$annual_trips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('activities.annual_trip.create');
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
        $annual_trips=new annualtrip;
           if($request->hasFile('annualtrip_image')){
                $filenameWithExt=$request->file('annualtrip_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('annualtrip_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('annualtrip_image')->storeAs('public/annualtrip_images',$fileNameToStore);
                $annual_trips->annualtrip_image=$fileNameToStore;
           }
            
    $annual_trips->title=$request->input('title');
    $annual_trips->body=$request->input('body');
    $annual_trips->user_id=auth()->user()->id;
    
    $annual_trips->save();

    return redirect('/activities_annual_trip_create')->with('success','New Annual Trip uploaded');
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
        $annual_trips=annualtrip::find($id);
        return view('activities.annual_trip.edit')->with('annual_trips',$annual_trips);
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
       $annual_trips=annualtrip::find($id);
       if($request->hasFile('annualtrip_image')){
                $filenameWithExt=$request->file('annualtrip_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('annualtrip_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('annualtrip_image')->storeAs('public/annualtrip_images',$fileNameToStore);
                $annual_trips->annualtrip_image=$fileNameToStore;
           }
            
    $annual_trips->title=$request->input('title');
    $annual_trips->body=$request->input('body');
    $annual_trips->user_id=auth()->user()->id;
    
    $annual_trips->save();

    return redirect('/activities_annual_trip')->with('success','New Annual Trip Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $annual_trips=annualtrip::find($id);
       $annual_trips->delete();
       return redirect('/activities_annual_trip')->with('success','Annual Trip Deleted');
    }
}
