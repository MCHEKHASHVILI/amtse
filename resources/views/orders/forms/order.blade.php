<form method="post" action="{{route("orders.update",["order"=>$order->id])}}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="customer">დამკვეთი</label>
            <input type="text" name="customer" id="customer" class="form-control" value="{{$order->customer}}" />
        </div>

        <div class="form-group">
            <label for="product_id">პროდუქტი</label>
            @include("partials.products.select", ["value" => $order->product->id])
        </div>

        <div class="form-group">
            <label for="product_id">განზომილება</label>
            @include("partials.units.select", ["value" => $order->unit->id])
        </div>

        <div class="form-group">
            <label for="quantity">რაოდენობა</label>
            <input type="number" name="quantity" id="quantity" min="1" step="any" class="form-control" value="{{ $order->quantity }}"/>
        </div>

        <div class="form-group">
            <label for="description">აღწერა</label>
            <textarea type="text" name="description" id="description" class="form-control" rowspan="3">{{ $order->description }}</textarea>
        </div>
 
        <div class="form-group">
            <label for="REQUEST_HANDLING">დამუშავების ვადა</label>
            <div class="input-group date">
                <input type="text" name="REQUEST_HANDLING" id="REQUEST_HANDLING" class="form-control" value="{{ $order->deadlines->REQUEST_HANDLING }}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">განახლება</button>
    </form>