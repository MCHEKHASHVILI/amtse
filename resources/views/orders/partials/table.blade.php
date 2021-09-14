<table 
    id="{{ $id ?? "example" }}" 
    class="{{ $class ?? "table table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg"}}" 
    style="{{ $style ?? "width:100%" }}">
    <thead>
        <tr>
            <th class="text-center">{{ __("order.table.header.show") }}</th>
            <th class="text-center">{{ __("order.table.header.id") }}</th>
            <th class="text-center">{{ __("order.table.header.author") }}</th>
            <th class="text-center">{{ __("order.table.header.customer") }}</th>
            <th class="text-center">{{ __("order.table.header.product") }}</th>
            <th class="text-center">{{ __("order.table.header.unit") }}</th>
            <th class="text-center">{{ __("order.table.header.quantity") }}</th>
            <th class="text-center">{{ __("order.table.header.added") }}</th>
            <th class="text-center">{{ __("order.table.header.status") }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr style="background:{{ $order->row_color }}">
            <td class="text-center">
                @include("partials.anchor.redirect",
                    [
                        "href" => route("orders.show", ["order" => $order->id]),
                        "text" => '<i class="nav-icon fas fa-search"></i>',
                        "class" => "btn btn-sm btn-outline-info",
                        "style" => "min-width:80px;",
                    ])
            </td>
            <td class="text-center">{{ $order->id }}</td>
            <td class="text-left">{{ $order->author }} </td>
            <td class="text-left">{{ $order->customer }}</td>
            <td class="text-left">{{ $order->product->name }}</td>
            <td class="text-center">{{ $order->unit->name }}</td>
            <td class="text-center">{{ $order->quantity }}</td>
            <td class="text-center">{{ $order->created_at }}</td>
            <td class="text-center">{{ $order->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>