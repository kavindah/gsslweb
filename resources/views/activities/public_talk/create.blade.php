@extends('layout.theme')

	
@section('contents')
<a href="/home" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go To Dashboard</a><br>
	<h2>Create New Public Talk</h2>
	
	{!! Form::open(['action'=>'publictalkcontroller@store','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>	
	<div class="form-group">
		{{ Form::label('body','Body')}}
		{{ Form::textarea('body','',['class'=>'form-control my-editor', 'placeholder'=>'Body'])}}
	</div>
	<div class="form-control">
		<label>Cover Image:</label>
		{{Form::file('publictalk_image')}}
	</div>
	
	<br>
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}

	


@endsection