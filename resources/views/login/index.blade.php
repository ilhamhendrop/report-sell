@extends('master.master_login')

@section('title')
    Login
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Login</h3>
                    </div>
                    <div class="card-body">
                        @include('master.alert.error')
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputUsername" type="text" placeholder="Masukan Username" name="username"/>
                                <label for="inputUsername">Username</label>
                            </div>
                            @error('username')
                                <label class="mt-3 mb-3 text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password"/>
                                <label for="inputPassword">Password</label>
                            </div>
                            @error('password')
                                <label class="mt-3 mb-3 text-danger">{{ $message }}</label>
                            @enderror
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
