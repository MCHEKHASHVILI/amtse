<select class="{{ $class ?? "custom-select" }}" name="{{ $field ?? "currency_id" }}" id="{{ $field ?? "currency_id" }}">
    <option value="">ვალუტა</option>
    @foreach($currencies as $key => $currency)
        <option value="{{$currency->id}}" @if($currency->id == $value) selected @endif>{{$currency->code}}</option>
    @endforeach
</select>
