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
                        <form action="{{ route('admin.user.update.data', ['id' => $user->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Masukan Username" name="username"
                                    value="{{ $user->username }}">
                                @error('username')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="name"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                    <option>-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->value }}">
                                            {{ $role->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
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
