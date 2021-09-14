<form method="post" action="{{ route('order.offer.update', ['offer' => $offer->id]) }}">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="price">ქალაქი</label>
        <input type="text" name="city" id="city" class="form-control" value="{{ $offer->city }}" />
    </div>
    <div class="form-group">
        <label for="incoterm_id">ინკოტერმი</label>
        @include("partials.incoterms.select", ["value" => $offer->incoterm_id])
    </div>
    <div class="form-group">
        <label for="price">ფასი</label>
        <input type="number" name="price" id="price" min="0" step="any" class="form-control"
            value="{{ $offer->price }}" />
    </div>
    <div class="form-group">
        <label for="currency_id">ვალუტა</label>
        @include("partials.currencies.select", ["value" => $offer->currency_id])
    </div>
    <div class="form-group">
        <label for="days">@if($offer->type == "p_offer") წარმოების @else ტრანსპორტირების @endif პერიოდი (დღე)</label>
        <input type="number" name="days" id="days" min="1" step="any" class="form-control"
            value="{{ $offer->days }}" />
    </div>
    <div class="form-group">
        <label for="description">აღწერა</label>
        <textarea name="description" id="description" class="form-control"
            rowspan="3">{{ $offer->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="active_days">შეთავაზება აქტიურია (დღე)</label>
        <input type="number" name="active_days" id="active_days" min="1" step="any" class="form-control"
            value="{{ $offer->active_days }}" />
    </div>
    <div class="form-row align-items-center">
        <div class="col-md my-1">
            <div class="custom-control custom-checkbox mr-sm-2">
                <input class="custom-control-input" type="checkbox" id="active" name="active" @if($offer->active) checked="checked" @endif>
                <label for="active" class="custom-control-label"> აქტიური </label>
            </div>
        </div>
        <div class="col-md my-1">
            <button type="submit" class="btn btn-warning float-right">განახლება</button>
        </div>
    </div>
</form>
