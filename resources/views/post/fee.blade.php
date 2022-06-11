@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<x-app>
    {{ $fees->max_price }}
</x-app>
@stop
