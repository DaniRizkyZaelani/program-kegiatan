@extends('master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>Edit Bidang</h1>
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
                    <a href="{{ route('bidang') }}" class="btn btn-primary">Kembali</a>
                    <form action="{{ route('bidang.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" id="id" name="id" value="{{ $bidang->id }}">

                        <div class="mb-3">
                            <label for="name">Nama Bidang</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                value="{{ old('name', $bidang->name)  }}">
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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
