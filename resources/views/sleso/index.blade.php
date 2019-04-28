@extends('layout.theme')


	
@section('contents')

<div class="row">

	<div class="col-md-3">
		<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;">
				<a href="/" class="btn membtn">Committee</a>
				<a href="/" class="btn membtn">Past Committee</a>
				<a href="/slesocom" class="btn membtn">SLESO Competition</a>
				<a href="/iesocom" class="btn membtn">International ESO Competition</a>
			</div>
	</div></div>

	<div class="col-md-9">
		<div style="background-color: #ffffff;padding: 20px;">
		<div><h3>Sri Lanaka Earth Science Olympiad Commitee - SLESOCom</h3></div><hr>
			
	</div></div></div><br><br><br>
@include('layouts.footer')
@endsection