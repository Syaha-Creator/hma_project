<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Tema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: auto;
        }

        label,
        input,
        textarea {
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

    <h1>Pengaturan</h1>

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Background Image:</label>
        <input type="file" name="background_image">
        @if($setting && $setting->background_image)
        <img src="{{ asset('storage/' . $setting->background_image) }}" width="150">
        @endif

        <label>Logo Image:</label>
        <input type="file" name="logo_image">
        @if($setting && $setting->logo_image)
        <img src="{{ asset('storage/' . $setting->logo_image) }}" width="100">
        @endif

        <label>Menu Navigasi (JSON Format):</label>
        <textarea name="navigation_menu" rows="5">
        {{ old('navigation_menu', json_encode($setting->navigation_menu, JSON_PRETTY_PRINT)) }}
        </textarea>
        <button type="submit">Simpan Pengaturan</button>
    </form>
</body>

</html>