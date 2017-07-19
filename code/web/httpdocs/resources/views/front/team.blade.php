@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="teamIndContainer">
				<div class="blockTitle">
					<a href="/team/">View all teams</a>
				</div>
				<div class="individualContainer">
					<div class="leftContainer container">
						<h1>{{$team->name}}</h1>
						<p>{{$team->about}}</p>
						<a href="{{$team->url_facebook}}"><img src="/images/facebook-logo.png" alt="facebook"></a>
					</div>
					<div class="rightContainer container">
						<div class="image" style="background: url('{{$team->url_cover}}');">

						</div>
					</div>
				</div>
				<div class="blockTitle bottomBlockTitle">
					<h1>Team players</h1>
				</div>
				<div class="span4Container teamPlayers">
				@foreach($team->players as $player)
					<div class="span4">
						@if($player->url_image)
						<div class="image" style="background: url({{$player->url_image}});">

						</div>
						@endif
						<h1>{{$player->first_name}} — {{$player->last_name}}</h1>
					</div>
				@endforeach
				</div>
				<div class="blockTitle bottomBlockTitle">
					<a href="/news/tag/{{$team->id}}"><h1>Team news</h1></a>
				</div>
				<div class="span4Container newsHomepage">
<!-- 					<div class="span4">
						<div class="image" style="background: url(images/slide3.jpg);">

						</div>
						<h1>Title</h1>
						<p>This is the description of this contentbox. Probably it says something about korfball or k ball in slang.</p>
						<a href="news_ind.html">Lees meer</a>
						<div class="labels">
							<h3 class="label">sport</h3>
							<h3 class="label">korfbal</h3>
							<h3 class="label">winning</h3>
						</div>
					</div>
					<div class="span4 highlight">
						<div class="image" style="background: url(images/slide2.jpg);">

						</div>
						<h1>Title</h1>
						<p>This is the description of this contentbox. Probably it says something about korfball or k ball in slang.</p>
						<a href="news_ind.html">Lees meer</a>
						<div class="labels">
							<h3 class="label">bal</h3>
							<h3 class="label">verlies</h3>
						</div>
					</div>
					<div class="span4">
						<div class="image" style="background: url(images/slide1.jpg);">

						</div>
						<h1>Title</h1>
						<p>This is the description of this contentbox. Probably it says something about korfball or k ball in slang.</p>
						<a href="news_ind.html">Lees meer</a>
						<div class="labels">
							<h3 class="label">afgemaakt</h3>
							<h3 class="label">korfbal</h3>
						</div>
					</div>
					<div class="span4">
						<div class="image" style="background: url(images/slide3.jpg);">

						</div>
						<h1>Title</h1>
						<p>This is the description of this contentbox. Probably it says something about korfball or k ball in slang.</p>
						<a href="news_ind.html">Lees meer</a>
						<div class="labels">
							<h3 class="label">teamgeest</h3>
						</div>
					</div>
				</div> -->
			</div>
		</div></div>


@stop