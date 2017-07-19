@extends("backmasterpage")

@section("content")
<div id="teambox" class="data-container scroll">

<div class="upper">
	<div class="information">
		<div class="team-name">
			<img class="flag" src="{{$team->url_flag}}"><h3>{{$team->name}}</h3>

		</div>

		<div class="team-info">
			<p>{{$team->about}}</p>
			@if($userrole === "1" || ($userrole === "2" && $userteam === $team->id))
		 		<small><a class="column-1-4" href="javascript:team_edit({{$team->id}});">edit</a></small>
			@endif
			@if($userrole === "1")
		 		<small> — <a class="column-1-4" href="{{ URL::action('TeamsController@getTeamDelete', $team->id) }}">delete</a></small>
			@endif
		</div>
	</div>

	<div class="cover" style="background-image: url('{{$team->url_cover}}');">
	</div>

</div>

<div class="lower">


	@if($users)
		<table class="zebra"> 
			<thead> 
				<tr> 
    				<th>Username</th> 
    				<th>Email</th> 
    				<th>Password</th>
    				<th>Edit</th>
				</tr> 
			</thead> 
			<tbody>
		@foreach($users as $user)
			<tr> 
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>Password</td>
				<td><a href="javascript:edit_user({{$user->id}});">Edit</a></td>
			</tr> 
		@endforeach

			</tbody> 
		</table> 
	@endif
	<div id="player-form">
		<table class="zebra"> 
			<thead> 
				<tr> 
    				<th>First Name</th> 
    				<th>Last Name</th> 
    				<th>Number</th> 
    				<th>Gender</th>
    				<th>Image</th>
    				@if($userrole <= "1")
    					<th>Edit</th>
    					<th>Delete</th>
    				@endif
				</tr> 
			</thead> 
			<tbody> 
		@foreach($team->players as $player)
			<tr> 
				<td>{{$player->first_name}}</td>
				<td>{{$player->last_name}}</td>
				<td>{{$player->number}}</td>
				<td>
					@if($player->gender === "0")
						Female
					@else
						Male
					@endif
				</td>
				<td>@if($player->url_image)
						<a href="{{$player->url_image}}">Picture</a>
					@else
						No Picture
					@endif
				</td>
				@if($edit)
					<td><a class="column-1-4" href="javascript:edit_player({{$player->id}});">edit</a></td>
					<td><a class="column-1-4" href="{{ URL::action('TeamsController@getPlayerDelete', $player->id) }}">delete</a></td>
				@endif
			</tr> 
		@endforeach
			</tbody> 
		</table> 
				@if($edit)
	 		<a class="add-button" href="javascript:create_player({{$team->id}});">+ New Player</a>
		@endif
	</div>
</div>

</div>

<div class="sidebar">
	@if($userrole === "1")
		<a id="create-team" class="add-button">+ New Team</a>
	@endif
	<div class="team-list">
		<ul>
			@foreach($teams as $item)
					<img class="flag" src="{{$item->url_flag}}"><a href="{{ URL::action('TeamsController@getTeam', $item->id) }}"><li class="team">{{$item->name}}</li></a>
			@endforeach
		</ul>
	</div>
</div>
@stop 