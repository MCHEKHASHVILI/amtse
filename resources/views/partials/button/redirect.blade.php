<form method="{{ $method ?? "get" }}" action="{{ $action ?? "" }}">
    @csrf
    <button 
        type    = "submit" 
        class   = "{{ $class ?? "" }}"
        style   = "{{ $style ?? ""}}"
    >{!! $value ?? "Submit" !!}</button>
</Form>
