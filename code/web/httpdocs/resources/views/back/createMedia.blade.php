<div class="team-formulier">
	<h3>Create new Media</h3>
	{!!Form::open( array('files' => true,'id'=>'form'))!!}

		{!!Form::label('description','Name:')!!}
		{!!Form::text('description')!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('url_image','Image:')!!}
    	{!! Form::file('url_image', null) !!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('url_youtube','Youtube:')!!}
		{!!Form::text('url_youtube')!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('tags','Tags:')!!}
		{!!Form::select('tags[]',$tags,null,['id'=>'tags','class' => 'form-control', 'multiple'])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('album_id','album:')!!}
		{!!Form::select('album_id',$albums,null,['id'=>'albums','class' => 'form-control'])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::submit('Create MEdia')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>
<script type="text/javascript">
  $('#tags').select2({
  	placeholder: 'choose a tag'});
</script>

