@extends('layout.theme')

	
@section('contents')
<a href="/" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back</a><br>
	<h3>Edit GSSL Undergraduate Research Award</h3>
	
	{!! Form::open(['action'=>['calendercontroller@update',$calender->id],'method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::textarea('title',$calender->title,['class'=>'form-control my-editor', 'placeholder'=>'Title'])}}
	</div>

		<div class="form-group">
			{{ Form::label('start_date','Date of event')}}
		{!! Form::date('start_date', '$calender->start_date',['class'=>'form-control ', 'placeholder'=>'Date']) !!}
	</div>

	
	<br>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}
	
    @endsection

