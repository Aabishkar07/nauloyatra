<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'NauloYatra') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/user_css/tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/auth.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Left panel -->
    <div class="auth-left">
        <div class="auth-left-bg"></div>
        <a href="{{ url('/') }}" class="auth-brand">
            <img src="{{ asset('image/mainlogo.png') }}" alt="NauloYatra">
            <span class="auth-brand-name">NauloYatra</span>
        </a>
        <div class="auth-left-content">
            <p class="auth-tagline">Explore Nepal<br>with <span>NauloYatra</span></p>
            <p class="auth-sub">Travel freely. Travel smart. Unforgettable journeys crafted just for you.</p>
        </div>
    </div>

    <!-- Right panel -->
    <div class="auth-right">
        <div class="auth-mobile-logo">
            <img src="{{ asset('image/mainlogo.png') }}" alt="NauloYatra">
            <span>NauloYatra</span>
        </div>
        {{ $slot }}
    </div>
</body>
</html>
