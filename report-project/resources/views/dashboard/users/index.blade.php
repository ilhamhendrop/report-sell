@extends('master.master_dashboard')

@section('title')
    User
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="fa-solid fa-plus"></i> Tambah User
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="card-title text-center">Username</th>
                                        <th class="card-title text-center">Name</th>
                                        <th class="card-title text-center">Role</th>
                                        <th class="card-title text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->isEmpty())
                                        <tr>
                                            <td class="card-text text-center" colspan="4">Tidak ada data</td>
                                        </tr>
                                    @else
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="card-text text-center">{{ $user->username }}</td>
                                                <td class="card-text text-center">{{ $user->name }}</td>
                                                <td class="card-text text-center">{{ $user->role }}</td>
                                                <td class="card-text text-center">
                                                    <a href="{{ route('admin.user.edit.data', ['id' => $user->id]) }}"
                                                        class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i>
                                                        Edit Data</a>
                                                    <a href="{{ route('admin.user.edit.password', ['id' => $user->id]) }}"
                                                        class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i>
                                                        Edit Password</a>
                                                    <form action="{{ route('admin.user.delete', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="mt-2 btn btn-danger btn-sm show_confirm"
                                                            onclick="return confirm('{{ __('Apakah anda yakin akan menghapus data ini?') }}')">
                                                            <i class="fa-solid fa-trash"></i>
                                                            {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('master.modal.user_modal')
