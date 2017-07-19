@extends("backmasterpage")

@section("content")

	<div class="data-container scroll">		
	@if($userrole <= "2")
		<a href="#" id="create-news-mobile" class="add-button-mobile"> + Add News</a>
	@endif
		<div id="editnews">
			<div class="news-container">
				<h3>{{$title}}</h3>
				@foreach($news as $item)
					<div class="news-item">
						@if(!($item->sender_team === "0"))
							<img src="{{$item->team->url_flag}}" class="flag">
						@else
							<img src="/img/admin.jpg" class="flag">
						@endif
						<a href="{{ URL::action('NewsController@getNews', $item->id) }}"><h2>{{$item->title}}</h2></a>
						<small>Posted on: {{date("l j F - H:i:s", strtotime($item->publish_at))}}</small>
						@if($userrole === "1" || ($userteam = $item->sender_team && $userrole === "2"))
							<small>(<a href="javascript:edit_news({{$item->id}});">Edit</a></small> — <small><a href="{{ URL::action('NewsController@getDeleteNews', $item->id) }}">Delete</a> — </small><a href="{{ URL::action('NewsController@hideShowNews', $item->id) }}"><small><?php echo ($item->visible?"hide":"show")?></small></a>)</small>
						@endif
						
						<p>{{substr($item->body_eng, 0, 200)}}...</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="sidebar">
		@if($userrole <= "2")
		<a href="#" id="create-news" class="add-button"> + Add News</a>
		@endif
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