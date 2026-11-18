<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            background: white;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        a, button {
            padding: 5px 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-tambah {
            display: block;
            width: 120px;
            margin: 10px auto;
            background: green;
            color: white;
            text-align: center;
        }
        .btn-edit {
            background: orange;
            color: white;
        }
        .btn-hapus {
            background: red;
            color: white;
        }
    </style>
</head>
<body>

<h1>Data Produk</h1>

<a href="{{ route('produk.create') }}" class="btn-tambah">+ Tambah</a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $index => $d)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $d->nama_produk }}</td>
            <td>Rp {{ number_format($d->harga) }}</td>
            <td>{{ $d->stok }}</td>
            <td>
                <a href="{{ url('produk/' . $d->getKey() . '/edit') }}" class="btn-edit">Edit</a>

                <form action="{{ url('produk/' . $d->getKey()) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-hapus">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>