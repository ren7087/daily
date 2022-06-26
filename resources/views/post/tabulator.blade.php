@extends('adminlte::page')

@section('title', 'tabulator')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://unpkg.com/tabulator-tables@4.8.3/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.8.3/dist/js/tabulator.min.js"></script>
    <script>
        function init() {
            $.getJSON("https://gist.githubusercontent.com/yamori813/16065bbff4473e8ec3430570fcf7da7f/raw/radio.json", null, function(data,status){
            //取得成功したら実行する処理
                    var tableData = data.radio;
                    var table = new Tabulator("#example-table", {
                    data: tableData,
                    columns: [
                    {
                        title: "略称",
                        field: "name"
                    },
                    {
                        title: "会社",
                        field: "corporation"
                    },
                    {
                        title: "コールサイン",
                        field: "callsign"
                    },
                    {
                        title: "周波数",
                        field: "frequency"
                    },
                    {
                        title: "出力",
                        field: "power"
                    },
                ]
            });
            });
        };

    </script>
</head>
<body onload="init()">
    <div id="example-table"></div>
</body>
</html>
@stop
