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
                    <h3 class="card-title">Daftar Kegiatan yang belum di approve / reject</h3>
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
                                            @if ($value->status == 1)
                                            @continue
                                                <span class="badge badge-success">Disetujui</span>
                                            @elseif ($value->status == 2)
                                            @continue
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $value->nama_program }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->bidang->name }}</td>
                                        <td>
                                            @if ($value->status == null)
                                                <span class="badge badge-warning">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>{{ $value->tanggal_pengajuan }}</td>
                                        <td>{{ $value->tanggal_mulai }}</td>
                                        <td>{{ $value->tanggal_selesai }}</td>
                                        <td>Rp.{{ $value->anggaran }}</td>

                                        <td><a href="{{ route('prokeg') }}/{{ $value->id }}/edit" class="btn btn-warning">Edit</a></td>
                                        <td><a href="javascript:void(0)" data-id="{{ $value->id }}"
<<<<<<< HEAD
                                                class="btn btn-danger btn-delete">Hapus</a></td>
=======
                                                class="btn btn-danger btn-delete">Hapus</a>

                                                @if($value->status == 1 || $value->status == 2)
                                                    
                                                @else
                                                    @if (Auth::user()->role == 'dekan')
                                                |
                                                    <a href="javascript:void(0)" data-id="{{ $value->id }}"
                                                        class="btn btn-primary btn-approve">Approvement</a>
                                                    @endif
                                                @endif
                                            
                                        </td>
                                        <td>approve|lihat|edit|hapus</td>
>>>>>>> 3e74f0d482ca15340c19f07ab69c8f2b51820a5e
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


        $('.btn-approve').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Select field validation',
                    input: 'select',
                    inputOptions: {
                        '1': 'Disetujui',
                        '2': 'Ditolak'
                    },
                    inputPlaceholder: 'Select status',
                    showCancelButton: true,
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value === '1') {
                                $.ajax({
                                    type: "get",
                                    url: "{{ route('prokeg') }}/" + id +
                                        "/approved",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        id: id,
                                        status: value
                                    },
                                    dataType: "json",
                                    success: function(response) {

                                    }
                                });
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Disetujui',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            } else if (value === '2') {
                                $.ajax({
                                    type: "get",
                                    url: "{{ route('prokeg') }}/" + id +
                                        "/rejected",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        id: id,
                                        status: value
                                    },
                                    dataType: "json",
                                    success: function(response) {

                                    }
                                });
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Ditolak',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            }
                        })
                    }
                })
            });
    
    </script>
@endpush
