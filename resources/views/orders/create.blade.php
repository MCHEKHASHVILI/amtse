@extends('adminlte::page')

@section('title', 'Order')

@section('content_header')
    <h1>შეკვეთის დამატება</h1>
@stop

@section('content')
    <form method="post" action="{{ route('orders.store') }}">
        @csrf
        

        <div class="form-group">
            <label for="product_id">პროდუქტი</label>
            @include("partials.products.select", ["value" => "", "required" => "required"])
        </div>

        <div class="form-group">
            <label for="customer">დამკვეთი</label>
            <input type="text" name="customer" id="customer" class="form-control" />
        </div>
        <div class="form-group">
            <label for="unit_id">განზომილება</label>
            @include("partials.units.select", ["value" => "", "required" => "required"])
        </div>

        <div class="form-group">
            <label for="quantity">რაოდენობა</label>
            <input type="number" name="quantity" id="quantity" min="1" step="any" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="REQUEST_HANDLING">დამუშავების ვადა</label>
            <div class="input-group date">
                <input type="text" name="REQUEST_HANDLING" id="REQUEST_HANDLING" class="form-control">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">აღწერა</label>
            <textarea type="text" name="description" id="description" class="form-control" rowspan="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">დამატება</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.date').datepicker({
                startDate: new Date(),
                format: "yyyy-mm-dd",
            });
        });
    </script>
@stop
