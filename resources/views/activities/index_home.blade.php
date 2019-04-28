@extends('layout.theme')


	
@section('contents')

<style type="text/css">
	ul.gallery{    
margin-left: 3vw;     
margin-right:3vw;  
}    

.zoom {      
-webkit-transition: all 0.35s ease-in-out;    
-moz-transition: all 0.35s ease-in-out;    
transition: all 0.35s ease-in-out;     
cursor: -webkit-zoom-in;      
cursor: -moz-zoom-in;      
cursor: zoom-in;  
}     

.zoom:hover,  
.zoom:active,   
.zoom:focus {
/**adjust scale to desired size, 
add browser prefixes**/
-ms-transform: scale(2.5);    
-moz-transform: scale(2.5);  
-webkit-transform: scale(2.5);  
-o-transform: scale(2.5);  
transform: scale(2.5);    
position:relative;      
z-index:100;  
}

/**To keep upscaled images visible on mobile, 
increase left & right margins a bit**/  
@media only screen and (max-width: 768px) {   
ul.gallery {      
margin-left: 15vw;       
margin-right: 15vw;
}

/**TIP: Easy escape for touch screens,
give gallery's parent container a cursor: pointer.**/
.DivName {cursor: pointer}
}
</style>
<div class="row">
	<div class="col-md-3">
		<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;">
				<a href="/activities" class="btn membtn">GSSL Workshops</a>
				<a href="/activities_publictalk" class="btn membtn">GSSL Public Talk</a>
				<a href="/activities_technical_session" class="btn membtn">Technical Sessions</a>
				<a href="activities_field_excursion" class="btn membtn">Field Excursion</a>
				<a href="activities_annual_trip" class="btn membtn">Annual Pleasure Trip</a>
			</div>
	</div></div>
	<div class="col-md-9">
		<div><h3>GSSL Activities</h3></div><hr>
		<div style="background-color: #ffffff;padding: 20px; text-align: justify;">
			Geological Society of Sri Lanka organizes various kinds of activities such as workshops, annual technical session, public talks and field excursions. Workshops are intended to science dissemination, knowledge and skill transfer. ‘Public talks’ is a forum where distinguish speakers are invited to talk on interested or current topic related to geology or related discipline. ‘Annual Technical Sessions’ is an annual form for members to present and discuss their research findings and exchange ideas. ‘Field excursions’ is an event in which members explore the geology of Sri Lanka with an expert or experts.
				<br><br>
			<div class="row">
				<div class="col-md-6"><img class="thumbnail zoom" src="siteimages/ac1.jpg" width="100%" style="margin-bottom: 10px;"></div>
				<div class="col-md-6"><img class="thumbnail zoom" src="siteimages/ac2.jpg" width="100%" style="margin-bottom: 10px;"></div>
			</div><br>
			<div class="row">
				<div class="col-md-6"><img class="thumbnail zoom" src="siteimages/ac3.jpg" width="100%" style="margin-bottom: 10px;"></div>
				<div class="col-md-6"><img class="thumbnail zoom" src="siteimages/ac4.jpg" width="100%" style="margin-bottom: 10px;"></div>
			</div>
			
	</div>	</div>
</div>
@include('layouts.footer')
@endsection