@extends("adminlte::page")

@section('title', 'Order')

@section('content_header')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">{{ __('order.page_header.order') }} - ID: {{ $order->id }} -
                {{ __('order.trigger.edit') }}</span>
        </div>
    </nav>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <h4>ძირითადი დეტალები</h4>
            </div>
            <hr>
            @can('edit order')
                @include("orders.forms.order",[ "order" => $order ])
            @else
                @include("orders.partials.sales", [ "order" => $order])
            @endcan
        </div>
        <div class="col-md">
            <div class="page-header">
                <h4>შესყიდვები</h4>
            </div>
            <hr>
            @can('edit p_offer')
                @include("orders.forms.offer", [ "offer" => $order->p_offer ])
            @else
                @include("orders.partials.offer", ["offer"=>$order->fp_offer])
            @endcan
        </div>
        <div class="col-md">
            <div class="page-header">
                <h4>ლოგისტიკა</h4>
            </div>
            <hr>
            @can('edit l_offer')
                @include("orders.forms.offer", [ "offer" => $order->l_offer ])
            @else

                @include("orders.partials.offer", ["offer"=>$order->fl_offer])
            @endcan
        </div>
    </div>
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
