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
    <h1 class="text-center mb-4">Data User</h1>

    <div class="container">
    <a href="{{route('prokeg.create')}}" class="btn btn-primary">Tambah</a>
    <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
               Logout
              </button>
    </form>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Program</th>
                <th>Bidang</th>
                <th>Tanggal</th>
                <th>Anggaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prokeg as $item => $value)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ $value->nama_program }}</td>
                    <td>{{ $value->bidang }}</td>
                    <td>{{ $value->tanggal }}</td>
                    <td>{{ $value->anggaran }}</td>
                    <td>edit|hapus</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

</body>
</html>
