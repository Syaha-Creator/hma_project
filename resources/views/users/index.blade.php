<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
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

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit {
            background: green;
            color: white;
        }

        .delete {
            background: red;
            color: white;
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
        <h1>Manajemen Pengguna</h1>
        <a href="{{ route('users.create') }}" class="btn" style="background: blue; color: white;">Tambah Pengguna</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->user_fullname }}</td>
                    <td>{{ $user->user_email }}</td>
                    <td>
                        @if($user->status == 1)
                        <span style="color: green;">Aktif</span>
                        @else
                        <span style="color: red;">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="fullname" value="{{ $user->user_fullname }}">
                            <input type="email" name="email" value="{{ $user->user_email }}">
                            <button type="submit">Update</button>
                        </form>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Account</button>
                        </form>
                        <form action="{{ route('users.toggleStatus', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">{{ $user->status == 1 ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>