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
                position: auto;   /* もしくはabsolute */
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
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    initialDate: new Date(),
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
                    selectable: true,
                    select: function (info) {
                        // 入力ダイアログ
                        const eventProduct = prompt("商品を入力してください");
                        const eventCustomer = prompt("お客様を入力してください");
                        const eventAction = prompt("行為を入力してください");
                        const eventTransportation = prompt("移動手段を入力してください");
                        const eventFee = prompt("交通費を入力してください");

                        if (eventName) {
                            // イベントの追加
                            calendar.addEvent({
                                title: eventName,
                                start: info.start,
                                end: info.end,
                                allDay: true,
                            });
                        }
                    },
                    events: [
                        {
                            id: "a",
                            start: "2022-06-17",
                            end: "",
                            title: "節分",
                            description: "悪い鬼を追い払い福を招く",
                            backgroundColor: "red",
                            borderColor: "red",
                            editable: true
                        },
                        {
                            id: "b",
                            start: "2022-06-18",
                            end: "",
                            title: "立春",
                            description: "二十四節気の一つ",
                            backgroundColor: "green",
                            borderColor: "green",
                            editable: true
                        },
                        {
                            id: "c",
                            start: "2022-06-19",
                            end: "",
                            title: "針供養",
                            description: "古くなった針などを神社に納めて供養する",
                            backgroundColor: "blue",
                            borderColor: "blue",
                            editable: true
                        },
                    ],
                    eventClick: function(item, jsEvent, view) {
                        var event_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                        event_data += '<b>タイトル</b><br>\n';
                        event_data += item.event.title + '<br><br>\n';
                        event_data += '<b>担当者</b><br>\n';
                        event_data += item.event.id + '<br><br>\n';
                        $('#detail-area').html(event_data).show();
                        scrollTo(0, 0);
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
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    initialDate: new Date(),
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
                    selectable: true,
                    select: function (info) {
                        // 入力ダイアログ
                        const eventProduct = prompt("商品を入力してください");
                        const eventCustomer = prompt("お客様を入力してください");
                        const eventAction = prompt("行為を入力してください");
                        const eventTransportation = prompt("移動手段を入力してください");
                        const eventFee = prompt("交通費を入力してください");

                        if (eventName) {
                            // イベントの追加
                            calendar.addEvent({
                                id: eventCustomer,
                                title: eventAction,
                                start: info.start,
                                end: info.end,
                                allDay: true,
                            });
                        }
                    },
                    events: [
                        {
                            id: "a",
                            start: "2022-06-17",
                            end: "",
                            title: "節分",
                            description: "悪い鬼を追い払い福を招く",
                            backgroundColor: "red",
                            borderColor: "red",
                            editable: true
                        },
                        {
                            id: "b",
                            start: "2022-06-18",
                            end: "",
                            title: "立春",
                            description: "二十四節気の一つ",
                            backgroundColor: "green",
                            borderColor: "green",
                            editable: true
                        },
                        {
                            id: "c",
                            start: "2022-06-19",
                            end: "",
                            title: "針供養",
                            description: "古くなった針などを神社に納めて供養する",
                            backgroundColor: "blue",
                            borderColor: "blue",
                            editable: true
                        },
                    ],
                    eventClick: function(item, jsEvent, view) {
                        var event_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                        event_data += '<b>タイトル</b><br>\n';
                        event_data += item.event.title + '<br><br>\n';
                        event_data += '<b>担当者</b><br>\n';
                        event_data += item.event.id + '<br><br>\n';
                        $('#detail-area').html(event_data).show();
                        scrollTo(0, 0);
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
