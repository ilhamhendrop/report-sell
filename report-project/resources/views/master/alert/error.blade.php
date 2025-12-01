@if (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible fade show alertDanger" role="alert">
        <strong>{{ session()->get('errors') }}</strong>
        <button type="sumbit" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
