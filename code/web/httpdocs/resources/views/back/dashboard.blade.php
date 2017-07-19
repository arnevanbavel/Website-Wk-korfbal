@extends("backmasterpage")

@section("content")

<div class="data-container">
  <div class="message-list">

    @if($userrole === "1")
    <div id="filter" class="filter">
      <select  onChange="window.location.href=this.value">
        <option value="/dashboard">All messages</option>
        @foreach($teams as $item)
            <option value="/dashboard/teammessages/{{$item->id}}" <?php echo ($teamid === $item->id)?"selected":"" ?>>{{$item->name}}</option>
        @endforeach
      </select>
    </div>
    @endif

    @foreach($messages as $item)
        <div class="item <?php if($item->important){echo 'important-message';} ?> <?php if($item->id === $firstmessage){echo 'selected-message';} ?>" id="{{$item->id}}"  >
          <div class="avatar">
            @if($item->sender_role === "1")
                <img src="/img/admin.jpg" class="sender-avatar">
            @else
              <img src="{{$item->sender->url_flag}}" class="sender-avatar">
            @endif
          </div>
          <div class="information">
            <h3>
              @if($item->sender_role === "1")
                  Admin
              @else
                @foreach($teams as $team)
                  @if("$team->id" === "$item->sender_team")
                    {{$team->name}}
                  @endif
                @endforeach
              @endif
            </h3> 
              <div class="date">
                <div class="date-month">{{date("j", strtotime($item->published_at))}}</div>
                <div class="date-day">{{date("F", strtotime($item->published_at))}}</div>
              </div>
            <p>{{ $item->subject }}</p>
          </div>
        </div>
    @endforeach
  </div>

  <div  class="message-box">
    @if($userrole <= 2)
      <div id="create-message" class="create-message">+ New Message</div>
    @endif 
  <div id="message-box"class="message-content">
    
  </div>
  </div>
</div>

<div class="sidebar">
  <div class="calendar">
<!--       @if($userrole <= 2)
        <div class="create-event-button" id="create-event">+ New Event</div>
      @endif  -->
    <div class="content">
      <div class="cal1">
      </div>
    </div>
    <div id="event-list" class="event-list">
      @foreach($events as $item)
          <div class="event-item <?php if($item->tournament){echo 'tournament';}?>">
            <div class="information">
              <h3>{{ $item->subject }}</h3>
                @if($item->tournament)
                  <img src="{{$item->teama->url_flag}}"> vs <img src="{{$item->teamb->url_flag}}">
                @endif
              </div>
              <div class="date">
                <div class="date-month">{{date("j", strtotime($item->date_start))}}</div>
                <div class="date-day">{{date("F", strtotime($item->date_start))}}</div>
              </div>
          </div>
      @endforeach
    </div>
  </div>
</div>

 <script type="text/javascript">
  $(document).ready( function() {
    firstMessage({{$firstmessage}});
  });
 </script>
<!--CALENDER SCRIPT : STAY OFF !!!! -->
 <script type="text/template" id="template-calendar">
        <div class="clndr-controls">
          <div class="clndr-previous-button">&lsaquo;</div>
          <div class="month"><%= month %></div>
          <div class="clndr-next-button">&rsaquo;</div>
        </div>
        <div class="clndr-grid">
          <div class="days-of-the-week">
            <% _.each(daysOfTheWeek, function(day) { %>
              <div class="header-day"><%= day %></div>
            <% }); %>
            <div class="days">
              <% _.each(days, function(day) { %>
                <div class="<%= day.classes %>"><%= day.day %></div>
              <% }); %>
            </div>
          </div>
        </div>
        <div class="clndr-today-button">Today</div>
</script>
<script type="text/javascript">
	var calendars = {};
	$(document).ready( function() {
  	var thisMonth = moment().format('YYYY-MM');
  	var eventArray = [
    /* BACKEND PART */
    @foreach($events as $item)
      { startDate: '{{ date("Y-m-d", strtotime($item->date_start)) }}', endDate: '{{ date("d-m-Y", strtotime($item->date_end)) }}', title: '{{ $item->title }}' },
    @endforeach  
  ];

  calendars.clndr1 = $('.cal1').clndr({
    events: eventArray,
    clickEvents: {
      click: function(target) {
        console.log(target);
      },
      nextMonth: function() {
        console.log('next month.');
      },
      previousMonth: function() {
        console.log('previous month.');
      },
      onMonthChange: function() {
        console.log('month changed.');
      },
      nextYear: function() {
        console.log('next year.');
      },
      previousYear: function() {
        console.log('previous year.');
      },
      onYearChange: function() {
        console.log('year changed.');
      }
    },
    multiDayEvents: {
      startDate: 'startDate',
      endDate: 'endDate',
      singleDay: 'date'
    },
    showAdjacentMonths: true,
    adjacentDaysChangeMonth: false
  });

});
</script> 

@stop 