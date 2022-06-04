@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>日報システム</h1>
@stop

@section('content')
<x-app>
    <div style="margin-top: 150px">
        <div class="button09">
            <a href="/post/add">日報登録</a>
        </div>
        <div class="button09">
            <a href="/post/page">日報表示エクセル形式</a>
        </div>
        <div class="button09">
            <a href="/post/index2">日報表示カレンダー形式</a>
        </div>
    </div>
</x-app>
@stop

@section('css')
    {{-- ページごとCSSの指定
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop

@section('js')
    <script> console.log('ページごとJSの記述'); </script>
@stop
