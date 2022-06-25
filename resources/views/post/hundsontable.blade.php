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
    <h3>変更すると差分が`console`で表示されます</h3>
    <div id="example" class="handsontable"></div>
    <div class="controls">
        <button id="export-file">Download CSV</button>
    </div>

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
            colHeaders: ['id', 'お客様', '場所', '商品', '開始時間', '終了時間', '行為', '移動手段', '交通費', '内容', '感想'],
            minSpareRows: 1,
            contextMenu: true,
            manualColumnResize: true,
            manualRowResize: true,
            columnSorting: true,
            sortIndicator: true,
            comments: true,
            mergeCells: true,
            licenseKey: 'non-commercial-and-evaluation',
            afterChange : function(changes,source) {
                console.log("Changes:", changes, source);
                if (changes) {
                    changes.forEach(function(change) {
                        var test = hot.getCellMeta(change[0],change[1]);
                        console.log(test.id, test); // 'id' is the property you've added earlier with setMeta
                    });
                }
            }
          });

          const exportPlugin = hot.getPlugin('exportFile');
          const button = document.querySelector('#export-file');

            button.addEventListener('click', () => {
            exportPlugin.downloadFile('csv', {
                bom: false,
                columnDelimiter: ',',
                columnHeaders: false,
                exportHiddenColumns: true,
                exportHiddenRows: true,
                fileExtension: 'csv',
                filename: 'Handsontable-CSV-file_[YYYY]-[MM]-[DD]',
                mimeType: 'text/csv',
                rowDelimiter: '\r\n',
                rowHeaders: true
            });
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

<?php
/*
    $details = array();
    try {
        $pdo = new PDO ('mysql:host=localhost;dbname=work', 'waka1222', 'password123');
        $con = true;
    } catch (PDOException $e) {
        $con = false;
        echo "データベース接続失敗";
    }
    if ($con === true) {
        $sql = "UPDATE posts set カラム名 = 値 where 条件";
        $results = $pdo->query($sql);
    }
*/
?>


</body>
@stop
