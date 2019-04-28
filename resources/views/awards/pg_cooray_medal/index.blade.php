
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
<div style="background-color: #ffffff;margin: 10px">
	<div class="row">
		<div class="col-md-4">
			<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;">
				<a href="/awards" class="btn membtn">Go Back</a>
				<a href="/tissa_munasinghe_scholarship" class="btn membtn">Tissa Munasinghe Scholarship</a>
				<a href="/pw_vitanage_memorial_scholarship" class="btn membtn">P.W.Vitanage Memorial Scholarship</a>
				<a href="/undergraduate_research_awards" class="btn membtn">GSSL Undergraduate Research Award</a>
				<a href="/pg_cooray_medal" class="btn membtn_active">PG Cooray Medal</a>
				<a href="/ljd_medal" class="btn membtn">L.J.D.Fernando Memorial Medal</a>
				<a href="/ananda_coomaraswamy_medal" class="btn membtn">Ananda Coomaraswamy Medal</a>
				
				
			</div>
	</div>
		</div>
		<div class="col-md-8">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;">PG Cooray Medal</div>
			<p>To honour Prof. P.G. Cooray for his outstanding contribution to earth science, the geological society of
				Sri Lanka awards the P.G. Cooray Medal every year from 1995, to the most outstanding young Sri
				Lankan earth scientist. The nominee should be under 35 years of age at the time of nomination and

				the nomination should be accompanied by a copy of the article, thesis, book or patent on which the
				nomination is based. The thesis or publication could be based on work done in a foreign country or in
				Sri Lanka. The nomination may be made by the nominee himself/herself or by the Head and one other
				of the institution for which nominee works.  In addition to the medal, starting with 2015 the medal
				recipient would receive a cash award of  Rs 50,000  <b>‘In memory of Gerald and Joan Cooray’</b>, presented
				by their daughter and grandson, Shantini Ann and Jamie.</p>
			<br>
			@if(count($pgs)>0)
			@foreach($pgs as $pg)
				<div style="text-align: justify;width: 95%;">
				<div style="color:black; font-weight:bold;">
					{{$pg->title}}
				</div>
				
				{!!$pg->body!!}
				<hr style="width:90% ">
				</div>
						@if(!Auth::guest())
							@if(Auth::user()->id==$pg->user_id)
					<div class="row">
						<div class="col-md-3">
							
					<a href="/pg_cooray_medal/{{$pg->id}}/edit" class="btn membtn">Edit</a>
					</div>
					<div class="col-md-3">
					{!!Form::open(['action'=>['pgcontroller@destroy',$pg->id],'method'=>'POST', 'class'=>'pull-right'])!!}
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