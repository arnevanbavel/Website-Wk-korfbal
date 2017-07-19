
<div class="team-formulier">
	<h3>Update Team</h3>
	{!!Form::model($team,array('files' => true))!!}

		{!!Form::text('name',null,['placeholder'=>'Team name'])!!}


		{!!Form::textarea('about',null,['placeholder'=>'About the new team'])!!}


		{!!Form::text('url_website',null,['placeholder'=>'Team website link'])!!}


		{!!Form::text('url_facebook',null,['placeholder'=>'Team facebook link'])!!}


		{!!Form::text('url_twitter',null,['placeholder'=>'Team twitter link'])!!}


		{!!Form::text('hashtag',null,['placeholder'=>'#Hashtag'])!!}

		@if($team->url_cover)
			<img src="{{$team->url_cover}}" style="height:50px;width:50px;">
			{!!Form::label('url_cover_delete','delete:')!!}
			{!!Form::hidden('url_cover_delete', false) !!}
    		{!!Form::checkbox('url_cover_delete', true) !!}
    	@endif

		{!!Form::label('url_cover','Cover photo:')!!}
    	{!!Form::file('url_cover', null) !!}

		@if($team->url_flag)
			<img src="{{$team->url_flag}}" style="height:50px;width:50px;">
    	@endif

		{!!Form::label('url_flag','Flag photo:')!!}
    	{!! Form::file('url_flag', null) !!}

		{!!Form::submit('Update Team',['class'=>'button'])!!}
		<Form>
			<input type="button" onClick="history.go(0)" value="cancel" class="button">
		</form>
	{!!Form::close()!!}
</div>
