<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mb-4">Edit Data User</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
    <a href="{{ route('users') }}">Kembali</a>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" id="id" name="id" value="{{ $user->id }}">
        
        <div class="mb-3">
        <label for="role">Role</label>
        <input type="text" class="form-control" id="role" name="role" placeholder="Role" value="{{ $user->role }}">
    </div>
        <div class="mb-3">
        <label for="name">Nama</label>
        <input type="text"class="form-control" id="nama" name="name" placeholder="Nama" value="{{ $user->name }}">
    </div>
        <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $user->username }}">
    </div>
        <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ $user->password }}">
    </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>
</html>
