@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <style>
        .card {
            background-color: #fff;
            box-shadow: #ddd 0px 0px 4px 2px;
            border-radius: 8px;
            padding: 16px;
        }
    </style>
    <div>
        <div class="card">
            <h1 style="color: teal">React</h1><br />
            <h2>Excel形式</h2>
            <ul>
                <li>hundsontable</li>
            </ul>
            <h2>カレンダー形式</h2>
            <ul>
                <li>fullcalendar</li>
            </ul>
            <h2>UIコンポーネント</h2>
            <ul>
                <li>ChakuraUI</li>
            </ul>
        </div>
        <div class="card">
            <h1 style="color: teal">Laravel</h1><br />
            <h2>Excel形式</h2>
            <ul>
                <li>jexcel(jspreadsheet)</li>
                <li>hundsontable</li>
            </ul>
            <h2>カレンダー形式</h2>
            <ul>
                <li>fullcalendar</li>
            </ul>
        </div>
    </div>
@stop
