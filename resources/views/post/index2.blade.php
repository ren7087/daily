<x-app>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <div style="text-align:center">
        <h2>担当者名 : 田中太郎</h2><br><br>

        <form action="{{ route('post.page2') }}" method="POST">
            @csrf
            <div class="mt-4">
                <div id="datepicker" style="margin-left:570px"></div><br>
                <input type="text" id="output" name="target" value=<?php echo $today; ?>>
                <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('表示') }}</button>
            </div>
        </form>
    </div>

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
</x-app>
