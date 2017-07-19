@extends("frontmasterpage", ['albums' => $albums])

@section("content")
<div class="mainSliderContainer">
			<div class="slidercontainer">
                <div class="sliderviewport">
                    <div class="slider" id="slider">
                    	<a href="schedule_upcoming.html">
	                        <div class="slide" id="slide1">
	                            <div class="titleblock">
	                                <h3>Check out when your team plays!</h3>
	                                <h1>Upcoming Games</h1>
	                            </div>
	                        </div>
	                    </a>
	                    <a href="tickets.html">
	                        <div class="slide" id="slide2">
	                            <div class="titleblock">
	                                <h3>Get them here!</h3>
	                                <h1>Tickets</h1>
	                            </div>
	                        </div>
	                    </a>
	                    <a href="game.html">
	                        <div class="slide" id="slide3">
	                            <div class="titleblock">
	                                <h3>Beat the highscore!</h3>
	                                <h1>Play K-Ball</h1>
	                            </div>
	                        </div>
	                    </a>
                    </div>
                </div>
            </div>
            <div class="bulletscontainer">
                <ul>
                    <li class="active" id="bullet1" onclick="PermissionToSlideTo(id)"><a><img src="images/menu-slider-01.png" alt=""></a><img src="images/menu-slider-02.png" alt=""></li>
                    <li id="bullet2" onclick="PermissionToSlideTo(id)"><a><img src="images/menu-slider-01.png" alt=""></a><img src="images/menu-slider-02.png" alt=""></li>
                    <li id="bullet3" onclick="PermissionToSlideTo(id)"><a><img src="images/menu-slider-01.png" alt=""></a><img src="images/menu-slider-02.png" alt=""></li>
                </ul>
            </div>
		</div>

			<div class="bCBContainer" id="changeHeader">
				<div class="bigContentBox leftBox">
					<div class="bCBContent">
<a href="/game/">
							<div class="image kball">

							</div>
						</a>
					</div>
				</div>
				<div class="bigContentBox rightBox">
					<div class="bCBContent">
						@foreach($events as $item)
						<div class="matchbox">
							<img src="flags/{{$item->team_a}}.png" alt="">
							<h2 class="leftScore">-</h2>
							<h1>VS</h1>
							<h2 class="rightScore">-</h2>
							<img src="flags/{{$item->team_b}}.png" alt="">
						</div>
						@endforeach
					</div>
				</div>
			</div>

		<div class="pageContainer">
			<div class="span4Container newsHomepage">
				@foreach($news as $item)
				<div class="span4">
					@if($item->url_image)
						<div class="image" style="background: url('{{$item->url_image}}')"></div>
					@endif
					@if($item->url_youtube)
						<div class="image" style="background: url('http://img.youtube.com/vi/{{$item->url_youtube}}/0.jpg')"></div>
					@endif
					
					<h1>{{$item->title}}</h1>
					<p>{{substr($item->body_eng, 0, 60) }}</p>
					<a href="news/{{$item->id}}">Lees meer</a>
					<div class="labels">
					@foreach ($item->tags as $item)
						<a href="/news/tag/{{$item->id}}"><h3 class="label">{{$item->name}}</h3></a>
					@endforeach
				</div>
				</div>@endforeach
			</div>
		</div>

		<div class="flagContainer">
			@foreach($teams as $item)
			<div class="flag">
				<a href="{{ URL::action('FrontController@getTeam', $item->id) }}"><img src="{{$item->url_flag}}" alt=""></a>
			</div>
			@endforeach
		</div>
@stop