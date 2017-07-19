
<div class="team-formulier">
	<h3>Edit Player</h3>
	{!!Form::model($player, array('files' => true))!!}

		{!!Form::text('first_name',null,['placeholder'=>'First Name'])!!}
	
		{!!Form::text('last_name',null,['placeholder'=>'Last Name'])!!}
	
		{!!Form::textarea('number',null,['placeholder'=>'Back number'])!!}

		<div class="checkbox">
		{!!Form::label('gender','Male:')!!}
		{!!Form::radio('gender', 1)!!}

		{!!Form::label('gender','or female:')!!}
		{!!Form::radio('gender', 0)!!}
    	</div>

    	@if($userrole === "1")
    		{!!Form::label('team','Team:',['class'=>'select'])!!}
			{!!Form::select('team', $teams, '0')!!}<br>		<br>
		@endif
		@if($player->url_image)
			<div class="checkbox">
				<img src="{{$player->url_image}}" style="height:50px;width:50px;">
				{!!Form::label('url_image_delete','delete:')!!}
				{!!Form::hidden('url_image_delete', false) !!}
    			{!!Form::checkbox('url_image_delete', true) !!}
    		</div>
    	@endif
	
		{!!Form::label('url_image','Player Image:')!!}
    	{!! Form::file('url_image', null) !!}
		<br>
	

			<input type="button" onClick="history.go(0)" value="Cancel" class="button">

		{!!Form::submit('Update Player',['class'=>'button'])!!}
	{!!Form::close()!!}
</div>
