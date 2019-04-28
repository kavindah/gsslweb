@extends('layout.theme')


@section('contents')

    <div class="row">
        <div class="col-md-3">
            <div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
                <div style="border-right:solid #BDBDBD;height:auto;">
                    <a href="lifemembers" class="btn membtn">Life Members</a>
                    <a href="ordinarymembers" class="btn membtn">Ordinary Members</a>
                    <a href="forignmembers" class="btn membtn">Foreign Members</a>
                    <a href="associatemembers" class="btn membtn">Associate Members</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">

            <div style="background-color: white;padding: 5px;">
                <div class="card-header"><h4>Register As a Member</h4></div>
                <div class="card" style="padding: 5px;">
                    <div class="card-body">
                        <div><b>Applicant's Details:</b></div>
                        <br>
                        <form class="" action="store" method="POST" enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Surname (Prof. /Dr. /Mr.
                                    /Ms)</label>

                                <div class="col-md-6">
                                    <select id="name" name="surname_options"
                                            class="form-control col-md-3 col-form-label text-md-right"
                                            value={{old('surname_options')}}>
                                        <option value="Prof">Prof</option>
                                        <option value="Dr">Dr.</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Ms">Ms.</option>
                                    </select>
                                    <div style="margin-top: 10px"></div>
                                    <input id="name" type="text" class="form-control" name="surname" required autofocus
                                           placeholder="<--Required-->" value={{old('surname')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Other Names</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="othername" autofocus
                                           value={{old('othername')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                                <div class="col-md-6">
                                    <input id="name" type="Date" class="form-control" name="birthday" required autofocus
                                           value={{old('birthday')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">NIC No</label>

                                <div class="col-md-6">
                                    <input id="name" placeholder="<--Required-->" type="text" class="form-control" name="nic" required autofocus
                                           value={{old('nic')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Designation</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="designation"
                                           autofocus value={{old('designation')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Institution</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="institution"
                                           autofocus value={{old('institution')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Official Address</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" placeholder="<--Required-->" name="office_address" required
                                           autofocus value={{old('office_address')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Phone/Fax</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="office_tp" placeholder="<--Required-->" required
                                           autofocus value={{old('office_tp')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control" name="office_email" placeholder="<--Required-->" required autofocus
                                           value={{old('office_email')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Home Address</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="home_address"
                                           autofocus value={{old('home_address')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Phone/Fax</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="home_tp" autofocus
                                           value={{old('home_tp')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control" name="home_email" autofocus
                                           value={{old('home_email')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Preferred Address for
                                    Correspondence: </label>

                                <div class="col-md-6">
                                    <select name="preferred_address" class="form-control"
                                            value={{old('preferred_address')}}>
                                        <option>Office</option>
                                        <option>Home</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Upload Your
                                    Photo</label>

                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control" name="profile_photo" required autofocus
                                           value={{old('profile_photo')}}>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Apply For</label>
                                <select name="requested_membership" class="col-md-6 form-control" required
                                        value={{old('requested_membership')}}>
                                    <option value="">Select Option (Required) </option>
                                    <option value="lm">Life Membership (LM) Rs. 10,000.00</option>
                                    <option value="om">Ordinary Membership (OM) Rs. 600.00</option>
                                    <option value="sm">Student Membership (SM) Rs. 300.00</option>
                                    <option value="am">Associated Membership (AM) Rs. 600.00</option>
                                    <option value="im">Institutional Membership (IM) Rs. 10,000.00</option>
                                    <option value="flm">Foreign Life Membership (FLM) US $ 400.00</option>
                                    <option value="fm">Foreign Membership (FM) US $ 20.00</option>
                                </select>
                            </div>


                            <div class="form-group row col-md-12">
                                <label class="col-md-12">Admission to the category indicated above
                                    Transfer: </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="addmission_transfer_from"
                                           placeholder="From" autofocus value={{old('addmission_transfer_from')}}>
                                </div>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="addmission_transfer_to"
                                           placeholder="To" autofocus value={{old('addmission_transfer_to')}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Have you been a member
                                    before? </label>
                                <select name="member_before" class="form-control col-md-6"
                                        value={{old('member_before')}}>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>

                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Attach payment
                                    receipt (required)</label>

                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control" name="ceceipt" autofocus required placeholder="<--Required-->"
                                           value={{old('ceceipt')}}>
                                </div>
                            </div>
                            <label><b>Interested Areas:</b></label><br>

                            <div class="row">
                                <div class="col-md-4">
                                    <div><input type="checkbox" value="yes" name="econ" value={{old('econ')}}></div>
                                    <label>Economic Geology</label>
                                    <div><input type="checkbox" value="yes" name="env" value={{old('env')}}></div>
                                    <label>Environmental Geology</label>
                                    <div><input type="checkbox" value="yes" name="geophy" value={{old('geophy')}}></div>
                                    <label>Geophysics</label>
                                    <div><input type="checkbox" value="yes" name="stru" value={{old('stru')}}></div>
                                    <label>Structural Geology</label>
                                    <div><input type="checkbox" value="yes" name="eng" value={{old('eng')}}></div>
                                    <label>Engineering Geology</label>
                                </div>
                                <div class="col-md-4">
                                    <div><input type="checkbox" value="yes" name="ocen" value={{old('ocen')}}></div>
                                    <label>Oceanography</label>
                                    <div><input type="checkbox" value="yes" name="sedi" value={{old('sedi')}}></div>
                                    <label>Sedimentology</label>
                                    <div><input type="checkbox" value="yes" name="hydro" value={{old('hydro')}}></div>
                                    <label>Hydrogeology</label>
                                    <div><input type="checkbox" value="yes" name="marine" value={{old('marine')}}></div>
                                    <label>Marine Geology</label>
                                    <div><input type="checkbox" value="yes" name="geochem" value={{old('geochem')}}>
                                    </div>
                                    <label>Geochemistry</label>
                                </div>
                                <div class="col-md-4">
                                    <div><input type="checkbox" value="yes" name="gemo" value={{old('gemo')}}></div>
                                    <label>Gemology</label>
                                    <div><input type="checkbox" value="yes" name="remote" value={{old('remote')}}></div>
                                    <label>Remote Sensing</label>
                                    <div><input type="checkbox" value="yes" name="mine" value={{old('mine')}}></div>
                                    <label>Mineralogy & Petrology </label>
                                    <div><input type="checkbox" value="yes" name="quat" value={{old('quat')}}></div>
                                    <label>Quaternary Geology</label>
                                    <div><input type="text" class="form-control" name="other" value={{old('other')}}>
                                    </div>
                                    <label>Other</label>
                                </div>
                            </div>

                            <label><b>Statement of Qualifications:</b></label><br>
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-md-8"><label>First degree or Diploma held</label><input
                                                    type="text" class="form-control" name="first_degree_held"
                                                    value={{old('first_degree_held')}}></div>
                                        <div class="col-md-4"><label>Year</label><input type="text" class="form-control"
                                                                                        name="first_degree_year"
                                                                                        value={{old('first_degree_year')}}>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"><label>University or Institution</label><input type="text"
                                                                                                             class="form-control"
                                                                                                             name="first_degree_uni"
                                                                                                             value={{old('first_degree_uni')}}>
                                        </div>
                                        <div class="col-md-4"><label>Country</label><input type="text"
                                                                                           class="form-control"
                                                                                           name="first_degree_country"
                                                                                           value={{old('first_degree_country')}}>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-md-8"><label>Second degree or Diploma held</label><input
                                                    type="text" class="form-control" name="sec_degree_held"
                                                    value={{old('sec_degree_held')}}></div>
                                        <div class="col-md-4"><label>Year</label><input type="text" class="form-control"
                                                                                        name="sec_degree_year"
                                                                                        value={{old('sec_degree_year')}}>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"><label>University or Institution</label><input type="text"
                                                                                                             class="form-control"
                                                                                                             name="sec_degree_uni"
                                                                                                             value={{old('sec_degree_uni')}}>
                                        </div>
                                        <div class="col-md-4"><label>Country</label><input type="text"
                                                                                           class="form-control"
                                                                                           name="sec_degree_country"
                                                                                           value={{old('sec_degree_country')}}>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-8"><label>Other degree or Diploma held</label>
                                            <input type="text" class="form-control" name="other_degree_held"
                                                    value={{old('other_degree_held')}}></div>
                                        <div class="col-md-4"><label>Year</label><input type="text" class="form-control"
                                                                                        name="other_degree_year"
                                                                                        value={{old('other_degree_year')}}>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"><label>University or Institution</label><input type="text"
                                                                                                             class="form-control"
                                                                                                             name="other_degree_uni"
                                                                                                             value={{old('other_degree_uni')}}>
                                        </div>
                                        <div class="col-md-4"><label>Country</label><input type="text"
                                                                                           class="form-control"
                                                                                           name="other_degree_country"
                                                                                           value={{old('other_degree_country')}}>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <br><br>

                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Major subjects studied
                                    in undergraduate course</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="major_subjects" autofocus
                                           value={{old('major_subjects')}}>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">If Geology were not
                                    major subjects to what level were they studied</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="subjects_level" autofocus
                                           value={{old('subjects_level')}} >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    I confirm that the information provided in this application is true and complete and
                                    if elected, I agree to abide by the rules and regulations of the Society<br><br>
                                    We, being Members of the Geological Society of Sri Lanka certify that we know the
                                    applicant and consider her /him to be eligible to join the Society. (Sponsors should
                                    be life or ordinary members).<br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Proposer’s Name</label><input type="text" class="form-control"
                                                                         name="proposer_name"
                                                                         value={{old('proposer_name')}}>
                                    <label>Membership No </label><input type="text" class="form-control"
                                                                        name="proposer_mem_no"
                                                                        value={{old('proposer_mem_no')}}>

                                </div>
                                <div class="col-md-6">
                                    <label>Seconder’s Name</label><input type="text" class="form-control"
                                                                         name="seconder_name"
                                                                         value={{old('seconder_name')}}>
                                    <label>Membership No </label><input type="text" class="form-control"
                                                                        name="seconder_mem_no"
                                                                        value={{old('seconder_mem_no')}}>

                                </div>
                                <div class="col-md-12">
                                    <label>Create Password</label><input type="password" class="form-control" required placeholder="<--Required-->"
                                                                         name="password">
                                </div>
                                <div class="col-md-12">
                                    <label>Confirm Password</label><input type="password" class="form-control" required
                                                                          name="confirmpassword" placeholder="<--Required-->">
                                </div>
                            </div>
                            <br><br>

                            <input type="submit" name="submit" class="btn btn-success" style="margin-top: 10px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection