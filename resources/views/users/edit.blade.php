<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
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
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }

        button {
            background: green;
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
        <h1>Edit Pengguna</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="fullname" value="{{ $user->user_fullname }}">
            <input type="email" name="email" value="{{ $user->user_email }}">
            <button type="submit">Update</button>
        </form>
    </div>

</body>

</html>