@extends('adminlte::page')

@section('title', 'React-hundsontable')

@section('content')
<x-app>
    <div id="hundsontable"></div>
</x-app>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" rel="stylesheet">
@stop

@section('js')
    {{-- <script> console.log('ページごとJSの記述'); </script> --}}
@stop
