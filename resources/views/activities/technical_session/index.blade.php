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
<div class="row">
	<div class="col-md-3">
		<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;">
			<a href="/activities_home" class="btn membtn">Go Back</a>
				<a href="/activities" class="btn membtn">GSSL Workshops</a>
				<a href="/activities_publictalk" class="btn membtn">GSSL Public Talk</a>
				<a href="/activities_technical_session" class="btn membtn_active">Technical Sessions</a>
				<a href="activities_field_excursion" class="btn membtn">Field Excursion</a>
				<a href="activities_annual_trip" class="btn membtn">Annual Pleasure Trip</a>
			</div>
	</div></div>
	<div class="col-md-9" style="background-color: #ffffff;padding: 10px;">
		<div><h3>Technical Sessions</h3></div><hr>
		<div style="background-color: #ffffff;padding: 10px;height: auto;">
			<div style="height: auto;">
			@if(count($technical_sessions)>0)
			@foreach($technical_sessions as $technical_session)
				<div style="font-weight: bold;font-size:18px; ">{{$technical_session->title}}</div>
				<div style="height: auto;background-color: #ffffff;font-size:15px;overflow: auto;text-align: justify;">{!!$technical_session->body!!}</div>
				<dir><img src="/storage/technicalsession_images/{{$technical_session->technicalsession_image}}" width="80%"onerror='this.style.display = "none"'></dir>
				<div style="color: gray; font-size:10px;">{{$technical_session->created_at}}</div>
			</div>
		@if(!Auth::guest())
		@if(Auth::user()->id==$technical_session->user_id)
<div class="row">
	<div class="col-md-3">
		
<a href="/technical_sessions/{{$technical_session->id}}/edit" class="btn membtn">Edit</a>
</div>
<div class="col-md-3">
{!!Form::open(['action'=>['technicalsessoioncontroller@destroy',$technical_session->id],'method'=>'POST', 'class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width:95%;'])}}
{!!Form::close()!!}
</div>
</div>
@endif
@endif <hr>
			@endforeach
		@else
			<p>No Public Talk found</p>
		@endif

		</div>
	</div>
</div>@include('layouts.footer')
@endsection