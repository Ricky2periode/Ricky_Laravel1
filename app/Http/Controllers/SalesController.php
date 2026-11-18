<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\DetailSales;

class SalesController extends Controller
{
    public function index()
    {
        $data = Sales::with('customer')->get();

        return view('sales.index', compact('data'));
    }

    public function create()
    {
        $customer = Customer::all();
        $produk = Produk::all();

        return view('sales.create', compact('customer', 'produk'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_customer' => 'required|exists:customer,id_customer',
            'id_produk' => 'required|exists:produk,id_produk',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $sales = Sales::create([
            'id_customer' => $validated['id_customer'],
            'tanggal_sales' => $validated['tanggal'],
            'total_harga' => $validated['total_harga'],
        ]);

        DetailSales::create([
            'id_sales' => $sales->id_sales,
            'id_produk' => $validated['id_produk'],
            'jumlah' => $validated['jumlah'],
            'subtotal' => $validated['subtotal'],
        ]);

        return redirect('/sales');
    }

    public function show($id)
    {
        $data = Sales::with('customer', 'detail.produk')->findOrFail($id);

        return view('sales.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Sales::findOrFail($id);
        $customer = Customer::all();
        $produk = Produk::all();

        return view('sales.edit', compact('data', 'customer', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_customer' => 'required|exists:customer,id_customer',
            'id_produk' => 'required|exists:produk,id_produk',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $sales = Sales::findOrFail($id);
        $sales->update([
            'id_customer' => $validated['id_customer'],
            'tanggal_sales' => $validated['tanggal'],
            'total_harga' => $validated['total_harga'],
        ]);

        $detail = DetailSales::where('id_sales', $sales->id_sales)->first();
        if ($detail) {
            $detail->update([
                'id_produk' => $validated['id_produk'],
                'jumlah' => $validated['jumlah'],
                'subtotal' => $validated['subtotal'],
            ]);
        }

        return redirect('/sales');
    }

    public function destroy($id)
    {
        DetailSales::where('id_sales', $id)->delete();
        Sales::destroy($id);

        return redirect('/sales');
    }
}
