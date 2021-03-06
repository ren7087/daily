@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daly Work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

        {{-- fullcalendar --}}
        <link href='{{ asset('fullcalendar/lib/main.css') }}' rel='stylesheet' />
        <script src='{{ asset('fullcalendar/lib/main.js') }}'></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        {{-- tippy --}}
        <script src="//unpkg.com/@popperjs/core@2" defer></script>
	    <script src="//unpkg.com/tippy.js@6" defer></script>

        {{-- modal --}}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="{{ asset('/js/modal.js') }}"></script>
    </head>
    <body>
        <div class="calendar">
            <div id='external-events'>
                <p>
                  <strong>行為リスト</strong><br />
                  ドラッグでカレンダーに追加できます
                </p>

                <div class='fc-event' style="background-color: #D0B0FF">
                  <div class='fc-event-main'>打ち合わせ</div>
                </div>
                <div class='fc-event' style="background-color: #46EEFF">
                  <div class='fc-event-main'>商談</div>
                </div>
                <div class='fc-event' style="background-color: #FF9966">
                  <div class='fc-event-main'>見積もり</div>
                </div>
                <div class='fc-event' style="background-color: pink">
                  <div class='fc-event-main'>セミナー</div>
                </div>
                <div class='fc-event' style="background-color: #3399FF">
                    <div class='fc-event-main'>それ以外</div>
                </div>
            </div>
            <div id='calendar-container'>
                <div id='calendar'></div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="calendarModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="calendarModalTitle">日報編集</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <p class="col-sm-4 col-form-label">内容<span class="badge badge-info ml-1">必須</span></p>
                            <div class="col-sm-8">
                                <p class="modal-contents"></p>
                                <textarea name="comment" id="comment" cols="30" rows="4">これはテストです</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <p class="col-sm-4 col-form-label">感想<span class="badge badge-info ml-1">必須</span></p>
                            <div class="col-sm-8">
                                <p class="modal-contents"></p>
                                <textarea name="comment" id="comment" cols="30" rows="4">これはテストです</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" style="background-color: rgb(53, 146, 223)" data-dismiss="modal">送信する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="dayModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dayModalTitle">日報登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <p class="col-sm-4 col-form-label">内容<span class="badge badge-info ml-1">必須</span></p>
                            <div class="col-sm-8">
                                <p class="modal-contents"></p>
                                <textarea name="comment" id="comment" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p class="col-sm-4 col-form-label">感想<span class="badge badge-info ml-1">必須</span></p>
                            <div class="col-sm-8">
                                <p class="modal-contents"></p>
                                <textarea name="comment" id="comment" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" style="background-color: rgb(53, 146, 223)" data-dismiss="modal">送信する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;
                var containerEl = document.getElementById('external-events');
                var checkbox = document.getElementById('drop-remove');
                const date = @json($date);
                const day = @json($day);
                new Draggable(containerEl, {
                    itemSelector: '.fc-event',
                    eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText
                    };
                    }
                });
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
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
                    headerToolbar: {
                        left: "prev,today,next",
                        center: 'title',
                        right: 'timeGridDay,timeGridWeek,dayGridMonth,listMonth',
                    },
                    navLinks: true,
                    dayMaxEvents:true,
                    height: 'auto',
                    slotEventOverlap: true,
                    selectable: true,
                    editable: true,
                    droppable: true,
                    dayCellContent: function(e) {
                        e.dayNumberText = e.dayNumberText.replace('日', '');
                    },
                    // customButtons:{
                    //     eventListButton:{
                    //         text: 'トップページに戻る',
                    //         click:function(){
                    //             document.location.href = "/";
                    //         }
                    //     }
                    // },
                    events: [
                        @foreach ($date as $daily)
                        {
                            id: `お客様: {!! nl2br(e($daily['customer'])) !!} <br />  <br />商品: {!! nl2br(e($daily['product'])) !!}  <br />  <br />内容: <br />{!! nl2br(e($daily['content'])) !!} <br />  <br />感想: <br />{!! nl2br(e($daily['comment'])) !!}`,
                            title: `{!! nl2br(e($daily['action'])) !!}`,
                            start: `{!! nl2br(e($daily['start'])) !!}`,
                            end: `{!! nl2br(e($daily['end'])) !!}`,
                        },
                        @endforeach
                    ],
                    eventDidMount: function (info) {
                    if (info.event._def.title=='打ち合わせ') {
                        info.el.style.background = '#D0B0FF' ;
                        info.el.style.color = 'white' ;
                    }
                    if (info.event._def.title=='商談') {
                        info.el.style.background = '#46EEFF' ;
                        info.el.style.color = 'white' ;
                    }
                    if (info.event._def.title=='見積もり') {
                        info.el.style.background = '#FF9966' ;
                        info.el.style.color = 'white' ;
                    }
                    if (info.event._def.title=='セミナー') {
                        info.el.style.background = 'pink' ;
                        info.el.style.color = 'white' ;
                    }
                    if(info.event.id){ //現状DBから取ってきたものだけにTippyを適用したい
                        tippy(info.el, {// TippyでTooltipを設定する
                            content: info.event.id,
                            allowHTML: true,
                        });
                    }
                    },
                    eventClick: function(item, jsEvent, view) {
                        $('#calendarModal').modal(); // モーダル着火
                    },
                    select: function(info) {
                        $('#dayModal').modal(); // モーダル着火
                        // const eventName = prompt("行為を入力してください");
                        const eventName = "新規に追加した予定";
                        if (eventName) {
                            // イベントの追加
                            calendar.addEvent({
                                title: eventName,
                                start: info.start,
                                end: info.end,
                                allDay: false,
                                color: "#3399FF",
                            });
                        }
                    },
                });
                calendar.render();
            });
        </script>

    </body>
</html>
@stop
