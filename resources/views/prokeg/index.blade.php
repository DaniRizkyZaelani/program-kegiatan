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
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('prokeg.create') }}" class="btn btn-primary mb-4">Tambah</a>
                        </div>
                        <div class="col-6">
                            <form action="#" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari Program Kegiatan"
                                        name="cari" value="{{ old('cari') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="#" class="btn btn-warning mr-2">Export PDF</a>
                        <a href="#" class="btn btn-primary">Export Excel</a>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Program</th>
                                    <th>Nama Pengaju</th>
                                    <th>Nama Penanggung Jawab</th>
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
                                        <td>{{ $value->penanggung_jawab->name }}</td>
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

                                        <td><a href="{{ route('prokeg') }}/{{ $value->id }}/edit"
                                                class="btn btn-warning">Edit</a></td>
                                        <td><a href="javascript:void(0)" data-id="{{ $value->id }}"
                                                class="btn btn-danger btn-delete">Hapus</a></td>
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.btn-delete').on('click', function(e) {
                var id = $(this).data('id');
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil dihapus.',
                            'success'
                        ).then((result) => {
                            $.ajax({
                                type: "delete",
                                url: "{{ route('prokeg') }}/" + id + "/delete",
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    location.reload();
                                }
                            });
                        })
                    }
                });
            });
        });
    </script>
@endpush
