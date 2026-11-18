<!DOCTYPE html>
<html>
<head>
    <title>Data Sales</title>
    <style>
        body { font-family: Arial; background:#eef1f5; }
        .container { width:90%; margin:30px auto; background:#fff; padding:20px; border-radius:10px; }
        table { width:100%; border-collapse:collapse; }
        th { background:#007bff; color:white; padding:10px; }
        td { padding:10px; text-align:center; }
        tr:nth-child(even){ background:#f2f2f2; }
        .btn { padding:8px 12px; background:green; color:white; text-decoration:none; border-radius:5px; }
    </style>
</head>
<body>

<div class="container">
<h1>💰 Data Sales</h1>

<a href="{{ url('sales/create') }}" class="btn">+ Transaksi</a>

<table>
<tr>
    <th>No</th>
    <th>Customer</th>
    <th>Tanggal</th>
    <th>Total</th>
</tr>

@foreach($data as $i => $d)
<tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $d->customer->nama_customer }}</td>
    <td>{{ $d->tanggal }}</td>
    <td>Rp {{ number_format($d->total_harga) }}</td>
</tr>
@endforeach

</table>
</div>

</body>
</html>