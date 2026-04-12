{{-- NauloYatra — Main Layout --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="NauloYatra Tours & Travels — Discover Nepal with curated trekking, cultural tours and custom itineraries.">
    <title>{{ config('app.name', 'NauloYatra') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- ① Design Tokens (must load first) --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/tokens.css') }}">

    {{-- ② Global Component Library --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/modern-user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/nav.css') }}?v={{ time() }}">

    {{-- ③ Page-specific CSS (each page injects via @section('styles')) --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/contactUs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/package.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/profile.css') }}">

    {{-- ④ Extra styles injected by individual pages --}}
    @stack('styles')
    @yield('styles')
</head>

<body>

    {{-- Navigation --}}
    @include('layouts.navigation')

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Scripts --}}
    {{-- Popper must come before Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <script src="{{ asset('js/webShare.js') }}" defer></script>
    <script src="{{ asset('js/profile.js') }}" defer></script>

    @stack('scripts')
    @yield('scripts')

</body>

</html>