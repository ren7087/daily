<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daly Work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href='{{ asset('fullcalendar/lib/main.css') }}' rel='stylesheet' />
        <script src='{{ asset('fullcalendar/lib/main.js') }}'></script>
    </head>
    <body>
        <div id="app">
            <div class="m-auto w-50 m-5 p-5">
                <div id="detail-area"></div>
                <div id='calendar'></div>
            </div>
        </div>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                const date = @json($date);
                const day = @json($day);
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
                    initialDate: day,
                    locale: 'ja',
                    navLinks: true,
                    height: 'auto',
                    headerToolbar: {
                        left: "timeGridDay",
                        center: "title",
                    },
                    events: [
                        @foreach ($date as $daily)
                        {
                            title: '{{ $daily['action'] }}',
                            description: '{{ $daily['content'] }}',
                            start: '{{ $daily['created_at'] }}',
                            end: '{{ $daily['updated_at'] }}',
                        },
                        @endforeach
                    ],
                    eventClick: function(event) { //イベントをクリックすると発動
                        //event_dataという変数に表示させたいHTMLデータを入れ込んでいく
                        var event_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                        event_data += '<b>タイトル</b><br>\n';
                        event_data += 'you' + '<br><br>\n';
                        //<div id="detail-area"></div>の中にevent_dataを入れて表示させる
                        $('#detail-area').html(event_data).show();
                    },
                });

                function closeArea(){
                    $('#detail-area').hide();
                }

                calendar.render();
            });
        </script>
    </body>
</html>
