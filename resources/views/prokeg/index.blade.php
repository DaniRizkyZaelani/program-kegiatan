<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('prokeg.create')}}">Tambah</a>
    <table>
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
</body>
</html>
