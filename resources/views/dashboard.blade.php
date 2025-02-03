<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .box {
            display: inline-block;
            width: 200px;
            height: 100px;
            background: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            margin: 20px;
            border-radius: 10px;
        }

        .sidebar {
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
        <div class="box">Total Pengguna: {{ $totalUsers }}</div>
        <div class="box">Pengguna Aktif: {{ $activeUsers }}</div>
    </div>

</body>

</html>