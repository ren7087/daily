<x-app>
    <div style="text-align:center; margin-top:100px">
        <h2>担当者名 : 田中太郎</h2><br>

        <h2>対象日</h2>
        <form action="{{ route('post.page') }}" method="POST">
            @csrf
            <input type="date" name="target">
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('表示') }}</button>
            </div>
        </form>
    </div>
</x-app>
