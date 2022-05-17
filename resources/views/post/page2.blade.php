<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daly Work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <div class="m-auto w-50 m-5 p-5">
                <div id='calendar'></div>
            </div>
        </div>

        <link href='{{ asset('fullcalendar/lib/main.css') }}' rel='stylesheet' />
        <script src='{{ asset('fullcalendar/lib/main.js') }}'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
                    locale: 'ja',
                    navLinks: true,
                    height: 'auto',
                    headerToolbar: {
                        left: "timeGridDay",
                        center: "title",
                    },
                    // events: [
                    //     {
                    //         title: '商談',
                    //         content: 'いい内容です',
                    //         start: '2022-05-17 10:00:00',
                    //         end: '2022-05-17 15:00:00',
                    //     }
                    // ],
                    events: "/post/page2",
                 });
                 calendar.render();
            });
        </script>
        {{-- @foreach ($date as $daily)
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                // const daily = @json($daily);
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
                    locale: 'ja',
                    navLinks: true,
                    height: 'auto',
                    headerToolbar: {
                        left: "timeGridDay",
                        center: "title",
                    },
                    events: [
                        {
                            title: '{{ $daily->action }}',
                            start: '{{ $daily->created_at }}',
                            end: '{{ $daily->updated_at }}',
                        },
                        {
                            title: '{{ $daily->content }}',
                            start: '{{ $daily->created_at }}',
                            end: '{{ $daily->updated_at }}',
                        },
                        {
                            title: '{{ $daily->comment }}',
                            start: '{{ $daily->created_at }}',
                            end: '{{ $daily->updated_at }}',
                        },
                    ],
                });
                calendar.render();
            });
        </script>
        @endforeach --}}
    </body>
</html>
