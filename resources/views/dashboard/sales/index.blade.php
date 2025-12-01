@extends('master.master_dashboard')

@section('title')
    Penjualan
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
                                <i class="fa-solid fa-plus"></i> Tambah Penjualan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('master.alert.succes')
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action="{{ route('sale.filter') }}" method="get" class="row g-3">
                                <div class="col-md-6">
                                    <label>Tanggal Awal</label>
                                    <input type="date" class="form-control" name="start_date" id="">
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Akhit</label>
                                    <input type="date" class="form-control" name="end_date" id="">
                                </div>
                                <div class="col-md-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="mt-4 mb-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="card-title text-center">Produk</th>
                                        <th class="card-title text-center">Tanggal</th>
                                        <th class="card-title text-center">Penjualan</th>
                                        <th class="card-title text-center">Harga</th>
                                        <th class="card-title text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sales->isEmpty())
                                        <tr>
                                            <td class="card-text text-center" colspan="5">Tidak ada data</td>
                                        </tr>
                                    @else
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td class="card-text text-center">{{ $sale->name }}</td>
                                                <td class="card-text text-center">{{ $sale->date }}</td>
                                                <td class="card-text text-center">{{ $sale->quantity }}</td>
                                                <td class="card-text">Rp {{ $sale->price }}</td>
                                                <td class="card-text text-center">
                                                    <a href="{{ route('sale.edit', ['id' => $sale->id]) }}"
                                                        class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i>
                                                        Edit</a>
                                                    <form action="{{ route('sale.delete', ['id' => $sale->id]) }}"
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
                                @if ($total == 0)
                                @else
                                    <tfoot>
                                        <tr>
                                            <td class="card-text" colspan="3">Total</td>
                                            <td class="card-text">Rp {{ $total }}</td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                            {{ $sales->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('master.modal.sale_modal')
