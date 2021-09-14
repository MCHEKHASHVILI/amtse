@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>{{__("dashboard.header")}}</h1>
@stop

@section('content')
    <p></p>
@stop

@section('css')
    <link rel="stylesheet" href="{{-- asset('css/app.css') --}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop