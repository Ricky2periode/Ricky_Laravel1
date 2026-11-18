<!DOCTYPE html>
<html>
<head>
    <title>Tambah Sales</title>
</head>
<body>

<h1>Tambah Transaksi</h1>

<form action="{{ url('sales') }}" method="POST">
@csrf

<label>Customer:</label><br>
<select name="id_customer">
    @foreach($customer as $c)
        <option value="{{ $c->id_customer }}">
            {{ $c->nama_customer }}
        </option>
    @endforeach
</select><br><br>

<label>Produk:</label><br>
<select name="id_produk">
    @foreach($produk as $p)
        <option value="{{ $p->id_produk }}">
            {{ $p->nama_produk }} - Rp {{ $p->harga }}
        </option>
    @endforeach
</select><br><br>

<label>Jumlah:</label><br>
<input type="number" name="jumlah"><br><br>

<label>Subtotal:</label><br>
<input type="number" name="subtotal"><br><br>

<label>Total Harga:</label><br>
<input type="number" name="total_harga"><br><br>

<button type="submit">Simpan</button>

</form>

</body>
</html>