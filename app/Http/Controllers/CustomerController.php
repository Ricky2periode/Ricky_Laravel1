<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();

        return view('customer.index', compact('data'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        Customer::create($request->all());

        return redirect('customer');
    }

    public function show($id)
    {
        return redirect('customer');
    }

    public function edit($id)
    {
        $data = Customer::findOrFail($id);

        return view('customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        $data = Customer::findOrFail($id);
        $data->update($request->all());

        return redirect('customer');
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();

        return redirect('customer');
    }
}