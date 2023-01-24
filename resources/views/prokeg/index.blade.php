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
                    <h3 class="card-title">Daftar Kegiatan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            @if (Auth::user()->role == 'mahasiswa')
                                <a href="{{ route('prokeg.create') }}" class="btn btn-primary mb-4">Tambah</a>
                            @endif

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
                        <div class="table-responsive">
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
                                        <th style="width: 500px">Aksi</th>
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
                                            <td>Rp.
                                                @convert($value->anggaran)
                                            </td>

                                            <td>
                                                <a href="{{ route('prokeg') }}/{{ $value->id }}/edit"
                                                    class="btn btn-warning">Edit</a> |
                                                <a href="javascript:void(0)" data-id="{{ $value->id }}"
                                                    class="btn btn-danger btn-delete">Hapus</a> |
                                                @if ($value->status == 1 || $value->status == 2)
                                                @else
                                                    @if (Auth::user()->role == 'dekan')
                                                        |
                                                        <a href="javascript:void(0)" data-id="{{ $value->id }}"
                                                            class="btn btn-primary btn-approve">Approvement</a>
                                                    @endif
                                                @endif
                                                <a href="javascript:void(0)" data-id="{{ $value->id }}"
                                                    class="btn btn-success btn-view">Lihat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <!-- /.content-wrapper -->

    <!-- Modal Detail -->
    <div class="modal" tabindex="-1" id="modalView">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="javascript:void(0)" class="btn btn-primary mb-3 btn-input-detail">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-detail">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Nama Program</th>
                                    <th>Nama kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Pengeluaran</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Input -->
    <div class="modal" tabindex="-1" id="modalInputDetail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('detailprogram.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="program_kegiatan_id" id="program_kegiatan_id">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label @error('nama_kegiatan') is-invalid @enderror">Nama
                                Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal"
                                class="form-label @error('tanggal') is-invalid @enderror">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="pengeluaran"
                                class="form-label @error('pengeluaran') is-invalid @enderror">Pengeluaran</label>
                            <input type="text" class="form-control" id="pengeluaran" name="pengeluaran">
                        </div>
                        <div class="mb-3">
                            <label for="bukti" class="form-label @error('bukti') is-invalid @enderror">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-close"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
            $('.btn-view').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#modalView').modal('show');
                $.ajax({
                    type: "get",
                    url: "/detailprogram/" + id + "/view",
                    success: function(response) {
                        console.log(response);
                        var html = '';
                        $.each(response, function(key, item) {
                            html += '<tr>';
                            html += '<td>' + (key + 1) + '</td>';
                            html += '<td>' + item.program_kegiatan.nama_program +
                                '</td>';

                            html += '<td>' + item.nama_kegiatan + '</td>';
                            html += '<td>' + item.tanggal + '</td>';
                            html += '<td>' + item.pengeluaran + '</td>';
                            if (item.bukti.split('.').pop() == 'pdf') {
                                return html += '<td><img src="/image/pdf.png" style="height: 300px;></td>';
                            }else {
                                return html += '<td> <img src="/bukti/' + item.bukti + '" style="height: 300px;"> </td>';
                            }
                            html += '</tr>';
                        });

                        $('.table-detail').append(html);
                        $('.btn-input-detail').attr('data-id', id);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('.modal').on('hidden.bs.modal', function() {
                $('.table-detail tbody').empty();
            });
            $('.btn-input-detail').on('click', function() {
                var id = $(this).data('id');
                $('#modalInputDetail').modal('show');
                $('#program_kegiatan_id').val(id);
            });
        });
    </script>
@endpush
