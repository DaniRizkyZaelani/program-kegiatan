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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        <label for="role">Role</label>
        <input type="text" name="role" placeholder="Role">
        <label for="name">Nama</label>
        <input type="text" name="name" placeholder="Nama">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
