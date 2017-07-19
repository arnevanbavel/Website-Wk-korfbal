<style type="text/css">
	 #map-canvas {
        height: 300px;
        width: 300px;
        margin: 0px;
        padding: 0px
      }
</style>
<div class="team-formulier">
	<h3>Edit Location</h3>
	{!!Form::model($location,array('files' => true))!!}


		<br>
		<div class="clearfix"></div>
		{!!Form::label('name','Name:')!!}
		{!!Form::text('name',null)!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('search','Search:')!!}
		{!!Form::text('search',null,["id"=>"search"])!!}
		<br>				<div id="map-canvas">

			
		</div>
		<div class="clearfix"></div>
		{!!Form::label('long','long:')!!}
		{!!Form::text('long',null,["id"=>"lng"])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('lat','Lat:')!!}
		{!!Form::text('lat',null,["id"=>"lat"])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('street','street:')!!}
		{!!Form::text('street',null,["id"=>"street"])!!}
		<br>		<div class="clearfix"></div>
		{!!Form::label('number','number:')!!}
		{!!Form::text('number',null,["id"=>"number"])!!}
		<br>		<div class="clearfix"></div>
		{!!Form::label('city','city:')!!}
		{!!Form::text('city',null,["id"=>"city"])!!}
		<br>
		<div class="clearfix"></div>
		@if($location->url_image)
			<img src="{{$location->url_image}}" style="height:50px;width:50px;">
			{!!Form::label('url_image_delete','delete:')!!}
			{!!Form::hidden('url_image_delete', false) !!}
    		{!!Form::checkbox('url_image_delete', true) !!}
    	@endif
		{!!Form::label('url_image','Image:')!!}
    	{!! Form::file('url_image', null) !!}
		<br><br>
		@if($userrole === "1")

		    	<div class="checkbox">
   			{!!Form::label('public','Public:')!!}
			{!!Form::hidden('public', false)!!}
    		{!!Form::checkbox('public', true)!!} 		
    	</div>
    	@endif
		<div class="clearfix"></div>
		{!!Form::submit('Update Location')!!}
		<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
	</div>


	<script type="text/javascript">
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: 27.72,
			lng: 85.36

		},
		zoom:15
	});
	var marker = new google.maps.Marker({
		position:{
			lat: 27.72,
			lng: 85.36

		},
		map:map,
		draggable:true,
	});
	var defaultBounds = new google.maps.LatLngBounds(
	  new google.maps.LatLng(-33.8902, 151.1759),
	  new google.maps.LatLng(-33.8474, 151.2631));

	var input = document.getElementById('search');

	var searchBox = new google.maps.places.SearchBox(input, {
	  bounds: defaultBounds
	});

	 google.maps.event.addListener(searchBox, 'places_changed', function() {
    	var places = searchBox.getPlaces();
    	var bounds = new google.maps.LatLngBounds();
    	var place, i;

	 	for (var i = 0; place = places[i]; i++) {
      		bounds.extend(place.geometry.location);
	 		marker.setPosition(place.geometry.location);
	 	}

	 	map.fitBounds(bounds);
	 	map.setZoom(15);
	 	console.log(marker);
	 });

	 google.maps.event.addListener(marker,'position_changed',function(){
	 	var lat = marker.getPosition().lat();
	 	var lng = marker.getPosition().lng();

	 	$('#lat').val(lat);
	 	$('#lng').val(lng);
	 });
</script>




