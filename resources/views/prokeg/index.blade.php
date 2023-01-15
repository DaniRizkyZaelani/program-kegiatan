@extends('master')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>Program kegiatan</h1>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
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
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
@endsection
