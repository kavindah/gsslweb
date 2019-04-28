<?php  
    use Illuminate\Support\Facades\Crypt;
    ?>

@extends('layout.theme')

@section('contents')
<a href="/login" class="btn btn-success">Go to Dashboard</a><br>
<hr>
<h3>New Member Requests</h3><br><br>

        <table class=" table table-bordered">
            <tr align="center">
                <th>Date</th>
                <th>Surname</th>
                

                 <th>Responses</th>
                
            </tr>
            @if(count($req)>0)
             @foreach($req as $memreq)
            <tr align="center">
                <td>{{$memreq->created_at}}</td>
                <td>{{$memreq->surname}}</td>
                
                <td>
                    
                  <?php  $id=Crypt::encrypt($memreq->id); ?>
                   <a href="/member_request/{{$id}}/edit" class="btn btn-success">More..</a>
                  
                    
               

            </tr> @endforeach
        </table>
        
   

@else

    <p>No requests</p>
@endif
@include('layouts.footer')
@endsection

