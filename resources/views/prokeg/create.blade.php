@extends('master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>Admin</h1>
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
                    <a href="{{ route('prokeg') }}" class="btn btn-primary mb-4">Kembali</a>
                    <form action="{{ route('prokeg.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_program">Nama Program</label>
                            <input type="text" name="nama_program" placeholder="Nama Program" class="form-control">
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
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="anggaran">Anggaran</label>
                            <input type="text" name="anggaran" placeholder="Jumlah Anggaran" class="form-control">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
        </section>
    </div>
@endsection

@push('js')
@endpush
