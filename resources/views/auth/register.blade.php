<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
    <label for="name">Name</label>
    <input type="name" name="name" id="name" placeholder="name" autofocus required> <br>
    <label for="username">Username</label>
    <input type="username" name="username" id="name" placeholder="username" autofocus required> <br>
    <label for="password">Password</label>
    <label for="role">Role</label>
    <select name="role" id="role">
        <option value="admin">Admin</option>
        <option value="dekan">Dekan</option>
        <option value="user">mahasiswa</option>
    </select><br>
    <input type="password" name="password" id="password" placeholder="password" required><br>
    <button type="submit">Register</button>
    </form>
    
    
</body>
</html>