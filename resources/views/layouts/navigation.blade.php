<style>
    :root {
        --brand: #d6272b;
        --brand-dark: #d6272b;
    }

    /* ---- Floating Navbar Wrapper ---- */
    .navbar-wrapper {
        position: fixed;
        top: 16px;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 40px);
        max-width: 1300px;
        z-index: 1050;
        box-sizing: border-box;
    }

    .main-navbar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06), 0 2px 10px rgba(0, 0, 0, 0.04);
        padding: 12px 28px;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        width: 100%;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    /* Brand */
    .brand-logo {
        border-radius: 6px;
    }

    .brand-name {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--brand);
        letter-spacing: -0.03em;
        font-family: Georgia, serif;
        white-space: nowrap;
    }

    /* Nav UL */
    .nav-links {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        gap: 2px;
        flex: 1;
        justify-content: center;
    }

    .nav-links .nav-link {
        color: #475569;
        font-size: 0.92rem;
        font-weight: 500;
        padding: 8px 18px;
        border-radius: 50px;
        position: relative;
        transition: color 0.25s ease, background 0.25s ease, transform 0.2s ease;
        white-space: nowrap;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        overflow: hidden;
    }

    /* Sliding underline pseudo-element */
    .nav-links .nav-link::after {
        content: '';
        position: absolute;
        bottom: 4px;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--brand);
        border-radius: 2px;
        transform: translateX(-50%);
        transition: width 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .nav-links .nav-link:hover {
        color: var(--brand);
        background: rgba(214, 39, 43, 0.06);
        transform: translateY(-1px);
    }

    .nav-links .nav-link:hover::after {
        width: calc(100% - 36px);
    }

    .nav-links .nav-link.active {
        color: var(--brand);
        background: rgba(214, 39, 43, 0.10);
        font-weight: 600;
    }

    .nav-links .nav-link.active::after {
        width: calc(100% - 36px);
    }

    /* Dropdown */
    .nav-links li.has-dropdown {
        position: relative;
    }

    /* Invisible bridge spanning the gap so hover doesn't break */
    .nav-links li.has-dropdown::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        right: 0;
        height: 12px;
    }

    .nav-links .custom-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        left: 50%;
        transform: translateX(-50%);
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.12), 0 2px 8px rgba(0,0,0,0.06);
        min-width: 180px;
        padding: 6px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s linear 0.15s;
        transform: translateX(-50%) translateY(-6px);
        z-index: 9999;
        border: 1px solid rgba(0,0,0,0.06);
    }

    /* Arrow pointer */
    .nav-links .custom-dropdown::before {
        content: '';
        position: absolute;
        top: -6px;
        left: 50%;
        transform: translateX(-50%);
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #fff;
        filter: drop-shadow(0 -1px 1px rgba(0,0,0,0.06));
    }

    .nav-links li.has-dropdown:hover .custom-dropdown,
    .nav-links li.has-dropdown.open .custom-dropdown {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s linear 0s;
    }

    .nav-links .custom-dropdown-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        border-radius: 8px;
        color: #2d3748;
        font-size: 0.88rem;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        white-space: nowrap;
    }

    .nav-links .custom-dropdown-item:hover,
    .nav-links .custom-dropdown-item.active {
        background: rgba(214,39,43,0.07);
        color: var(--brand);
    }

    .nav-links .custom-dropdown-item i {
        font-size: 0.85rem;
        opacity: 0.7;
    }

    /* Auth buttons */
    .auth-section {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
    }

    .btn-login {
        background: #fff;
        border: 1.5px solid #e2e8f0;
        color: #475569;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 8px 22px;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-login:hover {
        border-color: var(--brand);
        color: white;
        background-color: var(--brand);
        box-shadow: 0 4px 12px rgba(214, 39, 43, 0.08);
    }

    .btn-register {
        background: linear-gradient(135deg, var(--brand), #e53e3e);
        border: none;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 9px 24px;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(214, 39, 43, 0.25);
    }

    .btn-register:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(214, 39, 43, 0.35);
        color: #fff;
    }

    /* User avatar button */
    .user-btn {
        background: rgba(27, 103, 154, 0.08);
        border: 1px solid rgba(27, 103, 154, 0.2);
        border-radius: 10px;
        padding: 6px 14px 6px 8px;
        color: #2d3748;
        font-size: 0.87rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .user-btn:hover {
        background: rgba(27, 103, 154, 0.14);
        border-color: var(--brand);
        color: var(--brand);
    }

    .user-avatar {
        width: 28px;
        height: 28px;
        background: var(--brand);
        color: #fff;
        border-radius: 50%;
        font-size: 0.73rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Auth dropdown */
    .auth-dropdown-wrap {
        position: relative;
    }

    /* Invisible bridge for auth dropdown */
    .auth-dropdown-wrap::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        right: 0;
        height: 12px;
    }

    .auth-custom-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.12), 0 2px 8px rgba(0,0,0,0.06);
        min-width: 180px;
        padding: 6px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s linear 0.15s;
        transform: translateY(-6px);
        z-index: 9999;
        border: 1px solid rgba(0,0,0,0.06);
    }

    .auth-custom-dropdown::before {
        content: '';
        position: absolute;
        top: -6px;
        right: 18px;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #fff;
        filter: drop-shadow(0 -1px 1px rgba(0,0,0,0.06));
    }

    .auth-dropdown-wrap:hover .auth-custom-dropdown,
    .auth-dropdown-wrap.open .auth-custom-dropdown {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateY(0);
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s linear 0s;
    }

    .auth-custom-dropdown .dropdown-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        border-radius: 8px;
        color: #2d3748;
        font-size: 0.88rem;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        cursor: pointer;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
    }

    .auth-custom-dropdown .dropdown-item:hover {
        background: rgba(214,39,43,0.07);
        color: var(--brand);
    }

    .auth-custom-dropdown .dropdown-item.text-danger:hover {
        background: rgba(220,53,69,0.06);
        color: #dc3545 !important;
    }

    .auth-custom-dropdown .dropdown-divider {
        height: 1px;
        background: #f1f5f9;
        margin: 4px 8px;
    }

    /* Mobile toggler */
    .mob-toggler {
        background: rgba(27, 103, 154, 0.08);
        border: 1px solid rgba(27, 103, 154, 0.2);
        border-radius: 8px;
        padding: 6px 10px;
        cursor: pointer;
        margin-left: auto;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mob-toggler:focus {
        box-shadow: 0 0 0 3px rgba(27, 103, 154, 0.18);
        outline: none;
    }

    .mob-toggler:hover {
        background: rgba(27, 103, 154, 0.14);
        border-color: var(--brand);
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== MOBILE PANEL ===== */
    .mobile-panel {
        display: none;
        width: 100%;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 14px;
        box-shadow: 0 8px 28px rgba(27, 103, 154, 0.12);
        margin-top: 10px;
        overflow: hidden;
        animation: fadeUp 0.2s ease;
    }

    .mobile-panel.open {
        display: block;
    }

    /* Mobile nav links */
    .mob-nav-list {
        list-style: none;
        margin: 0;
        padding: 10px;
    }

    .mob-nav-list li {
        width: 100%;
    }

    .mob-nav-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 11px 14px;
        border-radius: 10px;
        color: #2d3748;
        font-size: 0.95rem;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        cursor: pointer;
        background: none;
        border: none;
        text-align: left;
    }

    .mob-nav-link:hover,
    .mob-nav-link.active {
        background: rgba(27, 103, 154, 0.07);
        color: var(--brand);
    }

    .mob-nav-link.active {
        font-weight: 600;
    }

    /* Mobile accordion sub-items */
    .mob-sub-list {
        list-style: none;
        padding: 4px 8px 8px 24px;
        margin: 0;
        display: none;
    }

    .mob-sub-list.open {
        display: block;
    }

    .mob-sub-list .mob-sub-link {
        display: block;
        padding: 9px 12px;
        border-radius: 8px;
        color: #4a6280;
        font-size: 0.88rem;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
    }

    .mob-sub-list .mob-sub-link:hover {
        background: rgba(27, 103, 154, 0.06);
        color: var(--brand);
    }

    /* Chevron rotation */
    .mob-chevron {
        font-size: 0.75rem;
        transition: transform 0.22s ease;
        color: #94a3b8;
    }

    .mob-chevron.rotated {
        transform: rotate(180deg);
        color: var(--brand);
    }

    /* Mobile auth footer */
    .mob-auth-footer {
        padding: 12px;
        border-top: 1px solid rgba(27, 103, 154, 0.1);
        display: flex;
        gap: 8px;
        width: 100%;
        box-sizing: border-box;
    }

    .mob-auth-footer .btn-login,
    .mob-auth-footer .btn-register {
        flex: 1;
        min-width: 0;
        justify-content: center;
        padding: 9px 10px;
        font-size: 0.88rem;
        white-space: nowrap;
        box-sizing: border-box;
    }

    /* Mobile logged-in user row */
    .mob-user-row {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        border-top: 1px solid rgba(27, 103, 154, 0.1);
    }

    .mob-user-name {
        font-size: 0.92rem;
        font-weight: 600;
        color: #1e3a52;
    }

    .mob-logout-btn {
        background: none;
        border: 1.5px solid #fce8ea;
        color: #dc3545;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 0.82rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .mob-logout-btn:hover {
        background: #fce8ea;
    }

    /* Divider inside mobile nav */
    .mob-divider {
        height: 1px;
        background: rgba(27, 103, 154, 0.08);
        margin: 4px 14px;
    }

    /* ===== RESPONSIVE BREAKPOINTS ===== */
    @media (max-width: 991.98px) {
        .navbar-wrapper {
            top: 8px;
            left: 0;
            transform: none;
            width: 100%;
            max-width: 100%;
            padding: 0 10px;
            box-sizing: border-box;
        }

        .main-navbar {
            padding: 10px 12px;
            gap: 8px;
            border-radius: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        .mobile-panel {
            width: 100%;
            box-sizing: border-box;
        }

        .mob-auth-footer {
            padding: 10px 12px;
        }

        .mob-auth-footer .btn-login,
        .mob-auth-footer .btn-register {
            min-width: 0;
            padding: 9px 8px;
            font-size: 0.85rem;
            white-space: nowrap;
        }
    }

    @media (max-width: 480px) {
        .navbar-wrapper {
            padding: 0 8px;
        }

        .main-navbar {
            padding: 8px 10px;
            border-radius: 12px;
        }

        .brand-name {
            font-size: 1.1rem;
        }

        .mob-nav-link {
            font-size: 0.88rem;
            padding: 10px 12px;
        }

        .mob-auth-footer {
            padding: 10px;
            gap: 6px;
        }

        .mob-auth-footer .btn-login,
        .mob-auth-footer .btn-register {
            font-size: 0.82rem;
            padding: 8px 6px;
        }

        .mob-user-row {
            padding: 10px 12px;
            gap: 8px;
        }

        .mob-user-name {
            font-size: 0.85rem;
        }

        .mob-logout-btn {
            font-size: 0.78rem;
            padding: 5px 9px;
        }
    }
</style>

<!-- ===== FLOATING NAVBAR ===== -->
<div class="navbar-wrapper">
    <nav class="main-navbar">

        <!-- Brand -->
        <a class="d-flex align-items-center gap-2 text-decoration-none flex-shrink-0" href="{{ route('home') }}">
            <img src="{{ asset('image/mainlogo.png') }}" alt="Logo" width="full" height="50" class="brand-logo">
        </a>

        <!-- Mobile toggler (hidden on desktop) -->
        <button class="mob-toggler d-lg-none" onclick="toggleMobile()" aria-label="Toggle menu" id="mobToggleBtn">
            <i class="bi bi-list fs-5" style="color:#1b679a;" id="mobToggleIcon"></i>
        </button>

        <!-- Desktop: Nav + Auth inline -->
        <div class="d-none d-lg-flex align-items-center flex-grow-1">
            <ul class="nav-links">
                <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a></li>
                <li><a class="nav-link {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                        href="{{ route('user.travelPackage.show') }}">Packages</a></li>
                <li><a class="nav-link {{ request()->routeIs('blog') || request()->routeIs('blog.page') ? 'active' : '' }}"
                        href="{{ route('blog') }}">Blog</a></li>
                <li class="has-dropdown">
                    <a class="nav-link {{ request()->routeIs('aboutUs') || request()->routeIs('contactUs') ? 'active' : '' }}"
                        href="#" onclick="return false;">Company <i class="bi bi-chevron-down" style="font-size:0.65rem;opacity:0.7;"></i></a>
                    <div class="custom-dropdown">
                        <a href="{{ route('aboutUs') }}" class="custom-dropdown-item {{ request()->routeIs('aboutUs') ? 'active' : '' }}">
                            <i class="bi bi-people"></i> About Us
                        </a>
                        <a href="{{ route('contactUs') }}" class="custom-dropdown-item {{ request()->routeIs('contactUs') ? 'active' : '' }}">
                            <i class="bi bi-envelope"></i> Contact
                        </a>
                    </div>
                </li>
            </ul>

            <!-- Auth Section -->
            <div class="auth-section">
                @auth
                    <div class="auth-dropdown-wrap">
                        <button class="user-btn" type="button">
                            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="bi bi-chevron-down" style="font-size:0.65rem;opacity:0.6;margin-left:2px;"></i>
                        </button>
                        <div class="auth-custom-dropdown">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                <i class="bi bi-person-circle"></i> My Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right"></i> Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="auth-section">
                        <a href="{{ route('login') }}" class="btn-login text-decoration-none">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-register text-decoration-none">
                            <i class="bi bi-person-plus"></i> Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- ===== MOBILE PANEL ===== -->
        <div class="mobile-panel d-lg-none" id="mobilePanel">
            <ul class="mob-nav-list">
                <li><a class="mob-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"><span><i class="bi bi-house me-2 opacity-50"></i>Home</span></a></li>
                <li><a class="mob-nav-link {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                        href="{{ route('user.travelPackage.show') }}"><span><i
                                class="bi bi-bag me-2 opacity-50"></i>Packages</span></a></li>
                <li><a class="mob-nav-link {{ request()->routeIs('blog') ? 'active' : '' }}"
                        href="{{ route('blog') }}"><span><i
                                class="bi bi-journal-text me-2 opacity-50"></i>Blog</span></a></li>
                <li>
                    <button class="mob-nav-link w-100 border-0 bg-transparent" onclick="toggleAccordion('company')">
                        <span><i class="bi bi-info-circle me-2 opacity-50"></i>Company</span>
                        <i class="bi bi-chevron-down mob-chevron" id="chevron-company"></i>
                    </button>
                    <ul class="mob-sub-list" id="acc-company">
                        <li><a class="mob-sub-link {{ request()->routeIs('aboutUs') ? 'active' : '' }}"
                                href="{{ route('aboutUs') }}"><i class="bi bi-people me-2"></i>About Us</a></li>
                        <li><a class="mob-sub-link {{ request()->routeIs('contactUs') ? 'active' : '' }}"
                                href="{{ route('contactUs') }}"><i class="bi bi-envelope me-2"></i>Contact</a></li>
                    </ul>
                </li>
            </ul>

            <div class="mob-divider"></div>
            <div class="mob-auth-footer">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="mob-logout-btn w-100">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="btn-login text-decoration-none flex-grow-1 text-center py-2 border rounded-pill">Login</a>
                    <a href="{{ route('register') }}"
                        class="btn-register text-decoration-none flex-grow-1 text-center py-2 rounded-pill">Register</a>
                @endauth
            </div>
        </div>
    </nav>
</div>

<script>
    let mobileOpen = false;

    function toggleMobile() {
        mobileOpen = !mobileOpen;
        document.getElementById('mobilePanel').classList.toggle('open', mobileOpen);
        const icon = document.getElementById('mobToggleIcon');
        icon.className = mobileOpen ? 'bi bi-x-lg fs-5' : 'bi bi-list fs-5';
    }

    function toggleAccordion(key) {
        const list = document.getElementById('acc-' + key);
        const chevron = document.getElementById('chevron-' + key);
        const isOpen = list.classList.contains('open');

        // Close all
        document.querySelectorAll('.mob-sub-list').forEach(el => el.classList.remove('open'));
        document.querySelectorAll('.mob-chevron').forEach(el => el.classList.remove('rotated'));

        // Toggle clicked
        if (!isOpen) {
            list.classList.add('open');
            chevron.classList.add('rotated');
        }
    }
</script>