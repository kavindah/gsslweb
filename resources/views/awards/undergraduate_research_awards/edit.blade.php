@extends('layout.theme')

	
@section('contents')
<a href="/undergraduate_research_awards" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back</a><br>
	<h3>Edit GSSL Undergraduate Research Award</h3>
	
	{!! Form::open(['action'=>['undergraduateresearchawardcontroller@update',$undergraduateresearchaward->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title',$undergraduateresearchaward->title,['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>

	
	<div class="form-group">
		{{ Form::label('body','Body')}}
		{{ Form::textarea('body',$undergraduateresearchaward->body,['class'=>'form-control my-editor', 'placeholder'=>'Body'])}}
	</div>
	<br>
	<div class="form-control">
		<label>Other files:</label>
		{{Form::file('undergraduateresearchaward_file',['multiple'=>'multiple'])}}
	</div>

	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}
	
    @endsection


