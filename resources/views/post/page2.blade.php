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
        if(window.matchMedia("(max-width: 768px)").matches){   //スマホ用
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                const date = @json($date);
                const day = @json($day);
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
                    initialDate: day,
                    locale: 'ja',
                    buttonText: {
                        prev:  '<',
                        next:  '>',
                        today: '今日',
                        month: '月',
                        week:  '週',
                        day:   '日',
                        list:  'リスト'
                    },
                    navLinks: true,
                    dayMaxEvents:true,
                    height: 'auto',
                    events: [
                        @foreach ($date as $daily)
                        {
                            id: `田中太郎　<br><br><b>お客様</b><br> {!! nl2br(e($daily['customer'])) !!}　<br><br><b>商品</b><br> {!! nl2br(e($daily['product'])) !!} <br><br><b>内容</b><br> {!! nl2br(e($daily['content'])) !!} <br><br><b>感想</b><br> {!! nl2br(e($daily['comment'])) !!}`,
                            title: `{!! nl2br(e($daily['action'])) !!}`,
                            start: `{!! nl2br(e($daily['start'])) !!}`,
                            end: `{!! nl2br(e($daily['end'])) !!}`,
                        },
                        @endforeach

                        {
                            title: 'トップページへ戻る',
                            url: '/',
                            start: day,
                        },
                    ],
                    eventClick: function(item, jsEvent, view) {
                        var event_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                        event_data += '<b>タイトル</b><br>\n';
                        event_data += item.event.title + '<br><br>\n';
                        event_data += '<b>担当者</b><br>\n';
                        event_data += item.event.id + '<br><br>\n';
                        $('#detail-area').html(event_data).show();
                    },
                });

                calendar.render();
            });

            function closeArea(){
                $('#detail-area').hide();
            }
        } else {   //PC用
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                const date = @json($date);
                const day = @json($day);
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
                    initialDate: day,
                    locale: 'ja',
                    buttonText: {
                        prev:  '<',
                        next:  '>',
                        today: '今日',
                        month: '月',
                        week:  '週',
                        day:   '日',
                        list:  'リスト'
                    },
                    customButtons:{
                        eventListButton:{
                            text: 'トップページに戻る',
                            click:function(){
                                document.location.href = "/";
                            }
                        }
                    },
                    navLinks: true,
                    dayMaxEvents:true,
                    headerToolbar: {
                        left: "prev,today,next eventListButton",
                        center: 'title',
                        right: 'timeGridDay,timeGridWeek,dayGridMonth,listMonth',
                    },
                    height: 'auto',
                    events: [
                        @foreach ($date as $daily)
                        {
                            id: `田中太郎　<br><br><b>お客様</b><br> {!! nl2br(e($daily['customer'])) !!}　<br><br><b>商品</b><br> {!! nl2br(e($daily['product'])) !!} <br><br><b>内容</b><br> {!! nl2br(e($daily['content'])) !!} <br><br><b>感想</b><br> {!! nl2br(e($daily['comment'])) !!}`,
                            title: `{!! nl2br(e($daily['action'])) !!}`,
                            start: `{!! nl2br(e($daily['start'])) !!}`,
                            end: `{!! nl2br(e($daily['end'])) !!}`,
                        },
                        @endforeach

                        {
                            title: 'トップページへ戻る',
                            url: '/',
                            start: day,
                        },
                    ],
                    eventClick: function(item, jsEvent, view) {
                        var event_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                        event_data += '<b>タイトル</b><br>\n';
                        event_data += item.event.title + '<br><br>\n';
                        event_data += '<b>担当者</b><br>\n';
                        event_data += item.event.id + '<br><br>\n';
                        $('#detail-area').html(event_data).show();
                    },
                });

                calendar.render();
            });

            function closeArea(){
                $('#detail-area').hide();
            }
        }
        </script>

    </body>
</html>
