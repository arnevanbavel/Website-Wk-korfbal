@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="scheduleContainer">

				<div class="span2Container scheduleOptionsContainer">
					<div class="span2">
						<h1>Upcoming Games</h1>
					</div>
					<div class="span2">
      					<select  onChange="window.location.href=this.value">
       				 		<option value="/events/">All teams</option>
       				 		@foreach($teams as $item)
       				    		<option value="/events/team/{{$item->id}}" <?php echo ($selected === $item->id)?"selected":"" ?>>{{$item->name}}</option>
        					@endforeach
      					</select>
    				</div>
				</div>
							<div class="eventsContainer">
				@foreach($events as $event)
				<a href="">
					<div class="event">
						<div class="eventTitle">
							<h1 class="leftTeam">{{$event->teama->name}}</h1>
							<h1 class="rightTeam">{{$event->teamb->name}}</h1>
							<h2>{{$event->subject}}</h2>
							<h2>{{$event->location->name}}</h2>
						</div>
						<div class="eventContent">
							<img src="{{$event->teama->url_flag}}" alt="">
							<h2 class="leftScore"></h2>
							<h1>VS</h1>
							<h3 class="time">{{$event->date_start}}</h3>
							<h3 class="place">{{$event->date_start}}</h3>
							<h2 class="rightScore"></h2>
							<img src="{{$event->teamb->url_flag}}" alt="">
						</div>
					</div>
				</a>
				@endforeach
			</div>
			</div>

		</div>
		@stop