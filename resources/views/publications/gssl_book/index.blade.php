
@extends('layout.theme')


	
@section('contents')

<div style="background-color: #ffffff">
	<div class="row">
		<div class="col-md-3">
			<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;margin: 10px;">
				<a href="/publications" class="btn membtn">Go Back</a>
				<a href="/abstract_volume" class="btn membtn">Abstract Volumes</a>
				<a href="/news_letters" class="btn membtn">News Letters</a>
				<a href="/special_publications" class="btn membtn">Special Publications</a>
				<a href="/gssl_book" class="btn membtn_active">Proposed GSSL Book</a>
				
				
				
			</div>
	</div>
		</div>
		<div class="col-md-9 ">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;">GSSL Book</div><br>
			@if(count($gssl_books)>0)
			@foreach($gssl_books as $gssl_book)
				<div style="text-align: justify;width: 95%;">
				<div style="color:black; font-weight:bold;">
					{{$gssl_book->title}}
				</div>
				
				{!!$gssl_book->body!!}
				<hr style="width:90% ">
				</div>
						@if(!Auth::guest())
							@if(Auth::user()->id==$gssl_book->user_id)
					<div class="row">
						<div class="col-md-3">
							
					<a href="/gssl_book/{{$gssl_book->id}}/edit" class="btn membtn">Edit</a>
					</div>
					<div class="col-md-3">
					{!!Form::open(['action'=>['gsslbookcontroller@destroy',$gssl_book->id],'method'=>'POST', 'class'=>'pull-right'])!!}
					    {{Form::hidden('_method','DELETE')}}
					    {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width:95%;'])}}
					{!!Form::close()!!}
					</div>
					</div>
					@endif
					@endif

			@endforeach
			@else
				<p>There is no posts available</p>
			@endif

</div></div>
@include('layouts.footer')
@endsection