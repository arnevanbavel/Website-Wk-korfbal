@extends("backmasterpage")

@section("content")
	<div class="data-container">

		<div id="mediaform">
		@if($userrole <= "2")
		<a href="#" id="create-album-mobile" class="add-button-mobile"> + Add Album</a>
		@endif
		@foreach($albums as $item)
			<div class="album">
				<a href="{{ URL::action('MediaController@getAlbum', $item->id) }}">
					@if($item->media_thumb->url_image)
						<img src="{{ $item->media_thumb->url_image }}">
					@endif
					@if($userrole === "1" || ($userrole === "2" && $userteam === $item->sender_team))	
					<a href="javascript:album_edit({{$item->id}})">edit</a> — <a href="{{ URL::action('MediaController@getAlbumDelete', $item->id) }}">delete</a>
					@endif
					<h2>{{$item->name}}</h2>
				</a>
			</div>
		@endforeach
		</div>
	</div>

	<div class="sidebar">
							@if($userrole <= "2")

		<a href="#" id="create-album" class="add-button"> + Add Album</a>
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