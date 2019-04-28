
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
		<div class="col-md-4">
			<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;margin: 10px;">
				<a href="/awards" class="btn membtn">Go Back</a>
				<a href="/tissa_munasinghe_scholarship" class="btn membtn">Tissa Munasinghe Scholarship</a>
				<a href="/pw_vitanage_memorial_scholarship" class="btn membtn">P.W.Vitanage Memorial Scholarship</a>
				<a href="/undergraduate_research_awards" class="btn membtn">GSSL Undergraduate Research Award</a>
				<a href="pg_cooray_medal" class="btn membtn">PG Cooray Medal</a>
				<a href="/ljd_medal" class="btn membtn_active">L.J.D.Fernando Memorial Medal</a>
				<a href="ananda_coomaraswamy_medal" class="btn membtn">Ananda Coomaraswamy Medal</a>
				
				
				
			</div>
	</div>
		</div>
		<div class="col-md-8">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;">L.J.D.Fernando Memorial Medal</div><br>
			@if(count($ljd_medals)>0)
			@foreach($ljd_medals as $ljd_medal)
				<div style="text-align: justify;width: 95%;">
				<div style="color:black; font-weight:bold;">
					{{$ljd_medal->title}}
				</div>
				
				{!!$ljd_medal->body!!}
				<hr style="width:90% ">
				</div>
						@if(!Auth::guest())
							@if(Auth::user()->id==$ljd_medal->user_id)
					<div class="row">
						<div class="col-md-3">
							
					<a href="/ljd_medal/{{$ljd_medal->id}}/edit" class="btn membtn">Edit</a>
					</div>
					<div class="col-md-3">
					{!!Form::open(['action'=>['ljdmedalcontroller@destroy',$ljd_medal->id],'method'=>'POST', 'class'=>'pull-right'])!!}
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