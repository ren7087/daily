@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <x-app>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-left:25px">
            <h3>{{ $today }}</h3><h3>田中太郎さん</h3>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <div>
                    <label for="title">{{ ('お客様') }}</label>
                    <input name="customer" id="customer" autofocus required class="w-full rounded-lg border-2 bg-gray-100 @error('customer') border-red-500 @enderror">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div>
                    <label for="title">{{ ('場所') }}</label>
                    <input name="location" id="location" placeholder="八王子駅" required class="w-full rounded-lg border-2 bg-gray-100 @error('customer') border-red-500 @enderror">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div id="input_pluralBox">
                    <div  id="input_plural">
                        <label for="product">{{ ('商品') }}</label>
                        <input name="product[]" id="product" required class="w-full rounded-lg border-2 bg-gray-100 @error('product') border-red-500 @enderror">
                        <input type="button" value="＋" class="add pluralBtn">
                        <input type="button" value="－" class="del pluralBtn">

                        @error('product')
                        <div class="text-red-500 text-sm mt-2">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div><br>

                <div>
                    <label for="start">{{ ('開始時刻') }}</label>
                    <input type="hidden" name='date1' value=<?php echo $today; ?>>
                    <input type="time" name="start" required>
                    @error('start')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div>
                    <label for="end">{{ ('終了時刻') }}</label>
                    <input type="hidden" name='date2' value=<?php echo $today; ?>>
                    <input type="time" name="end" required>
                    @error('end')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                行為(1つ以上選択してください)
                <div>
                    <div style="display:inline-block" class="check">
                        <div>
                            <input type="checkbox" name="action[]" class="check" id="action1" value="打ち合わせ">
                            <label for="action1" class="form-check-label">打ち合わせ</label>
                        </div>
                        <div>
                            <input type="checkbox" name="action[]" class="check" id="action2" value="商談">
                            <label for="action2" class="form-check-label">商談</label>
                        </div>
                    </div>
                    <div style="display:inline-block">
                        <div>
                            <input type="checkbox" name="action[]" class="check" id="action3" value="見積もり">
                            <label for="action3" class="form-check-label">見積もり</label>
                        </div>
                        <div>
                            <input type="checkbox" name="action[]" class="check" id="action4" value="セミナー">
                            <label for="action4" class="form-check-label">セミナー</label>
                        </div>
                    </div>
                    </label>
                </div><br>

                移動手段(1つ以上選択してください)
                <div>
                    <div style="display:inline-block" class="check">
                        <div>
                            <input type="checkbox" name="transportation[]" class="check" id="transportation1" value="徒歩">
                            <label for="transportation1" class="form-check-label">徒歩</label>
                        </div>
                        <div>
                            <input type="checkbox" name="transportation[]" class="check" id="transportation2" value="電車">
                            <label for="transportation2" class="form-check-label">電車</label>
                        </div>
                    </div>
                    <div style="display:inline-block" class="check">
                        <div>
                            <input type="checkbox" name="transportation[]" class="check" id="transportation3" value="車">
                            <label for="transportation3" class="form-check-label">車</label>
                        </div>
                        <div>
                            <input type="checkbox" name="transportation[]" class="check" id="transportation4" value="タクシー">
                            <label for="transportation4" class="form-check-label">タクシー</label>
                        </div>
                    </div>
                    <div style="display:inline-block">
                        <div>
                            <input type="checkbox" name="transportation[]" class="check" id="transportation5" value="バス">
                            <label for="transportation5" class="form-check-label">バス</label>
                        </div>
                        <div>
                            <input type="checkbox" name="transportation[]" class="check" id="transportation6" value="新幹線">
                            <label for="transportation6" class="form-check-label">新幹線</label>
                        </div>
                    </div>
                </div><br>

                <div>
                    <label for="title">{{ ('交通費') }}</label>
                    <input name="fee" id="fee" placeholder="1000円" required class="w-full rounded-lg border-2 bg-gray-100 @error('customer') border-red-500 @enderror">

                    @error('customer')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="mt-4">
                    <label for="content">{{ ('内容') }}</label>
                    <textarea name="content" id="content" cols="30" rows="4" required value="{{ old('content') }}"class="w-full rounded-lg border-2 bg-gray-100 @error('content') border-red-500 @enderror"></textarea>

                    @error('content')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="comment">{{ ('感想') }}</label>
                    <textarea name="comment" id="comment" cols="30" rows="4" required value="{{ old('comment') }}"class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>

                    @error('comment')
                    <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>
                <div class="mt-4">
                    <button type="submit" id="btn" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('登録') }}</button>
                </div>
                </form>
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
