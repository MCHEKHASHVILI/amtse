@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">{{ __("product.page_header.products") }}</span>
            @can('manage product')
                @include("partials.anchor.redirect",[
                "class" => "btn btn-success btn-dm",
                "text" => "პროდუქტის დამატება",
                "href" => route("products.create"),
                ])
            @endcan
        </div>
    </nav>
    @include("partials.alerts.alert")
@stop

@section('content')
    @include("partials.products.table",["id"=>"example"])
@stop

@section('css')

@stop

@section('js')

@stop
