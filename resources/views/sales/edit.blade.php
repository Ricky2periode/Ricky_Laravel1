<!DOCTYPE html>
<html>
<head>
    <title>Edit Sales</title>
</head>
<body>

<h1>Edit Transaksi</h1>

<form action="{{ url('sales/' . $data->getKey()) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Customer:</label><br>
    <select name="id_customer">
        @foreach($customer as $c)
            <option value="{{ $c->id_customer }}" {{ $data->id_customer == $c->id_customer ? 'selected' : '' }}>
                {{ $c->nama_customer }}
            </option>
        @endforeach
    </select><br><br>

    <label>Produk:</label><br>
    <select name="id_produk">
        @foreach($produk as $p)
            <option value="{{ $p->id_produk }}" {{ optional($data->detail)->id_produk == $p->id_produk ? 'selected' : '' }}>
                {{ $p->nama_produk }} - Rp {{ $p->harga }}
            </option>
        @endforeach
    </select><br><br>

    <label>Tanggal:</label><br>
    <input type="date" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}"><br><br>

    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" value="{{ old('jumlah', optional($data->detail)->jumlah) }}"><br><br>

    <label>Subtotal:</label><br>
    <input type="number" name="subtotal" value="{{ old('subtotal', optional($data->detail)->subtotal) }}"><br><br>

    <label>Total Harga:</label><br>
    <input type="number" name="total_harga" value="{{ old('total_harga', $data->total_harga) }}"><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>