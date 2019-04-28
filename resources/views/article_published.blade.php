
<?php 
use Illuminate\Support\Facades\Crypt;?>
@extends('layout.theme')

	
@section('contents')


<h3 style="margin-left: 2%;">Articles___</h3>
<div class="row">
	<div class="col-md-12"><div class="left_bar" style="height:auto;position:relative;  ">
   @if(count($articles)>0)
      @foreach($articles as $article) 
      <script>
  $(document).ready(function() {
    $(".fancybox").removeClass('fancybox');
});
</script>

            <div class="articlebody" style="width: 40%;float: left;margin-left: 5%">
                <div class="col-md-12"><img class="articlecover"
                                            src="/storage/article_images/{{$article->article_image}}">
                </div>
                <h4 style="color:green;margin-top: 10px">{{$article->title}}</h4>
                <div class="row">
                    <div class="col-md-12">
                        <?php $id = Crypt::encrypt($article->id); ?>
                        <div class="articletext">{!!$article->body!!}
                        </div>
                        <br>
                        <a href="/articles/{{$article->id}}"
                           style="font-size: 16px; color: #0040FF; cursor: pointer;float: left;">continue
                            reading..</a>
                        <div class="articletime"><span class="glyphicon glyphicon-time"></span>&#xe023;
                            &nbsp;{{$article->created_at}}</div>
                    </div>
                </div>
            </div>


         

      @endforeach

    @else
      <p>No articles here</p>
    @endif

  </div></div>
 {{ $articles->links() }}
  <div class="footer"></div>
</div>

  </div>@include('layouts.footer')
@endsection
	
		
	