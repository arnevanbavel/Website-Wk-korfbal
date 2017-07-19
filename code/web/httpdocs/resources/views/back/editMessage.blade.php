<div class="formulier">
	<h3>Update Message</h3>
	{!!Form::model($message,array('files' => true,'id'=>'form'))!!}

		@if($userrole === "1")
			<div class="sentto">
				{!!Form::label('global','Sent to: All teams ')!!}
				{!!Form::hidden('global', false, null,['id'=>'all']) !!}
    			{!!Form::checkbox('global', true, null,['id'=>'all']) !!}
				{!!Form::label('to','or')!!}
				{!!Form::select('to[]', $teams, $selected,['id'=>'teams','multiple'=>'multiple'])!!}
			</div>
		@endif
		<div class="other">
		{!!Form::text('subject',null,['placeholder'=>'Subject'])!!}

		{!!Form::textarea('body',null,['placeholder'=>'Body'])!!}
    	<div class="checkbox">
    		{!!Form::label('important','Important:')!!}
			{!! Form::hidden('important', false) !!}
    		{!! Form::checkbox('important', true) !!}
    	</div>

    	<div class="checkbox">
   			{!!Form::label('visible','Hide:')!!}
			{!!Form::hidden('visible', false)!!}
    		{!!Form::checkbox('visible', true)!!} 		
    	</div>

    	@if($message->url_image)
    		<div class="imagepreview">
				<img src="{{$message->url_image}}" style="height:50px;width:50px;">
				{!!Form::label('url_image_delete','delete:')!!}
				{!!Form::hidden('url_image_delete', false) !!}
    			{!!Form::checkbox('url_image_delete', true) !!}
    		</div>
    	@endif

		{!!Form::label('url_image','Image:')!!}
    	{!! Form::file('url_image', null) !!}

		{!!Form::text('published_at', null, array('class' => 'datepicker','placeholder'=>'Publish Date'))!!}

		{!!Form::text('delete_at', null, array('class' => 'datepicker','placeholder'=>'Deletion Date'))!!}

			<input type="button" onClick="history.go(0)" value="Cancel" class="button">
        {!!Form::submit('Update Message',['class'=>'button'])!!}
		</div>
	{!!Form::close()!!}
</div>
<script type="text/javascript">
  $('#teams').select2({
  	placeholder: 'choose a team'
  });
  $('#all').on("click",function(){
  	if ($('#all').prop('checked')) {
  		  	$("#teams").attr("disabled", true);
  	};
  	if ($('#all').prop('checked') === false) {
  		  	$("#teams").attr("disabled", false);
  	};
  });

</script>
