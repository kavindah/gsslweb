@extends('layout.theme')

	
@section('contents')
<a href="/home" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go To Dashboard</a><br>
	<h3>Create JGSSL Volume</h3>
	
	{!! Form::open(['action'=>'journalcontroller@store','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
	<div class="form-group">
		
		{{ Form::label('volume','Volume')}}
		{{ Form::text('volume','',['class'=>'form-control', 'placeholder'=>'Volume'])}}
	</div>
	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>	
	
	<div class="form-group">
		{{ Form::label('abstract','Abstract')}}
		{{ Form::textarea('abstract','',['class'=>'form-control my-editor', 'placeholder'=>'Abstract'])}}
	</div>
	
	<div class="form-control">
		<label>Cover Image:</label>
		{{Form::file('journal_image')}}
	</div><br>
	<div class="form-control">
		<label>Other files:</label>
		{{Form::file('journal_file',['multiple'=>'multiple'])}}
	</div>

	
	<br>
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}



@endsection