<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>

<h1>Tambah Produk</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 16px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="{{ old('harga') }}"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ old('stok') }}"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi">{{ old('deskripsi') }}</textarea><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>