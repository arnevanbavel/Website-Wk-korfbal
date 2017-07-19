
<div class="team-formulier">
	<h3>Edit News</h3>
	{!!Form::model($news,array('files' => true))!!}

   		{!!Form::text('title',null,['placeholder'=>'Subject'])!!}

		@if($teams)
			{!!Form::textarea('body_nl',null,['placeholder'=>'Nederlands nieuws'])!!}
		@endif

		{!!Form::textarea('body_eng',null,['placeholder'=>'English news'])!!}

		{!!Form::text('url_youtube',$news->url_youtube_full,['placeholder'=>'youtube link'])!!}

		@if($news->url_image)
			<div class="checkbox">
				<img src="{{$news->url_image}}" style="height:50px;width:50px;">
				{!!Form::label('url_image_delete','delete:')!!}
				{!!Form::hidden('url_image_delete', false) !!}
    			{!!Form::checkbox('url_image_delete', true) !!}
    		</div>
    	@endif

		{!!Form::label('url_image','News picture:')!!}
    	{!! Form::file('url_image', null) !!}

		{!!Form::select('tags[]',$tags,$selectedtags,['id'=>'tags', 'multiple'])!!}

		@if($teams)
			{!!Form::select('tags[]',$teams,$selectedteams,['id'=>'teamtags', 'multiple'])!!}
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
  	placeholder: 'choose a tag',
  	tags: true});
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