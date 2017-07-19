<!DOCTYPE html>
<html>
<head>
	<title>Front</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('/css/back.css') }}" rel="stylesheet">
	<!-- GOOGLE FONT -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
	
	<!-- JQUERY LIB -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<!-- CLNDR LIB -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
	<script src= "{{ asset('/js/moment-2.8.3.js') }}"></script>
	<script src="{{ asset('/js/clndr.js') }}"></script>
	<link href="{{ asset('/css/clndr.css') }}" rel="stylesheet">

	<!-- SELECT2 LIB -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

	<!-- DATETIMEPICKER LIB -->
	<script src="{{ asset('/js/jquery-ui-timepicker-addon.js') }}"></script>
	<link href="{{ asset('/css/jquery-ui-timepicker-addon.css') }}" rel="stylesheet">

	<!-- AJAX REQUESTS JS -->
	<script src="{{ asset('/js/message.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 560 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>

</head>
<body>
	<nav>
		<a href="/dashboard">
			<div class="back">
						Dashboard
			</div>
		</a>
		<div class="links">
			<ul>
				<li><a class="{{ Request::url() === ('http://localhost:8000/dashboard/events') ? 'active' : null }}" href="/dashboard/events">Competition</a></li>
				<li><a class="{{ Request::url() === ('http://localhost:8000/dashboard/media') ? 'active' : null }}" href="/dashboard/media">Media</a></li>
				<li><a class="{{ Request::url() === ('http://localhost:8000/dashboard/news') ? 'active' : null }}" href="/dashboard/news">News</a></li>
				<li><a class="{{ Request::url() === ('http://localhost:8000/dashboard/team/') ? 'active' : null }}" href="/dashboard/team">Teams</a></li>
				<li><a class="{{ Request::url() === ('http://localhost:8000/dashboard') ? 'active' : null }}" href="/dashboard">Messages</a></li>
			</ul>
		</div>
					<a href="#" id="pull">Dashboard menu</a>
		<div class="menu">
			{!!Form::open(array('id'=>'searchform'))!!}
			{!!Form::text('search','',['id'=>'search-input', 'placeholder'=>'Search..'])!!}
			{!!Form::close()!!}
			<a href="/dashboard/logout">
				<div class="logout">
					logout
				</div>
			</a>
		</div>


	</nav> 							
				<div id="search-results">
				</div>
<!-- 	<div class="container">
 -->
<div id="error">
	 	@if($errors->any())
 		@foreach($errors->all() as $error)
 		<li>{{$error}}</li>
 		@endforeach
 	@endif
</div>

		@yield("content")

	</div>
</body>

</html>