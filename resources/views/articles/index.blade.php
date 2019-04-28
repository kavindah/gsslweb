<?php use Illuminate\Support\Facades\Crypt; ?>

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
<div class="container">
	<div style="text-align: justify;clear: both;">
		<div class="row">
			
			<div class="col-md-12 col-sm-12">
				
     				
					<h3>{{$articles->title}}</h3>
					<div>{!!$articles->body!!}</div>
					<div class="articletime">&#xe023; &nbsp;{{$articles->created_at}}</div><br>
					</div>
			</div>
		</div>
	

	@if(!Auth::guest())
		@if(Auth::user()->id==$articles->user_id)
<div class="row">
	<div class="col-md-3">

<a href="/articles/{{$articles->id}}/edit" class="btn membtn">Edit</a>
</div>
<div class="col-md-3">
{!!Form::open(['action'=>['ArticleController@destroy',$articles->id],'method'=>'POST', 'class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width:100%;'])}}
{!!Form::close()!!}
</div>
</div>
@endif
@endif
</div>@include('layouts.footer')
@endsection