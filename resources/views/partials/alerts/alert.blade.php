@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></span>
        <strong>შეტყობინება:</strong> {{ session('success') }}
    </div>

@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></span>
        <strong>შეტყობინება:</strong> {{ session('error') }}
    </div>



@endif
