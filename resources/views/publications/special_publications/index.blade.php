
@extends('layout.theme')


	
@section('contents')
<script type="text/javascript">
	$(document).ready(function(){ 
      $('img').addClass('fancybox');
});
		 $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
<div style="background-color: #ffffff">
	<div class="row">
		<div class="col-md-3">
			<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;margin: 10px;">
				<a href="/publications" class="btn membtn">Go Back</a>
				<a href="/abstract_volume" class="btn membtn">Abstract Volumes</a>
				<a href="/news_letters" class="btn membtn">News Letters</a>
				<a href="/special_publications" class="btn membtn_active">Special Publications</a>
				<a href="/gssl_book" class="btn membtn">Proposed GSSL Book</a>
				
				
				
			</div>
	</div>
		</div>
		<div class="col-md-9">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;">Special Publications</div><br>
			@if(count($special_publications)>0)
			@foreach($special_publications as $special_publication)
				<div style="text-align: justify;width: 95%;">
				<div style="color:black; font-weight:bold;">
					{{$special_publication->title}}
				</div>
				
				{!!$special_publication->body!!}
				<hr style="width:90% ">
				</div>
						@if(!Auth::guest())
							@if(Auth::user()->id==$special_publication->user_id)
					<div class="row">
						<div class="col-md-3">
							
					<a href="/special_publications/{{$special_publication->id}}/edit" class="btn membtn">Edit</a>
					</div>
					<div class="col-md-3">
					{!!Form::open(['action'=>['specialpublicationscontroller@destroy',$special_publication->id],'method'=>'POST', 'class'=>'pull-right'])!!}
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
</div>
</div>
@include('layouts.footer')
@endsection