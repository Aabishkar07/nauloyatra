<x-guest-layout>
    <a href="{{ route('home') }}" class="auth-back-btn">
        <i class="bi bi-arrow-left"></i> Back to Home
    </a>
    <h1 class="auth-heading">Create account</h1>
    <p class="auth-subheading">Join NauloYatra and start exploring Nepal</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <div class="input-wrapper">
                <i class="bi bi-person input-icon"></i>
                <input id="name" class="form-input" type="text" name="name"
                       value="{{ old('name') }}" required autofocus autocomplete="name"
                       placeholder="John Doe">
            </div>
            @error('name')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <div class="input-wrapper">
                <i class="bi bi-envelope input-icon"></i>
                <input id="email" class="form-input" type="email" name="email"
                       value="{{ old('email') }}" required autocomplete="username"
                       placeholder="you@example.com">
            </div>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Country & Phone (side by side) --}}
        <div class="form-row">
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label" for="user_country">Country</label>
                <div class="input-wrapper">
                    <i class="bi bi-globe input-icon"></i>
                    <input id="user_country" class="form-input" type="text" name="user_country"
                           value="{{ old('user_country') }}" required placeholder="Nepal">
                </div>
                @error('user_country')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label" for="phone_number">Phone</label>
                <div class="input-wrapper">
                    <i class="bi bi-telephone input-icon"></i>
                    <input id="phone_number" class="form-input" type="text" name="phone_number"
                           value="{{ old('phone_number') }}" required placeholder="+977 98XXXXXXXX">
                </div>
                @error('phone_number')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div style="margin-top:18px;"></div>

        {{-- Password --}}
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-wrapper">
                <i class="bi bi-lock input-icon"></i>
                <input id="password" class="form-input" type="password" name="password"
                       required autocomplete="new-password" placeholder="Min. 8 characters">
                <button type="button" class="input-toggle" onclick="togglePwd('password', this)">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <div class="input-wrapper">
                <i class="bi bi-lock-fill input-icon"></i>
                <input id="password_confirmation" class="form-input" type="password"
                       name="password_confirmation" required autocomplete="new-password"
                       placeholder="Repeat your password">
                <button type="button" class="input-toggle" onclick="togglePwd('password_confirmation', this)">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password_confirmation')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Terms --}}
        <div class="form-check" style="margin-bottom:20px;">
            <input id="terms" type="checkbox" required>
            <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
        </div>

        <button type="submit" class="btn-auth">
            <i class="bi bi-person-plus" style="margin-right:6px;"></i>
            Create Account
        </button>
    </form>

    <p class="auth-footer">
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
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
