@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>日報システム</title>

    <script src="https://bossanova.uk/jexcel/v4/jexcel.js"></script>
    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>

    <link rel="stylesheet" href="https://bossanova.uk/jexcel/v4/jexcel.css" />
    <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" />
</head>
<body>
    <div id="mytable" style="margin-left:100px"></div>
    <div style="text-align: center">
        <select id='columnNumber'>
            <option value='3'>開始時間</option>
            <option value='4'>終了時間</option>
            <option value='7'>交通費</option>
        </select>
        <input type='button' value='ソートする' onclick="sheet.orderBy(document.getElementById('columnNumber').value)">
    </div>
</body>
</html>
@stop

@section('js')
    <script>
        const day = @json($day);
        const date = @json($date);

        var spreadsheetdata = [
            @foreach ($date as $daily)
                {"customer": `{!! nl2br(e($daily['customer'])) !!}`,
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
            tableWidth: "1400px",
            columns: [
                { type: 'text',      title:'お客様',       width:120, readOnly:true },
                { type: 'text',      title:'場所',         width:200, readOnly:true },
                { type: 'text',      title:'商品',         width:200, readOnly:true  },
                { type: 'text',      title:'開始時間',      width:200, readOnly:true},
                { type: 'text',      title:'終了時間',      width:200, readOnly:true },
                { type: 'text',      title:'行為',         width:200, readOnly:true },
                { type: 'text',      title:'移動手段',      width:200, readOnly:true },
                { type: 'text',      title:'交通費',       width:120 , readOnly:true},
                { type: 'text',      title:'内容',         width:400 },
                { type: 'text',      title:'感想',         width:400 },
            ]
        });
    </script>
@stop
