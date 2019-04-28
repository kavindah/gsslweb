
@extends('layout.theme')

@section('contents')

    <div class="container">
        <div style="text-align: justify;clear: both;">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    <div>{!!$calender->title!!}</div>
                    <div class="articletime">&#xe023; &nbsp;{{$calender->created_at}}</div><br>
                </div>
            </div>
        </div>


        @if(!Auth::guest())
            @if(Auth::user()->id==$calender->user_id)
                <div class="row">
                    <div class="col-md-3">
                        <a href="/calendar_event/{{$calender->id}}/edit" class="btn membtn">Edit</a>
                    </div>
                    <div class="col-md-3">
                        {!!Form::open(['action'=>['ArticleController@destroy',$calender->id],'method'=>'POST', 'class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'width:100%;'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            @endif
        @endif
    </div>@include('layouts.footer')
@endsection