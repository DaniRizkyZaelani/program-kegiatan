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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('prokeg') }}" class="btn btn-primary mb-4">Kembali</a>
                        <form action="{{ route('prokeg.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_program">Nama Program</label>
                                <input type="text" name="nama_program" placeholder="Nama Program" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="bidang">Bidang</label>
                                <input type="text" name="bidang" placeholder="Bidang Studi" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="user_id">Penanggung Jawab</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $item => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="anggaran">Anggaran</label>
                                <input type="text" name="anggaran" placeholder="Jumlah Anggaran" class="form-control">
                            </div>
                            <button type="submit"  class="btn btn-primary">Simpan</button>
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
