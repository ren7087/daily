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
    <script src="{{ asset('/js/jquery.handsontable.csv.js') }}"></script>

    <script>

        $(document).ready(function () {

          // 知らない人は「jquery.Deferred」で調べよう
          var d = new $.Deferred();

          var header;
          var jsondata;

          // (1) JSONファイルを読み込む
          $.getJSON("public/nippou.json", function(sample) {
            jsondata = sample.cars;

            // Handsontableで表示するヘッダーをjsonから取得して配列に格納
            // この辺ダサイんだけど、JSONデータ内の属性を一括で取得する方法とかないかな？
            header = new Array();
            var count = 0;
            for(key in jsondata[0]){
              header[count] = key;
              count++;
            }

            d.resolve();
          });

          d.promise().then(function() {
            // (2) JSONをHandsontableに渡して表示
            var data =
              jsondata,
              container = document.getElementById('example'),  //後ほど表を展開する要素を指定
              hot;

            // 表の定義
            hot = new Handsontable(container, {      //以下はデータ指定と表示オプション
              data: data,            //さっき作ったdataを指定
              minSpareRows: 1,       //表の一番下にいくつ空行を表示するか。今回は１行を空行にして表示する。
              colHeaders: header,    //カラムの名前を表示するかどうか colheader: true 表示/false 非表示
                                     //カラムの名前を任意の名前にする colheader: 配列（カラム名）
              rowHeaders: true,      //ロウの名前を表示するか
              contextMenu: true,     //セルを右クリックしたときのメニューをすべて表示
              columnSorting: true    //カラムのヘッダーをクリックした際に昇順、再クリックで降順にソート
            });

            // 表上で以下のキーが押されても編集モードにならない
            // 変換(28)、無変換(29)、カタカナ(241)、ひらがな(242)、漢字キー(243, 244)
            hot.updateSettings({
              beforeKeyDown: function(e){
                if([28, 29, 241, 242, 243, 244].indexOf(e.keyCode) >= 0) {
                  e.isImmediatePropagationEnabled = false;
                  e.isImmediatePropagationStopped = function(){
                    return true;
                  }
                }
              }
            });

            // (3) 表の内容をCSVにしてダウンロード
            $("input:button").click(function(){
              // 表の状態を文字列にする。
              var csv_string = handsontable2csv.string(hot);

              var bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
              var blob = new Blob([bom, csv_string], { type: 'text/csv'});

              // IE独自関数でダウンロード
              window.navigator.msSaveBlob(blob, "test.csv");
            });
          });

          // Handsontableのおまじない
          // 以下は基本的にいじらない
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
          bindDumpButton();    //関数実行
        });

    </script>
</head>
<body>
    <div id="example" class="handsontable"></div>
    <br>
    <input type="button" value="csv"/>
</body>
@stop
