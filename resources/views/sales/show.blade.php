<!DOCTYPE html>
<html>
<head>
    <title>Detail Sales</title>
</head>
<body>

<h1>Detail Transaksi</h1>

<p><strong>Customer:</strong> {{ $data->customer->nama_customer }}</p>
<p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
<p><strong>Total Harga:</strong> Rp {{ number_format($data->total_harga) }}</p>

@if($data->detail)
    <h2>Detail Produk</h2>
    <p><strong>Produk:</strong> {{ optional($data->detail->produk)->nama_produk }}</p>
    <p><strong>Jumlah:</strong> {{ $data->detail->jumlah }}</p>
    <p><strong>Subtotal:</strong> Rp {{ number_format($data->detail->subtotal) }}</p>
@endif

<p><a href="/sales">Kembali</a></p>
</body>
</html>