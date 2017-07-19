@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="mediaContainer">
				<div class="blockTitle">
					<h1>All Albums</h1>
				</div>
				<div class="span4Container mediaBlocks">
					@foreach($albums as $album)

					<div class="span4 ">

						@if($album->media_thumb->url_image)
							<div class="image" style="background: url('{{$album->media_thumb->url_image}}');">
								
							</div>
						@endif
						<a href="{{ URL::action('FrontController@getAlbum', $album->id) }}">
							<h1>{{$album->name}}</h1>
						</a>
					</div>

					@endforeach
				</div>
			</div>
		</div>
@stop