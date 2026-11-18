<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('produk.index', compact('data'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Produk::create($request->all());

        return redirect('/produk');
    }

    public function show($id)
    {
        return redirect('/produk');
    }

    public function edit($id)
    {
        $data = Produk::findOrFail($id);
        return view('produk.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $data = Produk::findOrFail($id);
        $data->update($request->all());

        return redirect('/produk');
    }

    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();

        return redirect('/produk');
    }
}