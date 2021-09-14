<table 
    id="{{ $id ?? "example" }}" 
    class="{{ $class ?? "table table-bordered table-sm table-responsive-sm table-responsive-md table-responsive-lg"}}" 
    style="{{ $style ?? "width:100%" }}">
    <thead>
        <tr>
            <th class="text-center">{{ __("product.table.header.show") }}</th>
            <th class="text-center">{{ __("product.table.header.id") }}</th>
            <th class="text-center">{{ __("product.table.header.name") }}</th>
            <th class="text-center">{{ __("product.table.header.length") }}</th>
            <th class="text-center">{{ __("product.table.header.width") }}</th>
            <th class="text-center">{{ __("product.table.header.height") }}</th>
            <th class="text-center">{{ __("product.table.header.weight") }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="text-center">
                @include("partials.anchor.redirect",
                    [
                        "href" => route("products.show", ["product" => $product->id]),
                        "text" => '<i class="nav-icon fas fa-search"></i>',
                        "class" => "btn btn-sm btn-outline-info",
                        "style" => "min-width:80px;",
                    ])
            </td>
            <td class="text-center">{{ $product->id }}</td>
            <td class="text-left">{{ $product->name }} </td>
            <td class="text-left">{{ $product->length }}</td>
            <td class="text-left">{{ $product->width }}</td>
            <td class="text-center">{{ $product->height }}</td>
            <td class="text-center">{{ $product->weight }}</td>
        </tr>
        @endforeach
    </tbody>
</table>