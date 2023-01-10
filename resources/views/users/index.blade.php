<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('users.create') }}">Tambah</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Role</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user => $value)
                <tr>
                    <th>{{ $user + 1 }}</th>
                    <th>{{ $value->role }}</th>
                    <th>{{ $value->name }}</th>
                    <th>{{ $value->username }}</th>
                    <th>{{ $value->password }}</th>
                    <th>edit|hapus</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
