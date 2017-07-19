
<div class="formulier">
	{!!Form::open(array('id'=>'form'))!!}
		<div class="clearfix"></div>
			{!!Form::label('name','Tag:')!!}
			{!!Form::text('name')!!}

		{!!Form::submit('Add Tag')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>
