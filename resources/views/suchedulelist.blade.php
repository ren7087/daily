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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="{{ asset('/js/modal.js') }}"></script>
</head>
<body>
    <div style="text-align: center">
        <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter">
            日付検索
        </button>
        <select id='columnNumber'>
            <option value='4'>開始時間</option>
            <option value='5'>終了時間</option>
            <option value='8'>交通費</option>
        </select>
        <input type='button' value='ソートする' onclick="sheet.orderBy(document.getElementById('columnNumber').value)">
    </div><br />

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">日付検索</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="mt-4">
                        <div id="datepicker" class="date"></div><br>
                        <input type="text" id="output" name="target">
                        <button type="submit" style="background-color: blue"  class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('表示') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="mytable" style="margin-left:20px"><p style="color: red">6月18日（土）</p></div>
    <div id="mytable2" style="margin-left:20px"><p style="color: red">6月19日（日）</p></div>
    <div id="mytable3" style="margin-left:20px"><p style="color: red">6月20日（月）</p></div>
</body>
</html>
<script>
    var spreadsheetdata = [
        {
            "id": `1`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-18 17:00`,
            "end":`2022-06-18 18:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
        {
            "id": `2`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-18 18:00`,
            "end":`2022-06-18 19:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
        {
            "id": `3`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-18 19:00`,
            "end":`2022-06-18 20:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
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
</script>


<script>
    var spreadsheetdata = [
        {
            "id": `4`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-19 17:00`,
            "end":`2022-06-19 18:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
        {
            "id": `5`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-19 18:00`,
            "end":`2022-06-19 19:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
        {
            "id": `6`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-19 19:00`,
            "end":`2022-06-19 20:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
];

    const table2 = document.getElementById('mytable2');

    var sheet = jexcel(table2, {
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
</script>


<script>
    var spreadsheetdata = [
        {
            "id": `7`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-20 17:00`,
            "end":`2022-06-20 18:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
        {
            "id": `8`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-20 18:00`,
            "end":`2022-06-20 19:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
        {
            "id": `9`,
            "customer": `田中太郎`,
            "location":`八王子駅`,
            "product":`テレビ`,
            "start":`2022-06-20 19:00`,
            "end":`2022-06-20 20:00`,
            "action":`見積もり`,
            "transportation":`電車`,
            "fee":`1000円`,
            "content":`これはテストです`,
            "comment":`これはテストです`,
        },
];

    const table3 = document.getElementById('mytable3');

    var sheet = jexcel(table3, {
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
</script>
<script>
    $('#datepicker').datepicker({
        altField: "#output",
        closeText: '閉じる',
        prevText: '&#x3C;前',
        nextText: '次&#x3E;',
        currentText: '今日',
        monthNames: ['1月','2月','3月','4月','5月','6月',
        '7月','8月','9月','10月','11月','12月'],
        monthNamesShort: ['1月','2月','3月','4月','5月','6月',
        '7月','8月','9月','10月','11月','12月'],
        dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
        dayNamesShort: ['日','月','火','水','木','金','土'],
        dayNamesMin: ['日','月','火','水','木','金','土'],
        weekHeader: '週',
        //yy/mm/dd か　yyyy/mm/dd か
        dateFormat: 'yy-mm-dd',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: '年',
    });
</script>
