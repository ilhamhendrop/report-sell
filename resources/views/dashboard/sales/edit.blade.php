@extends('master.master_dashboard')

@section('title')
    Edit
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <a href="{{ route('sale.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <form action="{{ route('sale.update', ['id' => $sale->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group mb-3">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Produk" value="{{ $sale->name }}">
                                @error('name')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="date" value="{{ $sale->date }}">
                                @error('date')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Penjualan</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Penjualan Produk" value="{{ $sale->quantity }}">
                                @error('quantity')
                                    <label class="text-danger">{{ $massage }}</label>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="price" placeholder="Harga Produk" value="{{ $sale->price }}">
                                @error('price')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
