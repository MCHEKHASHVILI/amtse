<ul class="list-group list-group-flush">
    <li class="list-group-item d-flex justify-content-between align-items-center">ავტორი <span>{{ $order->author }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">პროდუქტი: <span>{{ $order->product->name }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">რაოდენობა: <span>{{ $order->quantity }} {{ $order->unit->name }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">დამუშავების ვადა: <span>{{ $order->deadlines->REQUEST_HANDLING }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">დამატებულია: <span>{{ $order->created_at }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">ბოლო განახლება: <span>{{ $order->updated_at }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">სტატუსი: <span>{{ $order->status }}</span></li>
    <li class="list-group-item d-flex justify-content-between align-items-center">აღწერა: <span>{{ $order->description }}</span></li>
</ul>
