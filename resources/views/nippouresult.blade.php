<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">
</head>
<body>
    <div class="cp_ipselect" style="margin-top: 340px">
        <ul class="cp_sl08">
            <li>
            <input class="cp_sl08_close" type="radio" name="awesomeness" id="close" value=""/>
            <span class="cp_sl08_label cp_sl08_placeholder">選択してください</span>
            </li>
            <li class="cp_sl08_items">
            <input class="cp_sl08_expand" type="radio" name="option08" id="opener"/>
            <label class="cp_sl08_closeLabel" for="close"></label>
                <ul class="cp_sl08_options">
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="8"/>
                        <label class="cp_sl08_label" for="8">8:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="10"/>
                        <label class="cp_sl08_label" for="10">10:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="12"/>
                        <label class="cp_sl08_label" for="12">12:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="14"/>
                        <label class="cp_sl08_label" for="14">14:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="16"/>
                        <label class="cp_sl08_label" for="16">16:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="18"/>
                        <label class="cp_sl08_label" for="18">18:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="20"/>
                        <label class="cp_sl08_label" for="20">20:00</label>
                    </li>
                    <li>
                        <input class="cp_sl08_input" type="radio" name="option08" id="22"/>
                        <label class="cp_sl08_label" for="22">22:00</label>
                    </li>
                </ul>
            <label class="cp_sl08_expandLabel" for="opener"></label>
            </li>
        </ul>
    </div>
</body>
</html>

<script>
    windowOpen()
    // alert("このデータを登録しますか？ \n https://○○○○○○○.com");
    function windowOpen(){
        window.open('https://ja.wikipedia.org/wiki/%E3%83%A1%E3%82%A4%E3%83%B3%E3%83%9A%E3%83%BC%E3%82%B8', null ,'top=100,left=100,width=400,height=300');
    }
</script>
