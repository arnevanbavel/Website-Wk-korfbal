@extends("frontmasterpage", ['albums' => $albums])

@section("content")
<style type="text/css">
	 .map-canvas {
        height: 300px;
        width: 100%;
        margin: 0px;
        padding: 0px;
      }
</style>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>

		<div class="pageContainer" id="changeHeader">
			<div class="locationsContainer">
				<div class="blockTitle">
					<h1>{{ trans('translation.Locations') }}</h1>
				</div>
				@foreach($locations as $location)
				<div class="individualContainer location">
					<div class="leftContainer container">
						<h1>{{$location->name}}</h1>
						<p>{{$location->number}}<p>
						<p>{{$location->street}}</p>
						<p>{{$location->city}}</p>
						<a href="maps">get route to here</a>
					</div>
					<div class="rightContainer container" id="map-canvas2">
						@if($location->url_image)
							<img src="{{$location->url_image}}">
						@endif
					</div>
					<div class="bottomContainer container">
						<div class="map-canvas" id="{{$location->id}}"></div>
							<script type="text/javascript">
								 var lat = {{ $location->lat }};
								 var lng = {{ $location->long }};
							
								var map = new google.maps.Map(document.getElementById('{{$location->id}}'),{
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

					
				</div>
		</div>
				@endforeach
							</div>
		</div>
@stop

