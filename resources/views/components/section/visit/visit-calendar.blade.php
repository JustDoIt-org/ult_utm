@props([
    'information_kouta' => '',
])

<div>
  {{-- @dd($informasi_kuota) --}}
  <!-- Full Calendar -->

  <script>
    document.addEventListener('calendarRefresh', function() {
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
      });

        calendar.batchRendering(() => {
            @js($information_kouta).forEach(value => {
                calendar.addEvent({
                    title: `Kunjungan: ${value.faculty.name} | Kouta: ${ value.sisa_kouta }`,
                    start: value.tanggal_kunjungan,
                    textColor: value.warna_tulisan,
                    backgroundColor: value.warna_latar_belakang,
                    className: 'text-wrap border-0 text-sm flex p-2 overflow-auto',
                })
            });
        })

      calendar.render();
    });
  </script>

  <div class="sm:px-6 lg:pl-8 lg:pr-0 xl:pr-8">
    <div id="calendar" class="bg-white px-5 py-10 rounded-lg shadow-lg"></div>
  </div>
</div>
