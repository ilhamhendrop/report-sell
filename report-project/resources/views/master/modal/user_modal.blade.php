<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.user.create') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Masukan Username" name="username">
                        @error('username')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="name">
                        @error('name')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="" selected>-- Pilih Role --</option>
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
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            id="">
                        @error('password')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" placeholder="password confirmation" name="password_confirmation"
                            class="form-control">
                        @error('password_confirmation')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
