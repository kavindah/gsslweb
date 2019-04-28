<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\MemberReq;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$membersRequests= MemberReq::all();
        $membersRequests = MemberReq::orderBy('id', 'desc')->get();
        return view('membersRequests')->with('req', $membersRequests);


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
            'email' => 'email|unique:users',
            'password' => [
                'required',
                'string',
//                'min:6'|'confirmed',             // must be at least 10 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter


            ],
            'surname'=>[
                'string',
                'regex:/^[a-zA-Z]+$/u',
            ],
            'othername'=>[
                'string',
                'regex:/^[a-zA-Z]+$/u',
            ],
            'profile_photo'=>[
                'file' => 'max:10240',
            ],
            'nic'=>[
                'regex:/[0-9]/',
            ],
            'office_tp' => 'min:10|numeric',
            'home_tp' => 'min:10|numeric',
            'first_degree_uni'=>'regex:/^[A-Za-z\s-_]+$/',
            'sec_degree_uni'=>'regex:/^[A-Za-z\s-_]+$/',
            'other_degree_uni'=>'regex:/^[A-Za-z\s-_]+$/',
            'first_degree_country'=>'regex:/^[A-Za-z\s-_]+$/',
            'sec_degree_country'=>'regex:/^[A-Za-z\s-_]+$/',
            'other_degree_country'=>'regex:/^[A-Za-z\s-_]+$/',
            'major_subjects'=>'regex:/^[A-Za-z\s-_]+$/',
            'proposer_name'=>'regex:/^[A-Za-z\s-_]+$/',
            'seconder_name'=>'regex:/^[A-Za-z\s-_]+$/',
            'sec_degree_year' => 'integer|min:1820|max:'.date('Y'),
            'first_degree_year' => 'integer|min:1820|max:'.date('Y'),
            'other_degree_year' => 'integer|min:1820|max:'.date('Y'),

        ]);



        if ($request->hasFile('profile_photo')) {
            $filenameWithExt = $request->file('profile_photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('profile_photo')->storeAs('public/profile_photos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        if ($request->hasFile('ceceipt')) {
            $filenameWithExt = $request->file('ceceipt')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ceceipt')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('ceceipt')->storeAs('public/ceceipt', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $memberReq = new MemberReq;
        $password = Input::get("password");
        $confirmpassword = Input::get("confirmpassword");
        if ($password == $confirmpassword) {
            $memberReq->surname_options = Input::get("surname_options");
            $memberReq->surname = Input::get("surname");
            $memberReq->othername = Input::get("othername");
            $memberReq->birthday = Input::get("birthday");
            $memberReq->nic = Input::get("nic");
            $memberReq->designation = Input::get("designation");
            $memberReq->institution = Input::get("institution");
            $memberReq->office_address = Input::get("office_address");
            $memberReq->office_tp = Input::get("office_tp");
            $memberReq->office_email = Input::get("office_email");
            $memberReq->home_address = Input::get("home_address");
            $memberReq->home_tp = Input::get("home_tp");
            $memberReq->home_email = Input::get("home_email");
            $memberReq->preferred_address = Input::get("preferred_address");
            //$memberReq->preferred_home_address=Input::get("preferred_home_address",false);
            $memberReq->profile_photo = $fileNameToStore;

            $memberReq->requested_membership = Input::get("requested_membership");

            $memberReq->addmission_transfer_from = Input::get("addmission_transfer_from", false);
            $memberReq->addmission_transfer_to = Input::get("addmission_transfer_to", false);
            $memberReq->member_before = Input::get("member_before");
            $memberReq->ceceipt = $fileNameToStore;
            $memberReq->econ = Input::get("econ", false);
            $memberReq->env = Input::get("env", false);
            $memberReq->geophy = Input::get("geophy", false);
            $memberReq->stru = Input::get("stru", false);
            $memberReq->eng = Input::get("eng", false);
            $memberReq->ocen = Input::get("ocen", false);
            $memberReq->sedi = Input::get("sedi", false);
            $memberReq->hydro = Input::get("hydro", false);
            $memberReq->marine = Input::get("marine", false);
            $memberReq->geochem = Input::get("geochem", false);
            $memberReq->gemo = Input::get("gemo", false);
            $memberReq->remote = Input::get("remote", false);
            $memberReq->mine = Input::get("mine", false);
            $memberReq->quat = Input::get("quat", false);
            $memberReq->other = Input::get("other", false);
            $memberReq->first_degree_held = Input::get("first_degree_held");
            $memberReq->first_degree_year = Input::get("first_degree_year");
            $memberReq->first_degree_uni = Input::get("first_degree_uni");
            $memberReq->first_degree_country = Input::get("first_degree_country");
            $memberReq->sec_degree_held = Input::get("sec_degree_held");
            $memberReq->sec_degree_year = Input::get("sec_degree_year");
            $memberReq->sec_degree_uni = Input::get("sec_degree_uni");
            $memberReq->sec_degree_country = Input::get("sec_degree_country");
            $memberReq->other_degree_held = Input::get("other_degree_held");
            $memberReq->other_degree_year = Input::get("other_degree_year");
            $memberReq->other_degree_uni = Input::get("other_degree_uni");
            $memberReq->other_degree_country = Input::get("other_degree_country");
            $memberReq->major_subjects = Input::get("major_subjects");
            $memberReq->subjects_level = Input::get("subjects_level");
            $memberReq->proposer_name = Input::get("proposer_name");
            $memberReq->proposer_mem_no = Input::get("proposer_mem_no");
            $memberReq->seconder_name = Input::get("seconder_name");
            $memberReq->seconder_mem_no = Input::get("seconder_mem_no");
            $memberReq->password = Hash::make(Input::get('password'));
            $memberReq->notifications='1';
            $memberReq->save();
            return redirect('members')->with('success', 'Application sent,You will receive a confirmation email soon');
        } else {
            return redirect('members')->with('error', 'passwords not match')->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mem = MemberReq::find($id);
        return view('editreq')->with('abc', $mem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iddecrypt = Crypt::decrypt($id);
        $mem = MemberReq::find($iddecrypt);
        return view('editreq')->with('abc', $mem);
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


        $post = MemberReq::find($id);
        $user = new User;

        if(!User::where('email', '=', Input::get('office_email'))->exists()) {
        if ($post->status == '0' || $post->status == '') {
            $post->status = 'confirm';
            $post->notifications='0';
            $post->membershipno = $request->input('membershipno');
            $post->save();



                $user->name = Input::input('surname');
                $user->membershipno = Input::input('membershipno');
                $user->email = Input::input('office_email');

                $user->office_tp = Input::input('office_tp');
                $user->office_address = Input::input('office_address');
                $user->profile_photo = Input::input('profile_photo');

                $user->password = Input::input('password');
                $user->save();



            }
            else
            {
                return redirect('/requests')->with('error', 'Cannot add.already registered using this email');
            }
//            $data = array('name'=>"Geological Socoety of Sri Lanka",
//                'email'=>$post->office_email);
//            Mail::send('members', $data, function($message) use($data) {
//                $message->to($data['email'],'GSSL')->subject
//                ('You Request is confirmed by the GSSL.')->setBody(' Please log with your email and password that you are provided previously','text/html');
//                $message->from('dskharshana@gmail.com','Geological Socoety of Sri Lanka');
//            });

            return redirect('/requests')->with('success', 'Successfull added as a member');
        } else {


            return redirect('/requests')->with('error', 'already a member');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mem = MemberReq::find($id);
        $mem->delete();
        return redirect('/requests')->with('success', 'Request deleted');
    }
}
