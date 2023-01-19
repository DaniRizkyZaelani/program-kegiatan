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
                <div class="card-body">

                    <a href="{{ route('bidang') }}" class="btn btn-primary mb-4">Kembali</a>
                    <form action="{{ route('bidang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Nama Bidang</label>
                            <input type="text" name="name" placeholder="Nama Bidang" class="form-control">
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
@endpush
