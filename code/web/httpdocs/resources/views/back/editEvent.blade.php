
<div class="team-formulier">
	<h3>Edit Event</h3>
	{!!Form::model($events)!!}

		@if($userrole === "1")
			{!!Form::select('to[]',$teams,$selectedteams,['id'=>'teams', 'multiple'])!!}
		@endif
				<br>
		<div class="clearfix"></div>
		{!!Form::label('subject','Title:')!!}
		{!!Form::text('subject')!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('body','Body:')!!}
		{!!Form::textarea('body')!!}
		<br>
		@if($userrole === "1")
		<div class="checkbox">
			{!!Form::label('tournament','Tournament:')!!}
			{!! Form::hidden('tournament', false) !!}
    		{!! Form::checkbox('tournament', true) !!}
		</div>
		{!!Form::label('team_a','Team A:')!!}
		{!!Form::select('team_a',$teams,null,['id'=>'albums','class' => 'form-control'])!!}

		{!!Form::label('team_b','Team B:')!!}
		{!!Form::select('team_b',$teams,null,['id'=>'albums','class' => 'form-control'])!!}
		@endif
		<div class="clearfix"></div>
		{!!Form::label('date_start','Start:')!!}
		{!!Form::text('date_start', null, array('class' => 'datepicker'))!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('date_end','End:')!!}
		{!!Form::text('date_end', null, array('class' => 'datepicker'))!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::label('location_id','Location:')!!}
		{!!Form::select('location_id',$locations,null,['id'=>'albums','class' => 'form-control'])!!}
		<br>
		<div class="clearfix"></div>
		{!!Form::submit('Update Event')!!}
				<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="cancel">
</FORM>
	{!!Form::close()!!}
</div>

<script>
  	$(function() {
    	$( ".datepicker" ).datetimepicker({
    		dateFormat: "yy-mm-dd",
    		timeFormat: "hh:mm:ss"
    	});
  	});
  </script>

  	<script type="text/javascript">
  $('#teams').select2({
  	placeholder: 'choose a teams'});
</script>