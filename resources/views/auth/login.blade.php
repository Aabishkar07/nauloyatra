<x-guest-layout>
    <a href="{{ route('home') }}" class="auth-back-btn">
        <i class="bi bi-arrow-left"></i> Back to Home
    </a>
    <h1 class="auth-heading">Welcome back</h1>
    <p class="auth-subheading">Sign in to continue your journey with NauloYatra</p>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <div class="input-wrapper">
                <i class="bi bi-envelope input-icon"></i>
                <input id="email" class="form-input" type="email" name="email"
                       value="{{ old('email') }}" required autofocus autocomplete="username"
                       placeholder="you@example.com">
            </div>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-wrapper">
                <i class="bi bi-lock input-icon"></i>
                <input id="password" class="form-input" type="password" name="password"
                       required autocomplete="current-password" placeholder="••••••••">
                <button type="button" class="input-toggle" onclick="togglePwd('password', this)">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
            @endif
        </div>

        {{-- Remember Me --}}
        <div class="form-check">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Remember me for 30 days</label>
        </div>

        <button type="submit" class="btn-auth">
            <i class="bi bi-box-arrow-in-right" style="margin-right:6px;"></i>
            Sign In
        </button>
    </form>

    <p class="auth-footer">
        Don't have an account? <a href="{{ route('register') }}">Create one free</a>
    </p>

    <script>
        function togglePwd(id, btn) {
            const input = document.getElementById(id);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>
</x-guest-layout>
