<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sale.create') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Produk">
                        @error('name')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="date">
                        @error('date')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Penjualan</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Penjualan Produk">
                        @error('quantity')
                            <label class="text-danger">{{ $massage }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Harga Produk">
                        @error('price')
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
