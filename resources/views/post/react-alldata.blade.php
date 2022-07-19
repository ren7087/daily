@extends('adminlte::page')

@section('title', 'React-index')

@section('content')
<x-app>
    <div id="alldata"></div>
</x-app>
@stop

@section('css')
    {{-- ページごとCSSの指定
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop

@section('js')
    {{-- <script> console.log('ページごとJSの記述'); </script> --}}
@stop
