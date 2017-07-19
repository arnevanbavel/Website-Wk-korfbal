@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="teamsContainer">
				<div class="blockTitle">
					<h1>Teams</h1>
				</div>
				<div class="span4Container">
				@foreach($teams as $team)
					<div class="span4">
						
						<div class="image" style="background: url({{$team->url_flag}});">
						</div>
						<a href="/team/{{$team->id}}"><h1>{{$team->name}}</h1></a>
					</div>
				@endforeach
				</div>
			</div>
		</div>
@stop