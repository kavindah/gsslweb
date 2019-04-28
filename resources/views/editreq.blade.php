@extends('layout.theme')

	
@section('contents')
<div class="container">
		<div class="list-group"><div class="list-group-item"> New User Profile</div></div><br><br>
			<div id="printMe">
			<div class="print" style="background-color: white;padding: 10px;">
				<div class="form_head">
					<div class="row">
						<div class="col-md-2" style="margin: 10px;"><img width="100%" height="130px;" style="border: solid;border-radius: 5px;" src="/storage/profile_photo/{{$abc->profile_photo}}"></div>
						<div class="col-md-9">
							<label style="color: white; margin-top: 30px;font-size: 25px;">{{$abc->surname}}</label><br>
							<label style="color: white;font-size: 20px;">{{$abc->office_tp}}</label>
							<br>
							<label style="color: white;font-size: 20px;">{{$abc->office_email}}</label>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12"><div class="form_title">Applicant’s Details:</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Name</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->surname_options}}&nbsp;&nbsp;&nbsp;&nbsp;{{$abc->surname}}</div></div>
				</div>


				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Other Names</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->othername}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Birthday</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->birthday}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">NIC</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->nic}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Designation</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->designation}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Institution</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->institution}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Office Address</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->office_address}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-2"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Phone/Fax</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->office_tp}}</div></div>

					<div class="col-md-2"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">E-mail</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->office_email}}</div></div>

				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Home Address</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->office_address}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-2"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Phone/Fax</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->home_tp}}</div></div>

					<div class="col-md-2"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">E-mail</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->home_email}}</div></div>

				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Preferred Address for Correspondence:</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->preferred_address}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-12"><div class="form_title">Desired Membership Category:</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Admission to the category indicated below Transfer:</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">From: {{$abc->admission_transfer_from}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To: {{$abc->admission_transfer_to}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Have you been a member before?</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->member_before}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Apply for:</label></div>
					<div class="col-md-8"><div style="padding: 10px 10px 5px 30px;">{{$abc->requested_membership}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-12"><div class="form_title">Interested Area:</div></div>
				</div>
				<?php if($abc->econ=="yes"){
					$inter="Economic Geology";
				}else{$inter="";}
				if ($abc->env=="yes") {
					$inter1="Environmental Geology";
				}else{$inter1="";}
				if ($abc->geophy=="yes") {
					$inter2="Geophysics";
				}else{$inter2="";}

				if ($abc->stru=="yes") {
					$inter3="Structural Geology";
				}else{$inter3="";}
				if ($abc->eng=="yes") {
					$inter4="Engineering Geology";
				}else{$inter4="";}
				if ($abc->ocen=="yes") {
					$inter5="Oceanography";
				}else{$inter5="";}
				if ($abc->sedi=="yes") {
					$inter6="Sedimentology";
				}else{$inter6="";}
				if ($abc->hydro=="yes") {
					$inter7="Hydrogeology";
				}else{$inter7="";}
				if ($abc->marine=="yes") {
					$inter8="Marine Geology";
				}else{$inter8="";}
				if ($abc->geochem=="yes") {
					$inter9="Geochemistry";
				}else{$inter9="";}
				if ($abc->gemo=="yes") {
					$inter10="Gemology";
				}else{$inter10="";}
				if ($abc->remote=="yes") {
					$inter11="Remote Sensing";
				}else{$inter11="";}
				if ($abc->mine=="yes") {
					$inter12="Mineralogy & Petrology";
				}else{$inter12="";}
				if ($abc->quat=="yes") {
					$inter13="Quaternary Geology";
				}else{$inter13="";}
				?>
				<div style="padding: 10px;font-weight: bold;"><?php
					echo $inter.','.$inter1.','.$inter2.','.$inter3.','.$inter4.','.$inter5.','.$inter6.','.$inter7.','.$inter8.','.$inter9.','.$inter10.','.$inter11.','.$inter12.','.$inter13.','.$abc->other;?>
					</div>
				<div class="row">
					<div class="col-md-12"><div class="form_title">Statement of Qualifications</div></div>
				</div>
					
					<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">First degree or Diploma held</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->first_degree_held}}</div></div>

					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Year</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->first_degree_year}}</div></div>
				</div>
				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">University or Institution</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->first_degree_uni}}</div></div>

					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Country</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->first_degree_country}}</div></div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Second degree or Diploma held</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->sec_degree_held}}</div></div>

					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Year</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->sec_degree_year}}</div></div>
				</div>
				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">University or Institution</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->sec_degree_uni}}</div></div>

					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Country</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->sec_degree_country}}</div></div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Other degree or Diploma held</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->other_degree_held}}</div></div>

					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Year</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->other_degree_year}}</div></div>
				</div>
				<div class="row">
					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">University or Institution</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->other_degree_uni}}</div></div>

					<div class="col-md-4"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Country</label></div>
					<div class="col-md-4"><div style="padding: 10px 10px 5px 30px;">{{$abc->other_degree_country}}</div></div>
				</div><hr>
				
				<div class="row">
					<div class="col-md-5"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">Major subjects studied in undergraduate course:</label></div>
					<div class="col-md-7"><div style="padding: 10px 10px 5px 30px;">{{$abc->major_subjects}}</div></div>
				</div>

				<div class="row">
					<div class="col-md-7"><label style="padding: 10px 10px 5px 30px; font-weight: bold;font-size: 15px;">If Geology were not major subjects to what level were they studied:</label></div>
					<div class="col-md-5"><div style="padding: 10px 10px 5px 30px;">{{$abc->subject_level}}</div></div>
				</div>
			
				</div>
			</div>
			
		
		<div class="col-md-5" style="margin: 10px;"><img width="100%"style="border: solid;border-radius: 5px;" src="/storage/ceceipt/{{$abc->ceceipt}}"></div>


<!-- update as a member-->
	{!! Form::open(['action'=>['MemberReqController@update',$abc->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group">
	
		<label>Membership No</label>
		{{ Form::text('surname',$abc->surname,['class'=>'form-control','style'=>'display:none','required'])}}
		{{ Form::text('password',$abc->password,['class'=>'form-control','style'=>'display:none','required'])}}
		{{ Form::text('office_email',$abc->office_email,['class'=>'form-control','style'=>'display:none','required'])}}
			{{ Form::text('office_tp',$abc->office_tp,['class'=>'form-control','style'=>'display:none','required'])}}
			{{ Form::text('office_address',$abc->office_address,['class'=>'form-control','style'=>'display:none','required'])}}
			{{ Form::text('profile_photo',$abc->profile_photo,['class'=>'form-control','style'=>'display:none','required'])}}


		{{ Form::text('membershipno',$abc->membershipno,['class'=>'form-control','required'])}}
	</div>
	
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Add as a member',['value'=>'confirm','class'=>'btn btn-success'])}}
	{!! Form::close() !!}
<hr>
	
	<div class="row">
		<div class="col-md-3"><a href="/requests" class="btn membtn" style="width: 90%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back</a></div>
		<div class="col-md-3">

			<button onclick="printDiv('printMe')" class="btn btn-success"  data-toggle="tooltip" title="Print this form" style="width: 90%;">Print</button></div>
		
		<div class="col-md-3">
			{!!Form::open(['action'=>['MemberReqController@destroy',$abc->id],'method'=>'POST','class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete Member',array('class'=>'btn btn-danger','style'=>'width:90%','data-toggle'=>'tooltip','title'=>'if you delete, can not recovery'))}}
{!!Form::close()!!}
		</div>
	</div>
	
	</div>

@include('layouts.footer')

	@endsection