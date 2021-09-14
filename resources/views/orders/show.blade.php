@extends('dashboard')

@section('title', 'Order')

@section('content_header')
    <nav class="navbar navbar-expand-sm bg-light">
        <span class="navbar-brand mb-0 h1">{{ __("order.page_header.order") }} - ID: {{ $order->id }}</span>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <!-- Redirect To Orders List -->
                @include("partials.anchor.redirect",
                [
                "href" => route("orders.index"),
                "text" => '<i class="fas fa-long-arrow-alt-left"></i> <span>დაბრუნება</span>',
                "class" => "ml-1 nav-link btn btn-md btn-outline-info",
                "style" => "min-width:140px;",
                ])
            </li>
            <li class="nav-item">
                <!-- Edit Order -->
                @if(auth()->user()->hasRole('sales'))
                    
                    {{-- Check Order is Ready (Signed By Both Departments) --}}
                    @if($order->status_id == 3)
                        {{-- Sell The Order If it is Signed --}}
                        @include("partials.anchor.redirect",
                        [
                        "href" => route("order.sell", ["order" => $order->id]),
                        "text" => '<span>გაყიდვა</span>',
                        "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                        "style" => "min-width:140px;",
                        ])
                    @elseif($order->status_id < 3)
                        @include("partials.anchor.redirect",
                        [
                        "href" => route("orders.edit", ["order" => $order->id]),
                        "text" => '<span>შეცვლა</span> <i class="fas fa-long-arrow-alt-right"></i>',
                        "class" => "ml-1 nav-link btn btn-md btn-outline-danger",
                        "style" => "min-width:140px;",
                        ])
                    @endif
                @elseif(auth()->user()->hasRole('procurment'))
                    @if ($order->p_offer)
                        @if($order->status_id < 4)
                            {{-- Edit The Offer --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("orders.edit", ["order" => $order->id]),
                            "text" => '<span>შეთავაზების შეცვლა</span> <i class="fas fa-long-arrow-alt-right"></i>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-danger",
                            "style" => "min-width:140px;",
                            ])
                        @elseif($order->status_id == 4)
                            {{-- Request The Manufacturing --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("order.manufacturing.start", ["order" => $order->id]),
                            "text" => '<span>წარმოების დაწყება</span>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                            "style" => "min-width:140px;",
                            ])
                        @elseif($order->status_id == 5)
                            {{-- Manufacturing Ended --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("order.manufacturing.end", ["order" => $order->id]),
                            "text" => '<span>წარმოების დასრულება</span>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                            "style" => "min-width:140px;",
                            ])
                        @elseif($order->status_id == 6)
                            {{-- Out of Factory --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("order.manufacturing.out", ["order" => $order->id]),
                            "text" => '<span>ქარხნიდან გამოტანა</span>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                            "style" => "min-width:140px;",
                            ])
                        @endif
                    @else
                        {{-- Create The  Offer --}}
                        @include("partials.button.redirect",
                        [
                        "action" => route("order.offer.create", ["order" => $order->id]),
                        "method" => "post",
                        "value" => '<span>დამუშავება</span></i>',
                        "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                        "style" => "min-width:140px;",
                        ])
                    @endif
                @elseif(auth()->user()->hasRole('logistic'))
                    @if ($order->l_offer)
                        @if($order->status_id < 4)
                            {{-- Edit The Offer --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("orders.edit", ["order" => $order->id]),
                            "text" => '<span>შეთავაზების შეცვლა</span> <i class="fas fa-long-arrow-alt-right"></i>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-danger",
                            "style" => "min-width:140px;",
                            ])
                        @elseif($order->status_id == 7)
                            {{-- Transportation Start --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("order.transportation.start", ["order" => $order->id]),
                            "text" => '<span>გადაბარება</span>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                            "style" => "min-width:140px;",
                            ])
                        @elseif($order->status_id == 8)
                            {{-- In Stock --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("order.transportation.end", ["order" => $order->id]),
                            "text" => '<span>დასაწყობება</span>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                            "style" => "min-width:140px;",
                            ])
                        @elseif($order->status_id == 9)
                            {{-- Production Out --}}
                            @include("partials.anchor.redirect",
                            [
                            "href" => route("order.transportation.out", ["order" => $order->id]),
                            "text" => '<span>საწყობიდან გაცემა</span>',
                            "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                            "style" => "min-width:140px;",
                            ])
                        @endif
                    @else
                        {{-- Create The  Offer --}}
                        @include("partials.button.redirect",
                        [
                        "action" => route("order.offer.create", ["order" => $order->id]),
                        "method" => "post",
                        "value" => '<span>დამუშავება</span></i>',
                        "class" => "ml-1 nav-link btn btn-md btn-outline-success",
                        "style" => "min-width:140px;",
                        ])
                    @endif
                @endif
            </li>
        </ul>
    </nav>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <h4>ძირითადი დეტალები</h4>
            </div>
            <hr>
            @include("orders.partials.sales", ["order" => $order])
        </div>
        <div class="col-md">
            <div class="page-header">
                <h4>შესყიდვები</h4>
            </div>
            <hr>
            @include("orders.partials.offer", ["offer" => $order->fp_offer])
        </div>
        <div class="col-md">
            <div class="page-header">
                <h4>ლოგისტიკა</h4>
            </div>
            <hr>
            @include("orders.partials.offer", ["offer" => $order->fl_offer])
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
    
@stop
