@extends("frontmasterpage", ['albums' => $albums])

@section("content")


<div class="homecontainer">
	<div class="itemscontainer nieuws">
		@foreach($news as $item)
			{{$item->title}}
		@endforeach
	</div>
@stop