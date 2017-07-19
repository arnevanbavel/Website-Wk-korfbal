<div class="tagsContainer">
<div class="searchDiv">

@if(count($tags) != 0)
<div class="tagContainer">
<h1>Tags</h1>
@foreach($tags as $tag)
	<a href="/news/tag/{{$tag->id}}"><h2>{{$tag->name}}</h2></a>
@endforeach
</div>
@endif

@if(count($teamtags) != 0)
<div class="tagContainer">
<h1>Team tags</h1>
@foreach($teamtags as $teamtag)
	<a href="/news/tag/{{$teamtag->id}}"><h2>{{$teamtag->name}}</h2></a>
@endforeach 
</div>
@endif

@if(count($teams) != 0)
<div class="tagContainer">
<h1>Teams</h1>
@foreach($teams as $team)
	<a href="/team/{{$team->id}}"><h2>{{$team->name}}</h2></a>
@endforeach
</div>
@endif

@if(count($players) != 0)
<div class="tagContainer">
<h1>Players</h1>
@foreach($players as $player)
	<a href="/team/{{$player->team->id}}"><h2>{{$player->first_name}}</h2></a>
@endforeach
</div>
@endif

@if(count($events) != 0)
<div class="tagContainer">
<h1>Events</h1>
@foreach($events as $event)
	<a href="/event/{{$event->id}}"><h2>{{$event->subject}}</h2></a>
@endforeach 
</div>
@endif

@if(count($albums) != 0)
<div class="tagContainer">
<h1>Albums</h1>
@foreach($albums as $album)
	<a href="/album/{{$album->id}}"><h2>{{$album->name}}</h2></a>
@endforeach 
</div>
@endif

@if(count($media) != 0)
<div class="tagContainer">
<h1>Media</h1>
@foreach($media as $item)
	<a href="/media/tag/{{$item->id}}"><h2>{{$item->description}}</h2></a>
@endforeach 
</div>
@endif

@if(count($locations) != 0)
<div class="tagContainer">
<h1>Locations</h1>
@foreach($locations as $location)
	<a href="/location/{{$location->id}}"><h2>{{$location->name}}</h2></a>
@endforeach 
</div>
@endif
</div>
</div>