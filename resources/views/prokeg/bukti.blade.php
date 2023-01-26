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
                    <h3 class="card-title">Detail Kegiatan & Bukti</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">

                        <div class="col-6">
                            <form action="{{ route('detailprogram.cari') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari Nama Kegiatan"
                                        name="cari" value="{{ old('cari') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            
                                
                               
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Program</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tanggal</th>
                                        <th>Pengeluaran</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->program_kegiatan->nama_program }}</td>
                                            <td>{{ $value->nama_kegiatan }}</td>
                                            <td>@date($value->tanggal)</td>
                                            <td>{{ $value->pengeluaran }}</td>
                                            <td>
                                                @if (strpos($value->bukti, '.pdf'))
                                                    {{  $value->bukti  }}
                                                @elseif (strpos($value->bukti, '.jpg') || strpos($value->bukti, '.png' ))
                                                    <img src="{{ asset('bukti/' . $value->bukti) }}" alt="bukti"
                                                        height="300px">
                                                @endif
                                                
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

@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
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
                                html += '<td>' + item.bukti + '</td>';
                                // html += '<td> <img src="/image/pdf.png" style="height: 300px;"> </td>';
                            } else {
                                html += '<td> <img src="/bukti/' + item.bukti +
                                    '" style="height: 300px;"> </td>';
                            }
                            html += '<td><a href="/detailprogram/' + item.id +
                                '/download" class="btn btn-primary download">Download</a></td>';
                                html +=
                                '@if (Auth::user()->role == "admin")' +
                                '<td><a href="javascript:void(0)" class="btn btn-warning btn-edit-detail" data-id="' +
                                item.id + '">Edit</a></td>'+
                                '<td><a href="javascript:void(0)" class="btn btn-danger btn-delete-detail" data-id="' +
                                item.id + '">Delete</a></td>';
                                '@endif';
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
            $('.modalDetail').on('hidden.bs.modal', function() {
                $('.table-detail tbody').empty();
            });
            $('.btn-input-detail').on('click', function() {
                var id = $(this).data('id');
                $('#modalInputDetail').modal('show');
                $('#program_kegiatan_id').val(id);
            });
            $('.table-detail').on('click', '.btn-edit-detail', function() {
                var id = $(this).data('id');
                $('#modalEditDetail').modal('show');
                $.ajax({
                    type: "get",
                    url: "/detailprogram/" + id + "/edit",
                    success: function(response) {
                        $('.id').val(response.id);
                        $('.nama_kegiatan').val(response.nama_kegiatan);
                        $('.tanggal').val(response.tanggal);
                        $('.pengeluaran').val(response.pengeluaran);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('.table-detail').on('click', '.btn-delete-detail', function() {
                var id = $(this).data('id');
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
                                url: "/detailprogram/" + id + "/delete",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: id
                                },
                                dataType: "json",
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
