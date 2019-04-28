@extends('layout.theme')

	
@section('contents')
<a href="/journal_browse" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back</a><br>
	<h3>Edit JGSSL Volume</h3>
	
	{!! Form::open(['action'=>['journalcontroller@update',$journals->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title',$journals->title,['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>

	
	<div class="form-group">
		{{ Form::label('abstract','Abstract')}}
		{{ Form::textarea('abstract',$journals->abstract,['class'=>'form-control my-editor', 'placeholder'=>'Abstract'])}}
	</div><p style="color:red;">please use CKEditor link like  "/storage/volume/journal_images/files/yourfile.extension"</p>
	<br>
	<div class="form-control">
		<label>Other files:</label>
		{{Form::file('journal_file',['multiple'=>'multiple'])}}
	</div>

	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}


@endsection