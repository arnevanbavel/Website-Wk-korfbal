<!DOCTPYE html>
<html lang=nl id="viewporthtml">
<head> 
    <meta charset="utf-8">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="keywords, gescheiden, door, kommas">  
    <link rel="icon" href="favicon.png" />

    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subpages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media/media_max_1025.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media/media_max_850.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media/media_max_600.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media/media_max_450.css') }}">
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,500' rel='stylesheet' type='text/css'>

    <script src="{{ asset('js/vendor/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/alt_menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/waypoints.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>

    <title>Project</title>

</head>
<body id="viewportbody" onload="StartTimer()">
	<div class="page" id="canvas">
		<div id="altMenu" class="altMenu">
			<div class="mainMenu">
				<ul>
					<li><a href="{{ URL::action('FrontController@about') }}">{{ trans('translation.about') }}</a></li>
					<li id="competition" onclick="SlideMenuDeeper(id)">{{ trans('translation.competition') }}<i class="altMenuArrow fa fa-angle-right"></i></li>
					<li id="media" onclick="SlideMenuDeeper(id)">{{ trans('translation.media') }}<i class="altMenuArrow fa fa-angle-right"></i></li>
					<li><a href="{{ URL::action('GameController@getGame') }}">{{ trans('translation.game') }}</a></li>
				</ul>
			</div>
			<div class="subMenu" id="competitionSubMenu">
				<ul>
					<li class="altMenuBack" onclick="SlideMenuBack()">Menu<i class="altMenuBackArrow fa fa-angle-left"></i></li>
					<li><a href="{{ URL::action('FrontController@getTeams') }}">{{ trans('translation.teams') }}</a></li>
					<li><a href="{{ URL::action('FrontController@getEvents') }}">{{ trans('translation.Schedule') }}</a></li>
					<li><a href="{{ URL::action('FrontController@getLocations') }}">{{ trans('translation.Locations') }}</a></li>
					<li><a href="{{ URL::action('FrontController@getTickets') }}">{{ trans('translation.Tickets') }}</a></li>
					<li><a href="{{ URL::action('FrontController@getNews') }}">{{ trans('translation.News') }}</a></li>
				</ul>
			</div>
			<div class="subMenu" id="mediaSubMenu">
				<ul>
					<li class="altMenuBack" onclick="SlideMenuBack()">Menu<i class="altMenuBackArrow fa fa-angle-left"></i></li>
					@if($albums)
					@foreach($albums as $album)
					<li><a href="{{ URL::action('FrontController@getAlbum', $album->id) }}">{{$album->name}}</a></li>
					@endforeach
					@endif
					<li class="subMenuAllTab"><a href="{{ URL::action('FrontController@getMedia')}}">{{ trans('translation.AllAlbums') }}</a></li>
				</ul>
			</div>
		</div>
		<div class="header" id="header">
			<div class="headerLogo">
				<a href="{{ URL::action('FrontController@index') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
			</div>
			<div class="headerNavbar">
				<ul>
					<li><a href="{{ URL::action('FrontController@about') }}">{{ trans('translation.about') }}</a></li>
					<li class="extraMenu">
						<a id="competition" onclick="ShowMenu(id)">{{ trans('translation.competition') }}</a>
						<div class="iconcontainer">
		                  	<i id="competitionIcon" class="iconMenu fa fa-chevron-down"></i>
		                  	<i id="competitionClose" class="iconClose fa fa-close"></i>
		    			</div>
						<div class="navBarContent hidden" id="competitionContent">
							<div class="competitionTopic">
								<a href="{{ URL::action('FrontController@getTeams') }}"></a>
								<a href="{{ URL::action('FrontController@getTeams') }}"><h1>{{ trans('translation.teams') }}</h1></a>
								<a href="{{ URL::action('FrontController@getTeams') }}"><h2>Discover which teams participate</h2></a>
							</div>
							<div class="competitionTopic">
								<a href="{{ URL::action('FrontController@getEvents') }}"></a>
								<a href="{{ URL::action('FrontController@getEvents') }}"><h1>{{ trans('translation.Schedule') }}</h1></a>
								<a href="{{ URL::action('FrontController@getEvents') }}"><h2>Check when your team plays</h2></a>
							</div>
							<div class="competitionTopic">
								<a href="{{ URL::action('FrontController@getLocations') }}"></a>
								<a href="{{ URL::action('FrontController@getLocations') }}"><h1>{{ trans('translation.Locations') }}</h1></a>
								<a href="{{ URL::action('FrontController@getLocations') }}"><h2>Where you need to be</h2></a>
							</div>
							<div class="competitionTopic">
								<a href="{{ URL::action('FrontController@getTickets') }}"></a>
								<a href="{{ URL::action('FrontController@getTickets') }}"><h1>{{ trans('translation.Tickets') }}</h1></a>
								<a href="{{ URL::action('FrontController@getTickets') }}"><h2>Tickets are available here</h2></a>
							</div>
							<div class="competitionTopic">
								<a href="{{ URL::action('FrontController@getNews') }}"></a>
								<a href="{{ URL::action('FrontController@getNews') }}"><h1>{{ trans('translation.News') }}</h1></a>
								<a href="{{ URL::action('FrontController@getNews') }}"><h2>Stay up to date</h2></a>
							</div>

						</div>
					</li>
					<li class="extraMenu">
						<a id="media" onclick="ShowMenu(id)">{{ trans('translation.media') }}</a>
						<div class="iconcontainer">
		                  	<i id="mediaIcon" class="iconMenu fa fa-chevron-down"></i>
		                  	<i id="mediaClose" class="iconClose fa fa-close"></i>
		    			</div>
						<div class="navBarContent hidden" id="mediaContent">
													@if($albums)

							@foreach($albums as $album)
							<div class="mediaTopic">
								<a href="{{ URL::action('FrontController@getAlbum', $album->id) }}">@if($album->media_thumb->url_image)
													<div class="image" style="background: url('{{ $album->media_thumb->url_image }}')"></div>
						@else
							<img src="#"></a>
						@endif</a>
								<h1>{{$album->name}}</h1>
							</div>
							@endforeach

							@endif
							<div class="mediaAllTab">
								<a href="{{ URL::action('FrontController@getMedia') }}"><h1>{{ trans('translation.AllAlbums') }}</h1></a>
							</div>
						</div>
					</li>
					<li>
						<a href="{{ URL::action('GameController@getGame') }}">Game</a>
					</li>
					<li class="extraMenu">
						<div id="search" onclick="ShowMenu(id)" class="iconcontainer">
							<i id="searchIcon" class="searchIcon fa fa-search"></i>
							<i id="searchClose" class="searchClose fa fa-close"></i>
						</div>
						<div class="navBarContent hidden" id="searchContent">
							{!!Form::open(array('id'=>'searchform'))!!}
							{!!Form::text('search',null,['id'=>'search-input','placeholder'=>'Type to search...'])!!}
							{!!Form::close()!!}

							<div id="search-results">
	
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="altMenuContainer">
				<i onclick="ShowAltMenu()" id="altMenuIcon" class="burgerIcon fa fa-bars"></i>
				<i onclick="CloseAltMenu()" id="altMenuClose" class="burgerClose fa fa-close"></i>
				<div id="altMenuContent" class="altMenuContent">
					
				</div>
			</div>
		</div>



	@yield("content")
		<div class="footer">
			<div class="footerContainer">
                <div class="columnContainer">
	                <div class="column">
	                    <ul>
	                        <li>{{ trans('translation.about') }}</li>
	                        <li>{{ trans('translation.game') }}</li>
	                    </ul>
	                </div>
	                <div class="column">
	                    <ul>
	                        <li><a href="http://www.ikf.org/">IKF</a></li>
	                        <li><a href="https://twitter.com/korfball">Twitter</a></li>
	                    </ul>
	                </div>
	                <div class="column">
	                    <ul>
	                        <li><a href="{{ URL::action('DashboardController@index') }}">Login</a></li>
	                        <li><?php  if(Cookie::get('locale') === 'en'){
	                        				$selected ='en';
	                        			}
	                        			else{
	                        				$selected ='nl';
	                        			} ?>
	                        {!! Form::open(array('route' => 'chooser','id'=>'langform')) !!}
	                        	{!!Form::select('locale', [
   									'en' => 'English',
   									'nl' => 'Nederlands'],$selected, array('id' => 'selectid')
								)!!}
								{!! Form::close() !!}
	                        </li>          
	                    </ul>
	                </div>
	                <div class="column">
	                        <a href="#"><img src="{{ asset('images/logo.png') }}" alt="logo" width="75px"></a>
	                </div>
	            </div>
            </div>
		</div>
	</din>
	<script>

		    $filters = $('#langform');


		    $filters.on('change', '#selectid', function() {
		    	
		    	
		        $filters.submit();
		    });


    </script>
</body>
<script src="{{ asset('/js/search.js') }}"></script>
</html>