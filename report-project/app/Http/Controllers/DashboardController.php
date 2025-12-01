<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard(Request $request)
    {
        $dataSales = Sales::paginate(10);

        $total = 0;

        foreach ($dataSales as $sale) {
            $total += $sale->quantity * $sale->price;
        }

        $sales = Sales::orderBy('date', 'asc')
            ->when($request->start_date && $request->end_date, function ($q) use ($request) {
                $q->whereBetween('date', [$request->start_date, $request->end_date]);
            })
            ->get();

        $labels = $sales->pluck('date');
        $data   = $sales->map(function ($sale) {
            return $sale->quantity * $sale->price;
        });

        $total = $sales->sum(fn($sale) => $sale->quantity * $sale->price);

        return view('dashboard.index', compact('dataSales', 'total', 'labels', 'data'));
    }

    public function filterSale(Request $request)
    {
        $dataSales = Sales::when($request->start_date && $request->end_date, function ($q) use ($request) {
            $q->whereBetween('date', [$request->start_date, $request->end_date]);
        })
            ->orderBy('date', 'asc')->paginate(10);

        $total = 0;

        foreach ($dataSales as $sale) {
            $total += $sale->quantity * $sale->price;
        }

        $sales = Sales::orderBy('date', 'asc')
            ->when($request->start_date && $request->end_date, function ($q) use ($request) {
                $q->whereBetween('date', [$request->start_date, $request->end_date]);
            })
            ->get();

        $labels = $sales->pluck('date');
        $data   = $sales->map(function ($sale) {
            return $sale->quantity * $sale->price;
        });

        $total = $sales->sum(fn($sale) => $sale->quantity * $sale->price);

        return view('dashboard.index', compact('dataSales', 'total', 'labels', 'data'));
    }
}
