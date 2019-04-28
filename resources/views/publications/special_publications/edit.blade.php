@extends('layout.theme')

	
@section('contents')
<a href="/special_publications" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back</a><br>
	<h3>Edit Special publications</h3>
	
	{!! Form::open(['action'=>['specialpublicationscontroller@update',$special_publications->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title',$special_publications->title,['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>

	
	<div class="form-group">
		{{ Form::label('body','Body')}}
		{{ Form::textarea('body',$special_publications->body,['class'=>'form-control my-editor', 'placeholder'=>'Body'])}}
	</div>
	<br>
	
	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}
	
    @endsection


