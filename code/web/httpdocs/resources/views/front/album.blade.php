@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="mediaContainer">
				<div class="blockTitle">
					<h1>Media</h1>
				</div>
				<div class="span4Container mediaBlocks">
					@foreach($album->media as $media)
						<div class="span4">
							@if($media->url_image)
								<div class="image" style="background: url('{{$media->url_image}}');">

								</div>
								<a href="{{$media->url_image}}"><h1>View</h1></a>
							@else
								<div class="image" style="background: url('http://img.youtube.com/vi/{{$media->url_youtube}}/0.jpg');">

								</div>
								<a href="{{$media->url_youtube_full}}"><h1>Watch on youtube</h1></a>
							@endif
							<a ><h1>{{$media->description}}</h1></a>
						</div>
					@endforeach

				</div>
			</div>
		</div>
@stop