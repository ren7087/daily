@extends('adminlte::page')

@section('title', 'React-Calendar')

@section('content')
<x-app>
    <div id="page"></div>
    <div id="createPost"></div>
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
