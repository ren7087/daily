@extends('adminlte::page')

@section('title', 'hundsontable')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hundsontable</title>

    <link rel="stylesheet" href="{{ asset('css/handsontable.full.css') }}">
    <script src="{{ asset('/js/handsontable.full.js') }}"></script>
    <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
</head>
<body>
    <div id="example" class="handsontable"></div>


    <script>
        $(document).ready(function () {

          var data = [
            @foreach ($date as $daily)
                {
                "id": `{!! nl2br(e($daily['id'])) !!}`,
                "customer": `{!! nl2br(e($daily['customer'])) !!}`,
                "location":`{!! nl2br(e($daily['location'])) !!}`,
                "product":`{!! nl2br(e($daily['product'])) !!}`,
                "start":`{!! nl2br(e($daily['start'])) !!}`,
                "end":`{!! nl2br(e($daily['end'])) !!}`,
                "action":`{!! nl2br(e($daily['action'])) !!}`,
                "transportation":`{!! nl2br(e($daily['transportation'])) !!}`,
                "fee":`{!! nl2br(e($daily['fee'])) !!}`,
                "content":`{!! nl2br(e($daily['content'])) !!}`,
                "comment":`{!! nl2br(e($daily['comment'])) !!}`,
                },
            @endforeach
            ],
            container = document.getElementById('example'),
            hot;

          hot = new Handsontable(container, {
            data: data,
            colHeaders: ["id", 'お客様', '場所', '商品', '開始時間', '終了時間', '行為', '移動手段', '交通費', '内容', '感想'],
            minSpareRows: 1,
            colHeaders: true,
            contextMenu: true,
            manualColumnResize: true,
          });


          function bindDumpButton() {

              Handsontable.Dom.addEvent(document.body, 'click', function (e) {

                var element = e.target || e.srcElement;

                if (element.nodeName == "BUTTON" && element.name == 'dump') {
                  var name = element.getAttribute('data-dump');
                  var instance = element.getAttribute('data-instance');
                  var hot = window[instance];
                  console.log('data of ' + name, hot.getData());
                }
              });
            }
          bindDumpButton();

        });
    </script>

</body>
@stop
