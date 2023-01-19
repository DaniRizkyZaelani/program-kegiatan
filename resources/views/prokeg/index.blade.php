@extends('master')

@section('content')
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
                    <a href="{{ route('prokeg.create') }}" class="btn btn-primary mb-4">Tambah</a>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Program</th>
                                    <th>Nama Pengaju</th>
                                    <th>Bidang</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Anggaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prokeg as $item => $value)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $value->nama_program }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->bidang->name }}</td>
                                        <td>
                                            @if ($value->status == null)
                                                <span class="badge badge-warning">Menunggu</span>
                                            @elseif ($value->status == 1)
                                                <span class="badge badge-success">Disetujui</span>
                                            @elseif ($value->status == 2)
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{ $value->tanggal_pengajuan }}</td>
                                        <td>{{ $value->tanggal_mulai }}</td>
                                        <td>{{ $value->tanggal_selesai }}</td>
                                        <td>{{ $value->anggaran }}</td>
                                        <td>approve|lihat|edit|hapus</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
                <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
