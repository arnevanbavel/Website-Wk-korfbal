
<div class="team-formulier">
	<h3>Edit User</h3><br>
	{!!Form::model($user)!!}

		<br>
		{!!Form::label('password','Password:')!!}
		{!!Form::text('password',"")!!}

		<div class="clearfix"></div>
		{!!Form::submit('Update User')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>
