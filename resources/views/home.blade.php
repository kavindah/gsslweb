@extends('layout.theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                    <img width="100%" height="130px;" style="border: solid;border-radius: 5px;" src="/storage/profile_photos/{{Auth::user()->profile_photo}}"></div>
                        
                    </div>
                        <br>

                    <div class="row">
                        <div class="col-md-4">Name</div>
                        <div class="col-md-8">{{ Auth::user()->name }}</div>
                    </div><hr>

                    <div class="row">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-8"> {{ Auth::user()->email }}</div>
                    </div><hr>

                    <div class="row">
                        <div class="col-md-4">Contact No:</div>
                        <div class="col-md-8"> {{ Auth::user()->office_tp }}</div>
                    </div><hr>

                    <div class="row">
                        <div class="col-md-4">Address</div>
                        <div class="col-md-8"> {{ Auth::user()->office_address }}</div>
                    </div><hr><br>

                     <a href="/user_edit/{{Auth::user()->id}}/edit" class="btn btn-success">Edit</a>
                    
                   
                    
                    
               

    
    
                </div>
            </div>
        </div>
    </div>
</div>@include('layouts.footer')
@endsection

