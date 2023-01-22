<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
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

<body class="hold-transition login-page">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('loginError'))
        <div class="alert alert-danger" role="alert">
            {{ session('loginError') }}
        </div>
    @endif
    <div class="container-fluid">
		<div class="row ">
			<!-- IMAGE CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<img src="/image/logo1.png" width="150px">
					</div>
					<div class="text-center mb-4">
			      <h4>Login</h4>
			    </div>

                <form class="px-3" action="/login" method="POST">
                    @csrf
                    <div class="form-input">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="text" name="username" id="username" placeholder="username" tabindex="10"required>
                    </div>

                    <div class="form-input">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" id="password" placeholder="password" tabindex="10"required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-block" value="Login">Login</button>
                    <div class="text-center mb-5 text-white">Belum punya akun?
                        <a class="register-link" href="/register">Register disini</a>
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
    <!-- css -->

</body>


</html>
