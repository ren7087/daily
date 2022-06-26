@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <x-app>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="text-align:center" class="title">
                <h3>{{ $today }}　担当者 : 田中太郎</h3><br />
            </div>

            <div class="Form">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>お客様</p>
                    <input type="text" name="customer" id="customer" autofocus required class="Form-Item-Input">
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>場所</p>
                    <input name="location" id="location" placeholder="八王子駅" required class="Form-Item-Input">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
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

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>開始時刻</p>
                    <input type="hidden" name='date1' value=<?php echo $today; ?>>
                    <input type="time" name="start" required class="Form-Item-Input">
                    @error('start')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>終了時刻</p>
                    <input type="hidden" name='date2' value=<?php echo $today; ?>>
                    <input type="time" name="end" required class="Form-Item-Input">
                    @error('end')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>行為</p>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action1" value="打ち合わせ">
                            <label for="action1" class="form-check-label">打ち合わせ</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action2" value="商談">
                            <label for="action2" class="form-check-label">商談</label>
                        </div>
                    </div>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action3" value="見積もり">
                            <label for="action3" class="form-check-label">見積もり</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="action[]" class="check" id="action4" value="セミナー">
                            <label for="action4" class="form-check-label">セミナー</label>
                        </div>
                    </div>
                    </label>
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>移動手段</p>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="transportation[]" class="check" id="transportation1" value="徒歩">
                            <label for="transportation1" class="form-check-label">徒歩</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="transportation[]" class="check" id="transportation2" value="電車">
                            <label for="transportation2" class="form-check-label">電車</label>
                        </div>
                    </div>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="transportation[]" class="check" id="transportation3" value="車">
                            <label for="transportation3" class="form-check-label">車</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="transportation[]" class="check" id="transportation4" value="タクシー">
                            <label for="transportation4" class="form-check-label">タクシー</label>
                        </div>
                    </div>
                    <div style="display:inline-block" class="checkbox">
                        <div style="margin: 5px">
                            <input type="checkbox" name="transportation[]" class="check" id="transportation5" value="バス">
                            <label for="transportation5" class="form-check-label">バス</label>
                        </div>
                        <div style="margin: 5px">
                            <input type="checkbox" name="transportation[]" class="check" id="transportation6" value="新幹線">
                            <label for="transportation6" class="form-check-label">新幹線</label>
                        </div>
                    </div>
                </div><br>

                <div  class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>交通費</p>
                    <input name="fee" id="fee" placeholder="1000円" required class="Form-Item-Input">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>内容</p>
                    <textarea name="content" id="content" cols="30" rows="4" required value="{{ old('content') }}" class="Form-Item-Textarea"></textarea>

                    @error('content')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="Form-Item">
                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>感想</p>
                    <textarea name="comment" id="comment" cols="30" rows="4" required value="{{ old('comment') }}" class="Form-Item-Textarea"></textarea>

                    @error('comment')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="mt-4">
                    <button type="submit" id="btn" class="Form-Btn">{{ __('登録') }}</button>
                </div>
                </form>
            </div>
            </div>
            </div>
        </div>
        </div>
    </x-app>
@stop

@section('js')
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
@stop
