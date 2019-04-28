
@extends('layout.theme')


	
@section('contents')
{{request()->route('id')}}
	<a href="/journal_browse" class="btn membtn" style="width: 10%;">Go Back</a><br>
		
					<div class="row">
						<div class="col-md-12">
							@if(!Auth::guest())
							
							@if(Auth::user()->admin==1)
							
		{!! Form::open(['action'=>'journalcontroller@store','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}

	<div class="form-group" style="display: none;">

			 
		{{ Form::label('volume_id','Volume ID')}}
	
		{{ Form::text('volume_id',$id,['class'=>'form-control', 'placeholder'=>'Title'])}}
		
	</div>	
	<div class="form-group">
		
		{{ Form::label('title','Title')}}
		{{ Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title'])}}
	</div>	
	
	<div class="form-group">
		{{ Form::label('abstract','Abstract')}}
		{{ Form::textarea('abstract','',['class'=>'form-control my-editor', 'placeholder'=>'Abstract'])}}
	</div>

	<br>
	<div class="form-control">
		<label>Other files:</label>
		{{Form::file('journal_file',['multiple'=>'multiple'])}}
	</div>

	
	<br>
	{{Form::submit('Submit',['class'=>'btn btn-success'])}}
	{!! Form::close() !!}<br>
@endif
	@endif


	
	
	@foreach($data->sortByDesc('created_at') as $dat)
	<div class="articlebody" style="margin-bottom:5px;padding: 30px;">
	<div style="color:black;font-size: 18px;">
			{{$dat->title}}

	</div>
	<div style="text-align: justify;">{!!$dat->abstract!!}</div>
	<div style="color:#7F8C8D; font-size:10px;">{{$dat->created_at}}</div>
	
	@if(!Auth::guest())
							@if(Auth::user()->id==$dat->user_id)
					<div class="row">
						<div class="col-md-3">
							
					<a href="/journal/{{$dat->id}}/edit" class="btn membtn">Edit</a>
					</div>
					<div class="col-md-3">
					{!!Form::open(['action'=>['journalcontroller@destroy',$dat->id],'method'=>'POST', 'class'=>'pull-right'])!!}
					    {{Form::hidden('_method','DELETE')}}
					    {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width:95%;'])}}
					{!!Form::close()!!}
					</div>
					</div>
					@endif
					@endif
					</div>
		@endforeach
		
	
		

					</div></div>				
@include('layouts.footer')
@endsection