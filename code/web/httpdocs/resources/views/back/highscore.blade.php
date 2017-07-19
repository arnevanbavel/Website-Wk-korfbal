@foreach($highscore as $item)
	{{$item->name}} {{$item->score}};
@endforeach