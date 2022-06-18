<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="Form">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>商品区分</p>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action1" value="打ち合わせ">
                            <label for="action1" class="form-check-label">投資</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action2" value="商談">
                            <label for="action2" class="form-check-label">保険</label>
                        </div>
                    </div>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action3" value="見積もり">
                            <label for="action3" class="form-check-label">PC</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action4" value="セミナー">
                            <label for="action4" class="form-check-label">スマホ</label>
                        </div>
                    </div>
                    </label>
                </div><br>

                <div id="input_pluralBox"  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>商品</p>
                    <div  id="input_plural">
                        <input name="product[]" id="product" required class="Form-Item-Input">
                        <input type="button" value="＋" class="add pluralBtn">
                        <input type="button" value="－" class="del pluralBtn">

                        @error('product')
                        <div class="text-red-500 text-sm mt-2">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div><br>

                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>お客様</p>
                    <input type="text" name="customer" id="customer" autofocus required class="Form-Item-Input">
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>初期費用</p>
                    <input name="fee" id="fee" placeholder="1000円" required class="Form-Item-Input">
                    <input name="fee" id="fee" placeholder="$100" required class="Form-Item-Input">
                    <input type="button" name="fee" id="fee" value="計算する" class="Form-Item-Input" style="background-color: #66CCFF; color: white">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>月額費用</p>
                    <input name="fee" id="fee" placeholder="1000円" required class="Form-Item-Input">
                    <input name="fee" id="fee" placeholder="$100" required class="Form-Item-Input">
                    <input type="button" name="fee" id="fee" value="計算する" class="Form-Item-Input" style="background-color: #66CCFF; color: white">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>売り込み状況</p>
                    <textarea name="comment" id="comment" cols="30" rows="4" required value="{{ old('comment') }}" class="Form-Item-Textarea"></textarea>

                    @error('comment')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="mt-4" style="display: flex">
                    <button type="submit" id="btn" class="Form-Btn">{{ __('戻る') }}</button>
                    <button type="submit" id="btn" class="Form-Btn">{{ __('登録') }}</button>
                </div>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("click", ".add", function() {
        $("#input_plural").clone(true).val('').insertAfter($(this).parent());
        $('#product').val('');
    });
    $(document).on("click", ".del", function() {
        var target = $(this).parent();
        if (target.parent().children().length > 1) {
            target.remove();
        }
    });
</script>

<script>
    $(function(){
    $("#btn").prop("disabled", true);
        $("input[type='checkbox']").on('change', function () {
            if ($(".check:checked").length > 0) {
            $("#btn").prop("disabled", false);
            } else {
            $("#btn").prop("disabled", true);
            }
        });
    });
</script>
