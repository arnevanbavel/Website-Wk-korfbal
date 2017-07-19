<div class="team-formulier">
	<h3>Edit Album</h3>
	{!!Form::model($album,array('id'=>'form'))!!}

		{!!Form::label('name','Name:')!!}
		{!!Form::text('name')!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('thumb','pick thumb:')!!}
		{!!Form::select('thumb',$albummedia,null,['class' => 'form-control'])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::submit('Update Album')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>
