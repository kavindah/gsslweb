@extends('layout.theme')

	
@section('contents')
<a href="/ljd_medal" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back</a><br>
	<h3>Edit L.J.D.Fernando Memorial Medal</h3>
	
	{!! Form::open(['action'=>['ljdmedalcontroller@update',$ljdmedals->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title',$ljdmedals->title,['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>

	
	<div class="form-group">
		{{ Form::label('body','Body')}}
		{{ Form::textarea('body',$ljdmedals->body,[ 'class'=>'form-control my-editor', 'placeholder'=>'Body'])}}
	</div>
	<br>
	<div class="form-control">
		<label>Other files:</label>
		{{Form::file('ljdmedal_file',['multiple'=>'multiple'])}}
	</div>

	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}





    @endsection


