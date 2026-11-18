<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
</head>
<body>

<h1>Tambah Customer</h1>

<form action="{{ url('customer') }}" method="POST">
    @csrf

    <label>Nama Customer:</label><br>
    <input type="text" name="nama_customer" value="{{ old('nama_customer') }}"><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat">{{ old('alamat') }}</textarea><br><br>

    <label>No HP:</label><br>
    <input type="text" name="no_hp" value="{{ old('no_hp') }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>