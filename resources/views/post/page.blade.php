@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>日報システム</title>

    <script src="https://bossanova.uk/jexcel/v4/jexcel.js"></script>
    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>

    <link rel="stylesheet" href="https://bossanova.uk/jexcel/v4/jexcel.css" />
    <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" />
</head>
<body>
    <div>
        <select id='columnNumber'>
            <option value='4'>開始時間</option>
            <option value='5'>終了時間</option>
            <option value='8'>交通費</option>
        </select>
        <input type='button' value='ソートする' onclick="sheet.orderBy(document.getElementById('columnNumber').value)">
    </div>
    <div id="mytable" style="margin-left:20px"></div>
    <div class="container">
        <div class="page-header">
          <button id="btn">save</button>
        </div>
    </div>
    <textarea id='saveData' style='width:800px;height:300px;'></textarea>
</body>
</html>
@stop

@section('js')
    <script>
        const day = @json($day);
        const date = @json($date);

        var spreadsheetdata = [
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
        ];

        const table = document.getElementById('mytable');

        var sheet = jexcel(table, {
            data: spreadsheetdata,
            search: true,
            pagination: 10,
            tableOverflow: true,
            tableWidth: "auto",
            columns: [
                { type: 'text',      title:'id',       width:120},
                { type: 'text',      title:'お客様',       width:120},
                { type: 'text',      title:'場所',         width:200},
                { type: 'text',      title:'商品',         width:200},
                { type: 'text',      title:'開始時間',      width:200},
                { type: 'text',      title:'終了時間',      width:200},
                { type: 'text',      title:'行為',         width:250},
                { type: 'text',      title:'移動手段',      width:250},
                { type: 'text',      title:'交通費',       width:130},
                { type: 'text',      title:'内容',         width:400 },
                { type: 'text',      title:'感想',         width:400 },
            ]
        });

        function savedata(){
        document.getElementById('saveData').value =
            JSON.stringify(document.getElementById('mytable').jexcel.getJson());
        }
    </script>
    <script>
        $(function() {
            $('#btn').click(function() {
            document.getElementById('saveData').value =
                JSON.stringify(document.getElementById('mytable').jexcel.getJson());
            var textData = JSON.stringify(document.getElementById('mytable').jexcel.getJson());
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/post/edit',
                data: textData,
                dataType: "json",
                type: 'POST'
            }).done(function(data){
                console.log(data);
            }).fail(function(){
                console.log("fail");
            });
            })
        });
    </script>
@stop
