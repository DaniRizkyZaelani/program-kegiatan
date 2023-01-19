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
                    <a href="{{ route('users') }}" class="btn btn-primary mb-4">Kembali</a>
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" id="role" name="role" placeholder="Role" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" placeholder="Nama" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password"name="password" placeholder="Password"
                                class="form-control">
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
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>

@endsection
