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
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            background: #0f172a;
        }

        /* ── Left panel ── */
        .auth-left {
            flex: 1;
            position: relative;
            display: none;
            overflow: hidden;
        }
        @media (min-width: 900px) {
            .auth-left { display: flex; flex-direction: column; }
        }
        .auth-left-bg {
            position: absolute;
            inset: 0;
            background-image: url('{{ asset("image/bg.jfif") }}');
            background-size: cover;
            background-position: center;
        }
        .auth-left-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15,23,42,0.3) 0%, rgba(15,23,42,0.88) 100%);
        }
        .auth-brand {
            position: absolute;
            top: 40px;
            left: 40px;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .auth-brand img { width: 42px; height: 42px; object-fit: contain; }
        .auth-brand-name { font-size: 1.2rem; font-weight: 700; color: white; }
        .auth-left-content {
            position: absolute;
            bottom: 48px;
            left: 40px;
            right: 40px;
            z-index: 5;
            color: white;
        }
        .auth-tagline { font-size: 2.2rem; font-weight: 800; line-height: 1.2; margin-bottom: 12px; }
        .auth-tagline span { color: #f87171; }
        .auth-sub { font-size: 0.95rem; color: rgba(255,255,255,0.7); max-width: 360px; line-height: 1.6; }

        /* ── Right panel ── */
        .auth-right {
            width: 100%;
            max-width: 480px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 40px;
            min-height: 100vh;
        }
        @media (max-width: 899px) {
            .auth-right { max-width: 100%; padding: 40px 24px; }
        }
        .auth-mobile-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 32px;
        }
        .auth-mobile-logo img { width: 36px; height: 36px; object-fit: contain; }
        .auth-mobile-logo span { font-size: 1.05rem; font-weight: 700; color: #0f172a; }
        @media (min-width: 900px) { .auth-mobile-logo { display: none; } }

        /* ── Form shared styles ── */
        .auth-heading { font-size: 1.75rem; font-weight: 800; color: #0f172a; margin-bottom: 6px; }
        .auth-subheading { font-size: 0.9rem; color: #64748b; margin-bottom: 32px; }

        /* Back button */
        .auth-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #64748b;
            text-decoration: none;
            margin-bottom: 28px;
            padding: 7px 14px;
            border-radius: 50px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            transition: all 0.2s ease;
        }
        .auth-back-btn:hover {
            color: #d6272b;
            border-color: #d6272b;
            background: rgba(214,39,43,0.05);
        }
        .auth-back-btn i { font-size: 0.9rem; transition: transform 0.2s; }
        .auth-back-btn:hover i { transform: translateX(-3px); }

        .form-group { margin-bottom: 18px; }
        .form-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .form-input {
            width: 100%;
            height: 48px;
            padding: 0 14px 0 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }
        .form-input:focus {
            border-color: #d6272b;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(214,39,43,0.1);
        }
        .input-wrapper { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            pointer-events: none;
        }
        .input-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        .input-toggle:hover { color: #d6272b; }

        /* No-icon input (for right-only icon) */
        .form-input.no-icon { padding-left: 14px; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media (max-width: 480px) { .form-row { grid-template-columns: 1fr; } }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }
        .form-check input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: #d6272b;
            cursor: pointer;
        }
        .form-check label { font-size: 0.85rem; color: #64748b; cursor: pointer; }
        .form-check a { color: #d6272b; text-decoration: none; font-weight: 500; }
        .form-check a:hover { text-decoration: underline; }

        .btn-auth {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #d6272b, #b91f23);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(214,39,43,0.3);
            letter-spacing: 0.3px;
        }
        .btn-auth:hover {
            background: linear-gradient(135deg, #b91f23, #9e1b1f);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(214,39,43,0.4);
        }
        .btn-auth:active { transform: translateY(0); }

        .auth-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
            color: #94a3b8;
            font-size: 0.82rem;
        }
        .auth-divider::before, .auth-divider::after {
            content: ''; flex: 1; height: 1px; background: #e2e8f0;
        }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.875rem;
            color: #64748b;
        }
        .auth-footer a { color: #d6272b; font-weight: 600; text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }

        .forgot-link {
            display: block;
            text-align: right;
            font-size: 0.82rem;
            color: #d6272b;
            text-decoration: none;
            margin-top: 6px;
            font-weight: 500;
        }
        .forgot-link:hover { text-decoration: underline; }

        .session-status {
            padding: 12px 16px;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            color: #166534;
            font-size: 0.875rem;
            margin-bottom: 20px;
        }
        .field-error {
            font-size: 0.8rem;
            color: #dc2626;
            margin-top: 4px;
        }
    </style>
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
