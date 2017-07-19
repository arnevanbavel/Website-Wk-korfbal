<div class="formulier">
	<h2>Create new message</h2>
	{!!Form::open(array('files' => true,'id'=>'form'))!!}

		@if($userrole === "1")
			<div class="sentto">
				{!!Form::label('global','Sent to: All teams ')!!}
				{!!Form::hidden('global', false, "",['id'=>'all']) !!}
    			{!!Form::checkbox('global', true, "",['id'=>'all']) !!}
				{!!Form::label('to','or')!!}
				{!!Form::select('to[]', $teams, null,['id'=>'teams','multiple'=>'multiple'])!!}
			</div>
		@endif
		<div class="other">
		{!!Form::text('subject',"",['placeholder'=>'Subject'])!!}

		{!!Form::textarea('body',"",['placeholder'=>'Body'])!!}
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


		{!!Form::label('url_image','Image:')!!}
    	{!! Form::file('url_image', null) !!}

		{!!Form::text('published_at', null, array('class' => 'datepicker','placeholder'=>'Publish Date'))!!}

		{!!Form::text('delete_at', null, array('class' => 'datepicker','placeholder'=>'Deletion Date'))!!}
		<Form>
			<input type="button" onClick="history.go(0)" value="cancel" class="button">
		</form>
		
		{!!Form::submit('Add Message',['class'=>'button'])!!}

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
	<script>
  		$(function() {
    		$( ".datepicker" ).datetimepicker({
    			 dateFormat: "yy-mm-dd",
    			 timeFormat: "HH:mm:ss"
    		});
  		});
  	</script>

    <script type="text/javascript">
  $('#form').submit(function(e){
    e.preventDefault();

      $.ajax({
        url: 'http://localhost:8000/dashboard/create/message',
        method: 'post',
        dataType: 'json',
        data: $("#form").serialize(),
        success: function(data){
          $("#error").hide().empty();

          if(!data.succes){
            $.each(data.errors,function(index,error){
            $("#error").append('<li>'+error+'</li>');
            $("#error").slideDown();
          });
                    
        },
        error: function(xhr, status, error){
          location.reload();
        }
      });
  });
    </script>