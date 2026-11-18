<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>

<h1>Edit Produk</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 16px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produk.update', $data) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" value="{{ old('nama_produk', $data->nama_produk) }}"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="{{ old('harga', $data->harga) }}"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ old('stok', $data->stok) }}"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi">{{ old('deskripsi', $data->deskripsi) }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>