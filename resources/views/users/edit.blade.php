<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('users') }}">Kembali</a>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <label for="role">Role</label>
        <input type="text" name="role" placeholder="Role" value="{{ $user->role }}">
        <label for="name">Nama</label>
        <input type="text" name="name" placeholder="Nama" value="{{ $user->name }}">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" value="{{ $user->username }}">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" value="{{ $user->password }}">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
