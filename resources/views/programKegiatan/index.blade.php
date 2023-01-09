<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Kegiatan</title>
</head>
<body>
    <a href="">Tambah</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Program</th>
                <th>Bidang</th>
                <th>Tanggal</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prokeg as $item => $value)
                <tr>
                    <th>{{ $item + 1 }}</th>
                    <th>{{ $value->nama_program }}</th>
                    <th>{{ $value->bidang }}</th>
                    <th>{{ $value->tanggal }}</th>
                    <th>{{ $value->pengeluaran }}</th>
                    <th>edit|hapus</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
