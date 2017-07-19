<div class="team-formulier">
	<h3>Create new Album</h3>
	{!!Form::open(array('id'=>'form'))!!}

		{!!Form::label('name','Name:')!!}
		{!!Form::text('name')!!}
		<br>

		<div class="clearfix"></div>
		{!!Form::submit('Create Album')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>

