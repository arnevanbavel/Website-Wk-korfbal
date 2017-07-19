<div class="team-formulier">

	<h3>Create News</h3>

	{!!Form::open( array('files' => true,'id'=>'form'))!!}

   		{!!Form::text('title',"",['placeholder'=>'Subject'])!!}

		@if($teams)
			{!!Form::textarea('body_nl',"",['placeholder'=>'Nederlands nieuws'])!!}
		@endif

		{!!Form::textarea('body_eng',"",['placeholder'=>'English news'])!!}

		{!!Form::text('url_youtube',"",['placeholder'=>'youtube link'])!!}

		{!!Form::label('url_image','News picture:')!!}
    	{!! Form::file('url_image', null) !!}

		{!!Form::select('tags[]',$tags,null,['id'=>'tags', 'multiple'])!!}

		@if($teams)
			{!!Form::select('tags[]',$teams,null,['id'=>'teamtags', 'multiple'])!!}
		@endif

		<div class="checkbox">
			{!!Form::label('visible','Hide news item:')!!}
			{!! Form::hidden('visible', true) !!}
    		{!! Form::checkbox('visible', false) !!}
		</div>

		{!!Form::text('publish_at', null, array('class' => 'datepicker','placeholder'=>'Publish date'))!!}
		
		<input type="button" onClick="history.go(0)" value="cancel" class="button">

		{!!Form::submit('Add News')!!}

	{!!Form::close()!!}
</div>

<script type="text/javascript">
  $('#tags').select2({
  	placeholder: 'choose a tag'});
  $('#teamtags').select2({
  	placeholder: 'choose a team tag'});
</script>

<script>
  	$(function() {
    	$( ".datepicker" ).datetimepicker({
    		dateFormat: "yy-mm-dd",
    		timeFormat: "hh:mm:ss"
    	});
  	});
  </script>
