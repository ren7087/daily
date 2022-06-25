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


    <div id="mytable" style="margin-left:20px"><p style="color: red">田中太郎</p></div>
    <div id="mytable2" style="margin-left:20px"><p style="color: red">本田圭佑</p></div>
    <div id="mytable3" style="margin-left:20px"><p style="color: red">青木健太</p></div>
</body>
</html>
<script>
    var spreadsheetdata = [
        {
            "1月": `10000`,
            "２月": `10000`,
            "３月":`132000`,
            "４月":`16000`,
            "５月":`15000`,
            "６月":`19000`,
            "７月":`10000`,
            "８月":`14500`,
            "９月":`12000`,
            "10月":`10000`,
            "11月":`12200`,
            "12月":`43433`,
        },
];

    const table = document.getElementById('mytable');

    var sheet = jexcel(table, {
        data: spreadsheetdata,
        search: true,
        tableOverflow: true,
        tableWidth: "auto",
        columns: [
            { type: 'text',      title:'1月',       width:200},
            { type: 'text',      title:'2月',       width:200},
            { type: 'text',      title:'3月',         width:200},
            { type: 'text',      title:'4月',         width:200},
            { type: 'text',      title:'5月',      width:200},
            { type: 'text',      title:'6月',      width:200},
            { type: 'text',      title:'7月',         width:200},
            { type: 'text',      title:'8月',      width:200},
            { type: 'text',      title:'9月',       width:200},
            { type: 'text',      title:'10月',         width:200 },
            { type: 'text',      title:'11月',         width:200 },
            { type: 'text',      title:'12月',         width:200 },
        ]
    });
</script>

<script>
    var spreadsheetdata = [
        {
            "1月": `10000`,
            "２月": `10000`,
            "３月":`132000`,
            "４月":`16000`,
            "５月":`15000`,
            "６月":`19000`,
            "７月":`10000`,
            "８月":`14500`,
            "９月":`12000`,
            "10月":`10000`,
            "11月":`12200`,
            "12月":`43433`,
        },
];

    const table2 = document.getElementById('mytable2');

    var sheet = jexcel(table2, {
        data: spreadsheetdata,
        search: true,
        tableOverflow: true,
        tableWidth: "auto",
        columns: [
            { type: 'text',      title:'1月',       width:200},
            { type: 'text',      title:'2月',       width:200},
            { type: 'text',      title:'3月',         width:200},
            { type: 'text',      title:'4月',         width:200},
            { type: 'text',      title:'5月',      width:200},
            { type: 'text',      title:'6月',      width:200},
            { type: 'text',      title:'7月',         width:200},
            { type: 'text',      title:'8月',      width:200},
            { type: 'text',      title:'9月',       width:200},
            { type: 'text',      title:'10月',         width:200 },
            { type: 'text',      title:'11月',         width:200 },
            { type: 'text',      title:'12月',         width:200 },
        ]
    });
</script>

<script>
    var spreadsheetdata = [
        {
            "1月": `10000`,
            "２月": `10000`,
            "３月":`132000`,
            "４月":`16000`,
            "５月":`15000`,
            "６月":`19000`,
            "７月":`10000`,
            "８月":`14500`,
            "９月":`12000`,
            "10月":`10000`,
            "11月":`12200`,
            "12月":`43433`,
        },
];

    const table3 = document.getElementById('mytable3');

    var sheet = jexcel(table3, {
        data: spreadsheetdata,
        search: true,
        tableOverflow: true,
        tableWidth: "auto",
        columns: [
            { type: 'text',      title:'1月',       width:200},
            { type: 'text',      title:'2月',       width:200},
            { type: 'text',      title:'3月',         width:200},
            { type: 'text',      title:'4月',         width:200},
            { type: 'text',      title:'5月',      width:200},
            { type: 'text',      title:'6月',      width:200},
            { type: 'text',      title:'7月',         width:200},
            { type: 'text',      title:'8月',      width:200},
            { type: 'text',      title:'9月',       width:200},
            { type: 'text',      title:'10月',         width:200 },
            { type: 'text',      title:'11月',         width:200 },
            { type: 'text',      title:'12月',         width:200 },
        ]
    });
</script>
