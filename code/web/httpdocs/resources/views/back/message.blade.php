<div class="header">
<div class="leftside">
  <div class="avatar">
    @if($message->sender_role === "1")
      <img src="{{ asset('/img/admin.jpg') }}" class="sender-avatar">
    @else
      <img src="{{ asset($message->sender->url_flag)}}" class="sender-avatar">
    @endif
  </div>
  <h3>
    @if($message->sender_role === "1")
        Admin
    @else
      @foreach($teams as $team)
        @if("$team->id" === "$message->sender_team")
          {{$team->name}}
        @endif
      @endforeach
    @endif
  </h3>
  <small>Date: {{ date("l j F - H:i:s", strtotime($message->published_at)) }}</small>
</div>
<div class="rightside">
<h3>{{ $message->subject }}</h3>
 @if($userrole === $message->sender_role || $userrole === "1")
   <small class="edit">( <a href="#"  onclick="message_edit({{$message->id}});">edit</a> - <a href="{{ URL::action('DashboardController@getDeleteMessage', $message->id) }}">delete</a> )</small>
 @endif
</div>
</div>
<div class="text">
  <p>{{ $message->body }}</p>
  @if($message->url_image)
<img src="{{$message->url_image}}">
@endif
</div>

