<div class="searchDiv">
@if(count($tags) != 0)
<p>Tags</p>
@foreach($tags as $tag)
	<a href="/dashboard/news/tag/{{$tag->id}}"><li>{{$tag->name}}</li></a>
@endforeach
@endif

@if(count($teamtags) != 0)
<p>Team tags</p>
@foreach($teamtags as $teamtag)
	<a href="/dashboard/news/tag/{{$teamtag->id}}"><li>{{$teamtag->name}}</li></a>
@endforeach 
@endif

@if(count($teams) != 0)
<p>Teams</p>
@foreach($teams as $team)
	<a href="/dashboard/team/{{$team->id}}"><li>{{$team->name}}</li></a>
@endforeach
@endif

@if(count($players) != 0)
<p>Players</p>
@foreach($players as $player)
	<a href="/dashboard/team/{{$player->team->id}}"><li>{{$player->first_name}}</li></a>
@endforeach
@endif

@if(count($events) != 0)
<p>Events</p>
@foreach($events as $event)
	<a href="/dashboard/event/{{$event->id}}"><li>{{$event->subject}}</li></a>
@endforeach 
@endif

@if(count($albums) != 0)
<p>Albums</p>
@foreach($albums as $album)
	<a href="/dashboard/album/{{$album->id}}"><li>{{$album->name}}</li></a>
@endforeach 
@endif

@if(count($media) != 0)
<p>Media</p>
@foreach($media as $item)
	<a href="/dashboard/media/tag/{{$item->id}}"><li>{{$item->description}}</li></a>
@endforeach 
@endif

@if(count($locations) != 0)
<p>Locations</p>
@foreach($locations as $location)
	<a href="/dashboard/location/{{$location->id}}"><li>{{$location->name}}</li></a>
@endforeach 
@endif
</div>

