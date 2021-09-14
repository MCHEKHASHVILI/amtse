<select name="{{ $field ?? "product_id" }}" id="{{ $field ?? "product_id" }}" value="{{ $value ?? "" }}" class="{{ $class ?? "custom-select" }}" {{ $required ?? "" }}>
    <option value="">პროდუქტი</option>
    @foreach($products as $product)
        <option value="{{ $product->id }}" @if($product->id == $value) selected @endif>{{ $product->name }} (L*W*H(mm) - W(kg)) - {{ $product->length }}*{{ $product->width }}*{{ $product->height }} - {{ $product->weight }}</option>
    @endforeach
</select>