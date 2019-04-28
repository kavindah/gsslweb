
@extends('layout.theme')


	
@section('contents')

<div style="background-color: #ffffff">
	<div class="row">
		<div class="col-md-3">
			<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;margin: 10px;">
				<a href="/abstract_volume" class="btn membtn">Abstract Volumes</a>
				<a href="/news_letters" class="btn membtn">News Letters</a>
				<a href="/special_publications" class="btn membtn">Special Publications</a>
				<a href="/gssl_book" class="btn membtn">Proposed GSSL Book</a>
				
				
				
				
			</div>
	</div>
		</div>
		<div class="col-md-9">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;"></div><br>
			<h4>GSSL Publications</h4>
			<p>The Geological Society of Sri Lanka publishes related knowledge of earth science, news and
				current topics periodically as various publications as Jornal of the Geological Society of Sri
				Lanka, special publications, abstracts and the newsletter. The Journal of the Geological
				Society of Sri Lanka publishes research articles. Memoirs, books and workshop proceedings
				are published as special publications. Annual conference proceedings are published as
				abstracts. The Geological Society of Sri Lanka Newsletter, is published biannually in
				June and December.</p>
			

</div></div>
@include('layouts.footer')
@endsection