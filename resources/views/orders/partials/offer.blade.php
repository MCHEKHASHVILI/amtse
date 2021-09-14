@if ($offer)
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">ავტორი:
            <span>{{ $offer->author }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">ფასი: <span>{{ $offer->price }}
                {{ $offer->currency->code ?? null }}</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center">ინკოტერმი:
            <span>{{ $offer->incoterm->code ?? null }} {{ $offer->city }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">@if($offer->type == "p_offer") წარმოების @else ტრანსპორტირების @endif პერიოდი (დღე):
            <span>{{ $offer->days }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">დამატებულია:
            <span>{{ $offer->created_at }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">ბოლო განახლება:
            <span>{{ $offer->updated_at }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">სტატუსი:
            <span>{{ ($offer->active) ? 'აქტიური' : 'გასააქტიურებელი' }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">აღწერა:
            <span>{{ $offer->description }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">აღწერა:
            <span>{{ $offer->description }}</span>
        </li>
    </ul>
@else
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">დასამუშავებელი</li>
    </ul>
@endif
