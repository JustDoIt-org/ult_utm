<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });
  </script>
</head>

<body>
  <div class="w-[90%] justify-center m-auto bg-red-800">
    <div id='calendar'></div>
  </div>
</body>

</html>
