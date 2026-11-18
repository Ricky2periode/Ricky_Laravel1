<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<h1>Edit Customer</h1>

<form action="{{ url('customer/' . $data->getKey()) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Customer:</label><br>
    <input type="text" name="nama_customer" value="{{ old('nama_customer', $data->nama_customer) }}"><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat">{{ old('alamat', $data->alamat) }}</textarea><br><br>

    <label>No HP:</label><br>
    <input type="text" name="no_hp" value="{{ old('no_hp', $data->no_hp) }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $data->email) }}"><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>