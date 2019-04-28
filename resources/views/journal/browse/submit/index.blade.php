@extends('layout.theme')

	
@section('contents')
<a href="/home" class="btn membtn" style="width: 20%;"><span class="glyphicon glyphicon-chevron-left"></span> Go To Dashboard</a><br>
	<h3>Journal Submission</h3>
	
	{!! Form::open(['action'=>'journalsubmitcontroller@store','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
	<div class="form-group">
		
		{{ Form::label('abstract','Abstract')}}
		{{ Form::textarea('abstract','',['class'=>'form-control  my-editor', 'placeholder'=>'Abstract'])}}
	</div>
	<div class="form-group">
		
		{{ Form::label('maintext','Maintext')}}
		{{ Form::textarea('maintext','',['class'=>'form-control  my-editor', 'placeholder'=>'Maintext'])}}
	</div>	
	
	<div class="form-group">
		{{ Form::label('figures','Figures')}}
		{{ Form::textarea('figures','',['class'=>'form-control my-editor', 'placeholder'=>'Figures'])}}
	</div>

	<div class="form-group">
		{{ Form::label('tables','Tables')}}
		{{ Form::textarea('tables','',['class'=>'form-control my-editor', 'placeholder'=>'Tables'])}}
	</div>
	
	

	
	<br>
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}



@endsection