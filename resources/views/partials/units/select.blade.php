<select class="{{ $class ?? "custom-select" }}" name="{{ $field ?? 'unit_id' }}" id="{{ $field ?? 'unit_id' }}" value="{{ $value ?? 'unit_id' }}" {{ $required ?? "" }}>
    <option value="">განზომილება</option>
    @foreach($units as $unit)
        <option value="{{ $unit->id }}" @if($unit->id == $value) selected @endif>{{ $unit->name }}</option>
    @endforeach
</select>