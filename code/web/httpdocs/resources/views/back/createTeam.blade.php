
<div class="team-formulier">
	<h3>Create new Team</h3>
	{!!Form::open(array('files' => true,'id'=>'form'))!!}

		{!!Form::text('name',"",['placeholder'=>'Team name'])!!}


		{!!Form::textarea('about',"",['placeholder'=>'About the new team'])!!}


		{!!Form::text('url_website',"",['placeholder'=>'Team website link'])!!}


		{!!Form::text('url_facebook',"",['placeholder'=>'Team facebook link'])!!}


		{!!Form::text('url_twitter',"",['placeholder'=>'Team twitter link'])!!}


		{!!Form::text('hashtag',"",['placeholder'=>'#Hashtag'])!!}


		{!!Form::label('url_cover','Cover photo:')!!}
    	{!!Form::file('url_cover', null) !!}


		{!!Form::label('url_flag','Flag photo:')!!}
    	{!! Form::file('url_flag', null) !!}


		{!!Form::text('email',"",['placeholder'=>'Guide e-mail'])!!}


		{!!Form::text('password_guide',"",['placeholder'=>'Guide password'])!!}


		{!!Form::text('password_player',"",['placeholder'=>'Player password'])!!}

			<input type="button" onClick="history.go(0)" value="cancel" class="button">
		{!!Form::submit('Create Team',['class'=>'button'])!!}
	{!!Form::close()!!}
</div>
