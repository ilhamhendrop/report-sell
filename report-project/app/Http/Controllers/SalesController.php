<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SalesController extends Controller
{
    public function indexSale()
    {
        $sales = Sales::paginate(10);

        $total = 0;

        foreach ($sales as $sale) {
            $total += $sale->quantity * $sale->price;
        }

        return view('dashboard.sales.index', compact('sales', 'total'));
    }

    public function createSale(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'date.required' => 'Tanggal tidak boleh kosong',
            'quantity.required' => 'Penjualan tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong'
        ]);

        $user_id = Auth::id();

        Sales::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'date' => $request->date,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return Redirect::back()->with('succes', 'Berhasil disimpan');
    }

    public function editSale($id)
    {
        $sale = Sales::find($id);

        return view('dashboard.sales.edit', compact('sale'));
    }

    public function updateSale($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'date.required' => 'Tanggal tidak boleh kosong',
            'quantity.required' => 'Stok tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong'
        ]);

        $sale = Sales::find($id);

        $sale->update([
            'name' => $request->name,
            'date' => $request->date,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return Redirect::back()->with('succes', 'Data berhasil dirubah');
    }

    public function deleteSale($id)
    {
        $sale = Sales::find($id);
        $sale->delete();

        return Redirect::back()->with('succes', 'Data berhasil dihapus');
    }

    public function filterSale(Request $request)
    {
        $sales = Sales::when($request->start_date && $request->end_date, function ($q) use ($request) {
            $q->whereBetween('date', [$request->start_date, $request->end_date]);
        })
            ->orderBy('date', 'asc')->paginate(10);

        $total = 0;

        foreach ($sales as $sale) {
            $total += $sale->quantity * $sale->price;
        }

        return view('dashboard.sales.index', compact('sales', 'total'));
    }
}
