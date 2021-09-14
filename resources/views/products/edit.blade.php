@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>{{ __("product.trigger.edit") }}</h1>
@stop

@section('content')
    <form method="post" action="{{ route('products.update', ["product" => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __("product.labels.name") }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required/>
        </div>
        <div class="form-group">
            <label for="length">{{ __("product.labels.length") }}</label>
            <input type="number" name="length" id="length" min="1" step="any" class="form-control" value="{{ $product->length }}" required/>
        </div>
        <div class="form-group">
            <label for="width">{{ __("product.labels.width") }}</label>
            <input type="number" name="width" id="width" min="1" step="any" class="form-control" value="{{ $product->width }}" required/>
        </div>
        <div class="form-group">
            <label for="height">{{ __("product.labels.height") }}</label>
            <input type="number" name="height" id="height" min="1" step="any" class="form-control" value="{{ $product->height }}" required/>
        </div>
        <div class="form-group">
            <label for="weight">{{ __("product.labels.weight") }}</label>
            <input type="number" name="weight" id="weight" min="1" step="any" class="form-control" value="{{ $product->weight }}" required/>
        </div>

        <button type="submit" class="btn btn-warning">განახლება</button>
    </form>
@stop

@section('css')

@stop

@section('js')

@stop
