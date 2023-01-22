<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
    <!-- css -->
    <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row ">
            <!-- IMAGE CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
            <!-- IMAGE CONTAINER END -->

            <!-- FORM CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 infinity-form-container">
                <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">
                    <!-- Company Logo -->
                    <div class="text-center mb-3 mt-5">
                        <img src="/image/logo1.png" width="150px">
                    </div>
                    <div class="text-center mb-4">
                        <h4>Create an account</h4>
                    </div>
                    <!-- Form -->
                    <form action="/register" class="px-3" method="POST">
                        @csrf
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="name" id="name" placeholder="Nama Anda" tabindex="10"
                                required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="text" name="username" id="username" placeholder="Username" tabindex="10"
                                required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-users"></i></span>
                            <input type="text" name="role" id="role" placeholder="Role" tabindex="10"
                            value="mahasiswa" readonly required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" id="password" placeholder="Password" tabindex="10"
                                required>
                        </div>

                        <!-- Register Button -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block">Register</button>
                        </div>

                        <div class="text-center mb-5 text-white">Sudah punya akun?
                            <a class="login-link" href="/login">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM CONTAINER END -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>

</body>

</html>
