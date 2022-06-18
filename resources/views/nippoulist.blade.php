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

    <link rel="stylesheet" href="{{ asset('css/serch.css') }}">
</head>
<body>
    <div class="container">
        <div class="search royalblue">
          <input type="text">
          <button type="submit">送信</button>
        </div>
    </div>
    <div>
        <select id='columnNumber'>
            <option value='4'>開始時間</option>
            <option value='5'>終了時間</option>
            <option value='8'>交通費</option>
        </select>
        <input type='button' value='ソートする' onclick="sheet.orderBy(document.getElementById('columnNumber').value)">
    </div><br />


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
            "id": `3`,
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
            "id": `4`,
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
            "id": `5`,
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
    $( "#mytable2" ).jexcel( "setStyle", "F2", "background-color", "yellow" ) ;
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
    $( "#mytable3" ).jexcel( "setStyle", "F1", "background-color", "yellow" ) ;
</script>
