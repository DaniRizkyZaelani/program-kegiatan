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
                        <form action="{{ route('prokeg.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $prokeg->id }}">
                            <div class="mb-3">
                                <label for="nama_program">Nama Program</label>
                                <input type="text" class="form-control" name="nama_program" value="{{ $prokeg->nama_program }}"
                                    placeholder="Nama Program">
                            </div>
                            <div class="mb-3">
                                <label for="penanggung_jawab_id">Penanggung Jawab</label>
                                <select name="penanggung_jawab_id" id="penanggung_jawab_id" class="form-control">
                                    @foreach ($users as $item => $value)
                                    @if ($value->role == 'admin')
                                        @continue
                                    @endif
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bidang_id">Bidang</label>
                                <select name="bidang_id" id="bidang_id" class="form-control">
                                    @foreach ($bidang as $item => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3">

                                <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" name="tanggal_pengajuan" value="{{ $prokeg->tanggal_pengajuan }}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" value="{{ $prokeg->tanggal_mulai }}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" value="{{ $prokeg->tanggal_selesai }}">
                            </div>
                            <div class="mb-3">
                                <label for="anggaran">Anggaran</label>
                                <input type="text" class="form-control" name="anggaran" value="{{ $prokeg->anggaran }}"
                                    placeholder="Jumlah Anggaran">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
                        </script>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
    </div>
</body>

</html>l
