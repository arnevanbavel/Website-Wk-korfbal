@extends("backmasterpage")

@section("content")
<style type="text/css">
	 #map-canvas {
        height: 200px;
        width: 100%;
        margin: 0px;
        padding: 0px;
      }
</style>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>

	<div class="data-container scroll">			
		<div id="editevents">
			<div class="news-container">
				<h3>{{$title}}</h3>
					<div class="event-item">
            			<div class="information">
							<h2>{{$event->subject}}</h2></a>
							<small>From: {{date("H:i:s", strtotime($event->date_start))}} Untill: {{date("H:i:s", strtotime($event->date_end))}} </small>
													            				@if($userrole == "1" || ($userrole == "2" && $event->sender_team == $userteam))
<a href="javascript:event_edit({{$event->id}});">edit</a> — <a href="{{ URL::action('EventsController@getEventDelete', $event->id) }}">delete</a>@endif

							<div class="other">
							@if($event->tournament)
                  				<img src="{{$event->teama->url_flag}}"> vs <img src="{{$event->teamb->url_flag}}">
                			@else
                				<p>{{$event->body}}</p>
                			@endif
                				<p>{{$event->location->name}}</p>
                			</div>
						</div>

              			<div class="date">
              				<div class="date-month">{{date("j", strtotime($event->date_start))}}</div>
              				<div class="date-day">{{date("F", strtotime($event->date_start))}}</div>
              			</div>
              			<div id="map-canvas">
              				
              			</div>
					</div>
			</div>
		</div>
	</div>

	<div class="sidebar">
		@if($userrole <= 2)
		<a href="#" id="create-event" class="add-button"> + Add Event</a>
		@endif
		<div class="content">
					<a href="{{ URL::action('EventsController@index') }}">All Events</a>

			<h2>Tags</h2>
			<div class="tags">
			@foreach($locations as $location)
				{{$location->name}}
				@if($userrole == "1" || ($userrole == "2" && $location->sender_team == $userteam))
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

	<script type="text/javascript">
	 var lat = {{ $event->location->lat }};
	 var lng = {{ $event->location->long }};

	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: lat,
			lng: lng

		},
		zoom:15
	});
	var marker = new google.maps.Marker({
		position:{
			lat: lat,
			lng: lng

		},
		map:map
	});
	</script>
@stop  