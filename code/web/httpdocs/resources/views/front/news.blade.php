@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="blockTitle">
				<h1>News</h1>
			</div>
			<div class="span4Container newsHomepage">
				@foreach($news as $item)
					<div class="span4">
						@if($item->url_image)
							<div class="image" style="background: url('{{$item->url_image}}'); background-size: cover;"></div>

						@endif
						@if($item->url_youtube)
							<div class="image" style="background: url('http://img.youtube.com/vi/{{$item->url_youtube}}/0.jpg'); background-size: cover;"></div>

						@endif
						<a href="news/{{$item->id}}"><h1>{{$item->title}}</h1></a>
						<p>{{$item->body_eng}}</p>
						<a href="">Lees meer</a>
						<div class="labels">
						@foreach ($item->tags as $item)
							<a href="/tag/{{$item->id}}"><h3 class="label">{{$item->name}}</h3></a>
						@endforeach
						</div>
					</div>
				@endforeach
				</div>
			</div>

@stop