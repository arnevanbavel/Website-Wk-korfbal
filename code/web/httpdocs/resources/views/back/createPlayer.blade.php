
<div class="team-formulier">
	<h3>Create Player</h3>
	{!!Form::model($team, array('files' => true,'id'=>'form'))!!}

		{!!Form::text('first_name',null,['placeholder'=>'First Name'])!!}
	
		{!!Form::text('last_name',null,['placeholder'=>'Last Name'])!!}
	
		{!!Form::textarea('number',null,['placeholder'=>'Back number'])!!}

		<div class="checkbox">
		{!!Form::label('gender','Male:')!!}
		{!! Form::checkbox('gender', true) !!}

		{!!Form::label('gender','or female:')!!}
    	{!! Form::checkbox('gender', false) !!}
    	</div>

		{!!Form::label('url_image','Player Image:')!!}
    	{!! Form::file('url_image', null) !!}

		{!!Form::hidden('team', $team->id)!!}


			<input type="button" onClick="history.go(0)" value="Cancel" class="button">

		{!!Form::submit('Create Player',['class'=>'button'])!!}
	{!!Form::close()!!}
</div>
