@extends('layouts.app')
@section('title', 'Calendario académico')
@section('content')
    <div class="container">
        <h1>Calendario Académico</h1>
        <div id="calendar" class="scheduleCalendar"></div>
    </div>
@endsection
@php
$event = '';
for ($i = 0; $i < count($calendarSchedules); $i++) {
    $day = explode(' ', $calendarSchedules[$i]->time_start)[0];
    $time_start = $day . 'T' . explode(' ', $calendarSchedules[$i]->time_start)[1];
    $time_end = $day . 'T' . explode(' ', $calendarSchedules[$i]->time_end)[1];
    $event .=
        "{
            title: '" .
        $calendarSchedules[$i]->className .
        "',
            start: '" .
        $time_start .
        "',
            end: '" .
        $time_end .
        "',
            teacher: '" .
        $calendarSchedules[$i]->teacher .
        "',
            color: '" .
        $calendarSchedules[$i]->color .
        "',
            },";
}
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @php echo $event; @endphp
            ],
            eventMouseEnter: function(info) {
                const tooltip = document.createElement('div');
                tooltip.classList.add('tooltip');
                const tooltipContent = `
                    <dl>
                    <dt>Profesor:</dt><dd>${info.event.extendedProps.teacher}</dd>
                    <dt>Clase:</dt>
                    <dd>${info.event.title}</dd>
                    <dt>Horario:</dt>
                    <dd>${dayjs(info.event.start).format('HH:mm')} - ${dayjs(info.event.end).format('HH:mm')}</dd>
                    </dl>
          `;
                tooltip.innerHTML = tooltipContent;
                info.el.appendChild(tooltip);
            },
            eventMouseLeave: function(info) {
                const tooltip = info.el.querySelector('.tooltip');
                info.el.removeChild(tooltip);
            }
        });

        calendar.render();
    });

</script>
