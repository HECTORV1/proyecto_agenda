@extends('layouts.master')

@section('content')
<br>
<br>
<br>
<br>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
 <link rel="stylesheet" type="text/css" href="fullcalendar/fullcalendar.css">
    <script type="text/javascript" src="lib/jquery.main.js"></script>
    <script type="text/javascript" src="lib/moment.main.js"></script>
    <script type="text/javascript" src="fullcalendar/fullcalendar.css"></script>-->

          


    <div class="container">
      <a class href="{{ route('tareas.index') }}">
      <meta charset='utf-8' />
      <link href='fullcalendar/main.css' rel='stylesheet' />
      <script src='fullcalendar/main.js'></script>
      <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

       var calendar = new Calendar(calendarEl, {
    events: [
      {
        title: 'Cumpleaños de:{{ $tarea->name }}',
        start: '{{ $tarea->due_date }}',
       
      }
      // other events here
    ],

    eventClick: function(info) {
      info.jsEvent.preventDefault(); // don't let the browser navigate

      if (info.event.url) {
        window.open(info.event.url);
      }
    }
  });

    var calendar = new Calendar(calendarEl, {
        initialDate: '2014-11-10',
        initialView: 'timeGridWeek',
        events: [
                  {
                    title: 'Cumpleaños de:{{ $tarea->name }}',
                    start: '{{ $tarea->due_date }}',
                    display: 'background'
                  }
                ]
});
      var calendar = new Calendar(calendarEl, {
        timeZone: 'UTC',
        events: [
          {
           
            title: 'my event',
            start: '2018-09-01'
          }
        ]
      })

      var event = calendar.getEventById('a') // an event object!
      var start = event.start // a property (a Date object)
      console.log(start.toISOString()) // "2018-09-01T00:00:00.000Z"

      </script>
    </div>





 
  <body>
    <div id='calendar'></div>
  </body>

<!--<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth', 
          events: [
    {
      start: '2021-14-05T10:00:00',
      end: '2021-15-05T16:00:00',
      display: 'background'
    }
  ]
        });
        calendar.render();
      });

    </script>-->



@endsection

   <!-- @section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

$('#calendar').fullCalendar({
   initialView: 'dayGridMonth', 
          events: [
    {
      start: '2021-14-05T10:00:00',
      end: '2021-15-05T16:00:00',
      display: 'background'
    }
  ]
        });
        });
    </script>
    @endsection-->
 
   
