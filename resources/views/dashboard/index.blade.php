@extends('master.master_dashboard')

@section('title')
    Dashboard
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h4>Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action="{{ route('dashboard.sale.filter') }}" method="get" class="row g-3">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dataSales->isEmpty())
                                        <tr>
                                            <td class="card-text text-center" colspan="4">Tidak ada data</td>
                                        </tr>
                                    @else
                                        @foreach ($dataSales as $sale)
                                            <tr>
                                                <td class="card-text text-center">{{ $sale->name }}</td>
                                                <td class="card-text text-center">{{ $sale->date }}</td>
                                                <td class="card-text text-center">{{ $sale->quantity }}</td>
                                                <td class="card-text">Rp {{ $sale->price }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                @if ($total == 0)
                                @else
                                    <tfoot>
                                        <tr>
                                            <td class="card-title" colspan="3">Total</td>
                                            <td class="card-text">Rp {{ $total }}</td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                            {{ $dataSales->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Grafik Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    const ctx = document.getElementById('salesChart').getContext('2d');

    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Total Penjualan',
                data: @json($data),
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
