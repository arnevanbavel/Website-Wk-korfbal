<div class="team-formulier">
	<h3>update new Media</h3>
	{!!Form::model( $media,array('files' => true))!!}

		{!!Form::label('description','Name:')!!}
		{!!Form::text('description')!!}
		<br>
		<!--EDIT IMAGES NEW IMAGE or URL ?
			- MediaController
			
		<div class="clearfix"></div>
			{!!Form::label('url_image','Image:')!!}
    		{!! Form::file('url_image', null) !!}
		<br>
		<div class="clearfix"></div>
			{!!Form::label('url_youtube','Youtube:')!!}
			{!!Form::text('url_youtube',$media->url_youtube_full)!!}
		<br>

		-->
		<div class="clearfix"></div>
		{!!Form::label('tags','Tags:')!!}
		{!!Form::select('tags[]',$tags,null,['id'=>'tags','class' => 'form-control', 'multiple'])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('album_id','album:')!!}
		{!!Form::select('album_id',$albums,null,['id'=>'albums','class' => 'form-control'])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::submit('update media')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>
<script type="text/javascript">
  $('#tags').select2({
  	placeholder: 'choose a tag'});
</script>