@extends('layout.theme')

	
@section('contents')

	<div class="row">
		<div class="col-md-3">
            <div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
			<div style="border-right:solid #BDBDBD;height:auto;">
				<a href="lifemembers" class="btn membtn_active">Life Members</a>
				<a href="ordinarymembers" class="btn membtn">Ordinary Members</a>
				<a href="forignmembers" class="btn membtn">Foreign Members</a>
				<a href="associatemembers" class="btn membtn">Associate Members</a>
			</div>
		</div></div>
		<div class="col-md-9">
            
			<div style="background-color: white;padding: 5px;">
                <h4>Life Members</h4>

       
            @foreach($lifemembers as $lifemember)

                @if($lifemember->requested_membership == "lm")   
                <div style="text-align: justify;width: 95%;">
                <div style="color:black; font-weight:bold;">
                    {{$lifemember->surname}}
                </div>
                
               
                <hr style="width:90% ">
                </div>
                        @if(!Auth::guest())
                            @if(Auth::user()->id==$lifemember->id)
                    <div class="row">
                        <div class="col-md-3">
                            
                    <a href="/special_publications/{{$lifemember->id}}/edit" class="btn membtn">Edit</a>
                    </div>
                    <div class="col-md-3">
                    {!!Form::open(['action'=>['specialpublicationscontroller@destroy',$lifemember->id],'method'=>'POST', 'class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width:95%;'])}}
                    {!!Form::close()!!}
                    </div>
                    </div>
                    @endif
                    @endif
                    @else

                  <p>Not found</p>

                  @endif

         
            @endforeach
              
		</div>
	</div>
</div>

@include('layouts.footer')
@endsection