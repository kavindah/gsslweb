@extends('layout.theme')

	
@section('contents')

	<h2>Edit Profile</h2>
	
	{!! Form::open(['action'=>['userregistercontroller@update',Auth::user()->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
	<div class="form-group">
		
		{{ Form::label('name','Name')}}
		{{ Form::text('name',$abc->name,['class'=>'form-control', 'placeholder'=>'Name'])}}
	</div>	
	<div class="form-group">
		{{ Form::label('email','Email')}}
		{{ Form::text('email',$abc->email,[ 'class'=>'form-control', 'placeholder'=>'Email'])}}
	</div>

	<div class="form-group">
		{{ Form::label('office_tp','Contact No')}}
		{{ Form::text('office_tp',$abc->office_tp,[ 'class'=>'form-control', 'placeholder'=>'Contact No'])}}
	</div>

	<div class="form-group">
		{{ Form::label('office_address','Address')}}
		{{ Form::text('office_address',$abc->office_address,[ 'class'=>'form-control', 'placeholder'=>'Address'])}}
	</div>
	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}



@endsection