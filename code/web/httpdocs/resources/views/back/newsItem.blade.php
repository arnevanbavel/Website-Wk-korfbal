@extends("backmasterpage")

@section("content")

	<div class="data-container scroll">			
		<div id="editnews">
					<div class="news-container">
			<div class="news-item">
				<h2>{{$news->title}}</h2><!-- highlight star --> <!-- media --> <!-- flag -->
				<small>Posted on: {{date("l j F - H:i:s", strtotime($news->publish_at))}}</small>
				@if($userrole === "1" || ($userteam = $news->sender_team && $userrole === "2"))
					<small><?php echo ($news->visible?"hidden":"shown")?></small></a> — <small>(<a href="javascript:edit_news({{$news->id}});">Edit</a></small> — <small><a href="{{ URL::action('NewsController@getDeleteNews', $news->id) }}">Delete</a>)</small>
				@endif				
				<p>{{$news->body_eng}}</p>
				<p>{{$news->body_nl}}</p>
				@if($news->url_image)
					<img src="{{$news->url_image}}">
				@endif
				@if($news->url_youtube)
					<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$news->url_youtube}}" frameborder="0" allowfullscreen></iframe>
				@endif


			</div>
		</div>
		</div>
	</div>

	<div class="sidebar">
		<div class="content">
					<a href="{{ URL::action('NewsController@index')}}">All News</a>
			<h2>Tags</h2>
			<div class="tags">
			@foreach($tags as $item)
				<a href="{{ URL::action('NewsController@getTagNews', $item->id) }}">{{$item->name}}</a>,
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
					<img class="flag" src="{{$item->teamtag->url_flag}}"><a href="{{ URL::action('NewsController@getTagNews', $item->id) }}">{{$item->name}}</a>
				</div>
			@endforeach
			</div>
		</div>
	</div>

@stop 