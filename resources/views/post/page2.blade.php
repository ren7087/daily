<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daly Work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
        <link href='{{ asset('fullcalendar/lib/main.css') }}' rel='stylesheet' />
        <script src='{{ asset('fullcalendar/lib/main.js') }}'></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <style>
            #detail-area{
                display: none;
                width: auto;
                height: auto;
                background-color: #eee;
                position: absolute;
                top: 0px;
                right: 0px;
                bottom: 0px;
                left: 0px;
                margin: auto;
                z-index: 999;
                padding: 30px;
            }
        </style>
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
                    // headerToolbar: {
                    //     left: "timeGridDay",
                    //     center: "title",
                    // },
                    events: [
                        @foreach ($date as $daily)
                        {
                            id: '田中太郎<br><br><b>商品</b><br> {{ $daily['product'] }} <br><br><b>内容</b><br> {{ $daily['content'] }} <br><br><b>感想</b><br> {{ $daily['comment'] }}',
                            title: '{{ $daily['action'] }}',
                            description: '{{ $daily['content'] }}',
                            start: '{{ $daily['created_at'] }}',
                            end: '{{ $daily['updated_at'] }}',
                        },
                        @endforeach

                        {
                            title: 'トップページへ戻る',
                            url: '/',
                            start: day,
                        },
                    ],
                    eventClick: function(item, jsEvent, view) { //イベントをクリックすると発動
                        //event_dataという変数に表示させたいHTMLデータを入れ込んでいく
                        var event_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                        event_data += '<b>タイトル</b><br>\n';
                        event_data += item.event.title + '<br><br>\n';
                        event_data += '<b>担当者</b><br>\n';
                        event_data += item.event.id + '<br><br>\n';
                        //<div id="detail-area"></div>の中にevent_dataを入れて表示させる
                        $('#detail-area').html(event_data).show();
                    },
                    // eventClick: function(item, jsEvent, view) {
                    //     alert('Clicked on: ' + item.event.title);
                    // },
                });

                // function closeArea(){
                //     $('#detail-area').hide();
                // }

                calendar.render();
            });

            function closeArea(){
                $('#detail-area').hide();
            }
        </script>

    </body>
</html>
