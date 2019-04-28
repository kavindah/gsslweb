
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
<div>
	<div class="row">
		
		<div class="col-md-12">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;padding-left: 10px;">News</div><br>
			@if(count($newss)>0)
			@foreach($newss as $news)
				<div style="text-align: justify;width: 100%; height: auto;background-color: #ffffff;padding: 10px;">
				<div style="color:black; font-weight:bold;padding-left: 24px;">
					{{$news->title}}
				</div>
				<div style="padding-left: 20px; text-align: justify;">{!!$news->body!!}</div>
			<br>
				<hr style="width:100% "><br>
				</div>
						@if(!Auth::guest())
							@if(Auth::user()->id==$news->user_id)
					<div class="row">
						<div class="col-md-3">
							
					<a href="/news/{{$news->id}}/edit" class="btn membtn">Edit</a>
					</div>
					<div class="col-md-3">
					{!!Form::open(['action'=>['newscontroller@destroy',$news->id],'method'=>'POST', 'class'=>'pull-right'])!!}
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
</div>
@include('layouts.footer')


@endsection