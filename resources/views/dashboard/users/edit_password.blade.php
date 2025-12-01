@extends('master.master_dashboard')

@section('title')
    User Edit Data
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <a href="{{ route('admin.user.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <form action="{{ route('admin.user.update.password', ['id' => $user->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group mb-3">
                                <label>Passoword</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    id="">
                                @error('password')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Passoword</label>
                                <input type="password" placeholder="password confirmation" name="password_confirmation"
                                    class="form-control">
                                @error('password_confirmation')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
