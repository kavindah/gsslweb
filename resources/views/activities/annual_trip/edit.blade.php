@extends('layout.theme')

	
@section('contents')
<a href="/home" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go To Dashboard</a><br>
	<h2>Edit Annual Trip</h2>
	
	{!! Form::open(['action'=>['annualtripcontroller@update',$annual_trips->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title',$annual_trips->title,['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>	
	<div class="form-group">
		{{ Form::label('body','Body')}}
		{{ Form::textarea('body',$annual_trips->body,['class'=>'form-control my-editor', 'placeholder'=>'Body'])}}
	</div>
	<div class="form-control">
		<label>Cover Image:</label>
		{{Form::file('annualtrip_image')}}
	</div>
	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}


@endsection