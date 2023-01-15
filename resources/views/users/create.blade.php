<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program-Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mb-4">Tambah Data User</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('users') }}" class="btn btn-primary mb-4">Kembali</a>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" id="role" name="role" placeholder="Role"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Nama"
                                class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="Username"
                                class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password"name="password" placeholder="Password"
                                class="form-control">
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
