
@extends('layout.theme')

@section('contents')
<a href="/home" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go To Dashboard</a><br>
	<h3>Create New Calendar Event</h3>
	
	{!! Form::open(['action'=>'calendercontroller@store','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::textarea('title','',['class'=>'form-control my-editor', 'placeholder'=>'Title'])}}
	</div>	
		<div class="form-group">
			{{ Form::label('start_date','Date of event')}}
		{!! Form::date('start_date', '',['class'=>'form-control ', 'placeholder'=>'Date']) !!}
	</div>
	<br>

	
	<br>
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}



@endsection