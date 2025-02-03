@php
$settings = \App\Models\Setting::first();
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Website</title>
    <style>
    body {
        background-image: url('{{ $settings ? asset("storage/".$settings->background_image) : "" }}');
        background-size: cover;
    }
    </style>
</head>

<body>

    <header>
        <img src="{{ $settings ? asset("storage/".$settings->logo_image) : '' }}" alt="Logo" width="100">
    </header>

    <nav>
        <ul>
            @if($settings && $settings->menu_navigation)
            @foreach($settings->menu_navigation as $menu)
            <li>
                <a href="{{ $menu['link'] }}">
                    <i class="{{ $menu['icon'] }}"></i> {{ $menu['label'] }}
                </a>
            </li>
            @endforeach
            @endif
        </ul>
    </nav>

    @yield('content')

</body>

</html>