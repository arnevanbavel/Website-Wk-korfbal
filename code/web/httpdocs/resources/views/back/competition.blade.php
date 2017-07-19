@extends("backmasterpage")

@section("content")

	<div class="data-container scroll">
		@if($userrole <= "2")
				<a href="#" id="create-event-mobile" class="add-button-mobile-2"> + Add Event</a>	<a href="#" id="create-location-mobile" class="add-button-mobile-2"> + Add Location</a>
		@endif
		<div id="editevents">
			<div class="news-container">
				<h3>{{$title}}</h3>
				@foreach($events as $item)
					<div class="event-item">
            			<div class="information">
							<a href="{{ URL::action('EventsController@getEvent', $item->id) }}"><h2>{{$item->subject}}</h2></a>
							<small>From: {{date("H:i:s", strtotime($item->date_start))}} Untill: {{date("H:i:s", strtotime($item->date_end))}} </small>
							<div class="other">
							@if($item->tournament)
                  				<img src="{{$item->teama->url_flag}}"> vs <img src="{{$item->teamb->url_flag}}">
                			@else
                				<p>{{$item->body}}</p>
                			@endif
                			</div>
						</div>

              			<div class="date">
              				<div class="date-month">{{date("j", strtotime($item->date_start))}}</div>
              				<div class="date-day">{{date("F", strtotime($item->date_start))}}</div>
              			</div>
					</div>

				@endforeach
			</div>
		</div>
	</div>

	<div class="sidebar">
		@if($userrole <= "2")
		<a href="#" id="create-event" class="add-button"> + Add Event</a>
		@endif
		<div class="content">
					<a href="{{ URL::action('EventsController@index') }}">All Events</a>

			<h2>Tags</h2>
			<div class="tags">
			@foreach($locations as $location)
				{{$location->name}}
				@if($userrole == 1 || ($userrole == 2 && $location->sender_team == $userteam))
				<a href="javascript:location_edit({{$location->id}});">edit</a>
				@endif
			@endforeach
			</div>
			<div class="createlocation">
				<div id="locationform"></div>
				@if($userrole <= "2")
				<a href="#" id="create-location"> Add Location</a>
				@endif
			</div>

			<h2>Teams</h2>
				@foreach($teams as $item)
				<div class="teamtag">
					<img class="flag" src="{{$item->url_flag}}"><a href="{{ URL::action('EventsController@getTeamEvents', $item->id) }}">{{$item->name}}</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop  