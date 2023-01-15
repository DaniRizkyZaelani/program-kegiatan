<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
</head>
<body>
    @if (session()->has('success'))

    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>

    @endif
<form action="/login" method="POST">
    @csrf
    <label for="password">Username</label>
    <input type="username" name="username" id="name" placeholder="username" autofocus required> <br>
    <label for="password">password</label>
    <input type="password" name="password" id="name" placeholder="password" required>

    <button type="submit">Login</button>
</form>

    
</body>
</html>