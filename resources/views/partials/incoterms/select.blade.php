<select class="{{ $class ?? "custom-select" }}" name="{{ $field ?? "incoterm_id" }}" id="{{ $field ?? "incoterm_id" }}">
    <option value="">პირობა</option>
    @foreach($incoterms as $incoterm)
        <option value="{{ $incoterm->id }}" @if($incoterm->id == $value) selected @endif>{{ $incoterm->code }}</option>
    @endforeach
</select>