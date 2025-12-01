@if (session()->has('succes'))
    <div class="alert alert-success alert-dismissible fade show alertSucces" role="alert">
        <strong>{{ session()->get('succes') }}</strong>
        <button type="sumbit" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
