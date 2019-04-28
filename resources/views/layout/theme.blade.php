<!DOCTYPE html>
<html>
<head>
	<title>Geological Society of Sri Lanka</title>
	
	<link rel="shortcut icon" href="{{asset('siteimages/logo.jpg')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	    <link href="{{ asset('css/wow.css') }}" rel="stylesheet">
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{ asset('bt/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>
	 	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
	
	<script>
			$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();
		});



	</script>
	

	 
</head>
<body class="bcolor">
	@include('layouts.app')

	<div class="container">
		@include('messages.messages')
		@yield('contents')
	</div>
	
		

	



	 <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}

	</script>
	<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
	

</body>
</html> 