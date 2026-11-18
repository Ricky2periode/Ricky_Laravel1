<!DOCTYPE html>
<html>
<head>
    <title>Data Customer</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef1f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-tambah {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-tambah:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #007bff;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }

        tr:hover {
            background: #e2e6ea;
        }

        .btn-edit {
            background: #ffc107;
            color: black;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-hapus {
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>👤 Data Customer</h1>

    <a href="{{ url('customer/create') }}" class="btn-tambah">+ Tambah Customer</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $index => $d)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $d->nama_customer }}</td>
            <td>{{ $d->alamat }}</td>
            <td>{{ $d->no_hp }}</td>
            <td>
                <a href="{{ url('customer/' . $d->getKey() . '/edit') }}" class="btn-edit">Edit</a>

                <form action="{{ url('customer/' . $d->getKey()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-hapus">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

</body>
</html>