<x-app>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('New Post') }}
        </h2>
      </div>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3>{{ $today }}</h3><h3>田中太郎さん</h3>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('post.store') }}" method="POST">
              @csrf

              <div>
                <label for="title">{{ ('お客様') }}</label>
                <textarea name="customer" id="customer" cols="30" rows="2" required class="w-full rounded-lg border-2 bg-gray-100 @error('customer') border-red-500 @enderror"></textarea>

                @error('customer')
                <div class="text-red-500 text-sm mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div><br>

              <div  id="input_plural">
                <label for="product">{{ ('商品') }}</label>
                <textarea name="product[]" id="product" cols="30" rows="2" required class="w-full rounded-lg border-2 bg-gray-100 @error('product') border-red-500 @enderror"></textarea>
                <input type="button" value="＋" class="add pluralBtn">
                <input type="button" value="－" class="del pluralBtn">

                @error('product')
                <div class="text-red-500 text-sm mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div><br>

              <div>
                <label for="start">{{ ('開始時刻') }}</label>
                <input type="time" name="start" required>
                @error('start')
                <div class="text-red-500 text-sm mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div><br>

              <div>
                <label for="end">{{ ('終了時刻') }}</label>
                <input type="time" name="end" required>
                @error('end')
                <div class="text-red-500 text-sm mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div><br>

              行為
              <div>
                <div style="display:inline-block">
                    <div>
                        <input type="checkbox" name="action[]" class="form-check-input" id="action1" value="打ち合わせ">
                        <label for="release1" class="form-check-label">打ち合わせ</label>
                    </div>
                    <div>
                        <input type="checkbox" name="action[]" class="form-check-input" id="action2" value="商談">
                        <label for="release2" class="form-check-label">商談</label>
                    </div>
                </div>
                <div style="display:inline-block">
                    <div>
                        <input type="checkbox" name="action[]" class="form-check-input" id="action3" value="見積もり">
                        <label for="release1" class="form-check-label">見積もり</label>
                    </div>
                    <div>
                        <input type="checkbox" name="action[]" class="form-check-input" id="action4" value="セミナー">
                        <label for="release2" class="form-check-label">セミナー</label>
                    </div>
                </div>
                </label>
              </div>

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
                <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('登録') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).on("click", ".add", function() {
        $(this).parent().clone(true).insertAfter($(this).parent());
    });
    $(document).on("click", ".del", function() {
        var target = $(this).parent();
        if (target.parent().children().length > 1) {
            target.remove();
        }
    });
    </script>

</x-app>
