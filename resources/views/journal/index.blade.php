
@extends('layout.theme')


	
@section('contents')

<div style="background-color: #ffffff;padding: 10px;">
	<div class="row">
		<div class="col-md-3">
			<div data-wow-delay="0.5s" class="animated fadeInUp delay-7s">
		<div style="border-right:solid #BDBDBD;height:auto;margin: 10px;">
				<a href="journal_editorialboard" class="btn membtn">Editorial Board</a>
				<a href="journal_browse" class="btn membtn">Browse</a>
				<a href="journal_authorguidlines" class="btn membtn">Author Guidelines</a>
				<a href="journal_submit" class="btn membtn">Submit</a>
			</div>
	</div>
		</div>
		<div class="col-md-7 m-0 p-0">
			<div style="margin-top: 10px;font-weight: bold;font-size: 18px;text-align:justify;">Journal of the Geological Society of Sri Lanka (JGSSL)</div><br>

			<div style="text-align:justify;">Journal of the Geological Society of Sri Lanka (JGSSL) is a peer-reviewed and open access journal. It aims to publish the most topical and highest quality papers, summarizing the results of recent research across the full range of the Earth Sciences. Papers are frequently interdisciplinary in nature, often refer to regional studies and should emphasize the development of understanding of fundamental geological processes. The implications of regional studies should extend beyond their geographical context. Alternatively more specialized papers can be submitted, but they should be written in a style that is easily understood by non-specialists to illustrate the progress being made in that specific area of the Earth Sciences. Reviews on topics of current interest are also welcome, but they too should be written to cater for non-specialist readers. Specials are short papers on topical or controversial issues in Earth Sciences and receive fast-track reviewing procedures, allowing publication in less than 6 months.<br>

			The Journal of the Geological Society of Sri Lanka is published annually as a single issue, and the subscription price to institution and individual members is Rs. 500 (Sri Lankan) and US$ 30 (rest of the world). The journal will be dispatched by surface mail to all oversee subscribers.<br>

			Editorial correspondence and material submitted for publication should be addressed to the Editors, Geological Society of Sri Lanka. (email editors@gsslweb.org)<br>

			Business correspondence including orders and remittance relating to subscription, advertisements, back issues and off-prints should send to the Treasurer, Geological Society of Sri Lanka. All cheques should be crossed and made payable to ‘The Geological Society of Sri Lanka’. (tresurer@gsslweb.org).</div>
		</div>

		<div class="col-md-2">
			<div style="border-left:solid #BDBDBD;height:auto;margin: 10px;">
			<div style="text-align:center;margin-top:30px; font-size:16px;margin-bottom:10px;font-weight: bold;color:#5D6D7E; ">Latest Issue</div>
		</div>
	</div>
	</div></div>
@include('layouts.footer')
@endsection