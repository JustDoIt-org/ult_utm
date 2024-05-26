<!-- Full Calendar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
       var calendarEl = document.getElementById('calendar');
       var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
       });
       calendar.render();
     });
</script>

<div id="calendar" class="bg-white px-5 py-10 rounded-lg shadow-lg"></div>
