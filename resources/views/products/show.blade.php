@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">{{ __('product.page_header.product') }}</span>
            @can('manage product')
                @include("partials.anchor.redirect",
                [
                "class" => "btn btn-warning btn-dm",
                "text" => "შეცვლა",
                "href" => route("products.edit", ["product" => $product->id]),
                ])
            @endcan
        </div>
    </nav>
@stop

@section('content')
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">{{__("product.labels.name")}} <span>{{ $product->name }}</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">{{__("product.labels.length")}} <span>{{ $product->length }}</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">{{__("product.labels.width")}} <span>{{ $product->width }}</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">{{__("product.labels.height")}} <span>{{ $product->height }}</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">{{__("product.labels.weight")}} <span>{{ $product->weight }}</span></li>
    </ul>
@stop

@section('css')

@stop

@section('js')

@stop
