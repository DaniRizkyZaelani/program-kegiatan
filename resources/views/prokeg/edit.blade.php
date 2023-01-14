<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="#">Kembali</a>
    <form action="#" method="post">
        @csrf
        <label for="nama_program">Nama Program</label>
        <input type="text" name="nama_program" placeholder="Nama Program">
        <label for="bidang">Bidang</label>
        <input type="text" name="bidang" placeholder="Bidang Studi">
        <label for="user_id">Penanggung Jawab</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $item => $value)
                <option value="{{ $value->id }}">{{ $value->nama }}</option>
            @endforeach
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal">
        <label for="anggaran">Anggaran</label>
        <input type="text" name="anggaran" placeholder="Jumlah Anggaran">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>l
