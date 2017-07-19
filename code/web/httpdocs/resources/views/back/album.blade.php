
@stop 

@extends("backmasterpage")

@section("content")
	<div class="data-container">
		<div id="mediaform">
		@if($userrole <= "2")
			<a href="#" id="create-media-mobile" class="add-button-mobile"> + Add Media</a>
		@endif

		<h3>{{$album->name}}</h3>
		@foreach($album->media as $media)
			<div class="album">
					@if($media->url_image)
						<img src="{{$media->url_image}}"><br>
						@if($userrole === "1" || ($userrole === "2" && $userteam === $media->sender_team))	
						<a href="{{$media->url_image}}" download>download</a> — <a href="javascript:media_edit({{$media->id}})">edit</a> — <a href="{{ URL::action('MediaController@deleteMedia', $media->id) }}">delete</a>
						@endif
					@else
						<img src="http://img.youtube.com/vi/{{$media->url_youtube}}/0.jpg">
						@if($userrole === "1" || ($userrole === "2" && $userteam === $media->sender_team))	
						<a href="{{$media->url_youtube_full}}">View</a> — <a href="javascript:media_edit({{$media->id}})">edit</a> — <a href="{{ URL::action('MediaController@deleteMedia', $media->id) }}">delete</a>
						@endif
					@endif
					<h2>{{$media->description}}</h2>
			</div>
		@endforeach
			</div>

	</div>


	<div class="sidebar">
						@if($userrole <= "2")

		<a href="#" id="create-media" class="add-button"> + Add Media</a>
				@endif

		<div class="content">
					<a href="{{ URL::action('MediaController@index') }}">All Albums</a>

			<h2>Tags</h2>
			<div class="tags">
			@foreach($tags as $item)
				<a href="{{ URL::action('MediaController@getTagMedia', $item->id) }}">{{$item->name}}</a>,
			@endforeach
			</div>
					@if($userrole <= "2")

			<div class="createtag">
				<div id="tagform"></div>
				<a href="#" id="create-tag"> Add tag</a>
			</div>
		@endif

			<h2>Teams</h2>
			@foreach($teams as $item)
				<div class="teamtag">
					<img class="flag" src="{{$item->teamtag->url_flag}}"><a href="{{ URL::action('MediaController@getTagMedia', $item->id) }}">{{$item->name}}</a>
				</div>
			@endforeach
			</div>
		</div>
	</div>

@stop 