<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: auto;
        }

        .sidebar {
            text-align: center;
            width: 200px;
            float: left;
            padding: 20px;
            background: #eee;
            height: 100vh;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        .menu a {
            display: block;
            padding: 10px;
            background: #ddd;
            margin-bottom: 5px;
            text-decoration: none;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        label,
        input {
            padding: auto;
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }

        button {
            background: blue;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100">

        <div class="menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('users.index') }}">Master Pengguna</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <h1>Tambah Pengguna</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Tambah Pengguna</button>
        </form>
    </div>

</body>

</html>