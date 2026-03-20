<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelCo Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --brand: #d6272b;
            --brand-dark: #d6272b;
        }

        html,
        body {
            overflow-x: hidden;
            max-width: 100%;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f6fb;
            min-height: 100vh;
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
            color: #2d3748;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 8px;
            position: relative;
            transition: color 0.2s, background 0.2s;
            white-space: nowrap;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-links .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 14px;
            right: 14px;
            height: 2px;
            background: var(--brand);
            border-radius: 2px;
            transform: scaleX(0);
            transition: transform 0.22s ease;
        }

        .nav-links .nav-link:hover {
            color: var(--brand);
        }

        .nav-links .nav-link:hover::after,
        .nav-links .nav-link.active::after {
            transform: scaleX(1);
        }

        .nav-links .nav-link.active {
            color: var(--brand);
            font-weight: 600;
        }

        /* Dropdown */
        .nav-links .dropdown-menu {
            border-radius: 12px;
            border: 0;
            box-shadow: 0 8px 28px rgba(27, 103, 154, 0.13);
            font-size: 0.88rem;
            min-width: 160px;
            animation: fadeUp 0.17s ease;
            padding: 6px;
        }

        .nav-links .dropdown-item {
            border-radius: 8px;
            padding: 8px 14px;
            color: #2d3748;
            transition: background 0.15s;
        }

        .nav-links .dropdown-item:hover {
            background: rgba(27, 103, 154, 0.07);
            color: var(--brand);
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

        .auth-dropdown-menu {
            border-radius: 12px;
            border: 0;
            box-shadow: 0 8px 28px rgba(27, 103, 154, 0.13);
            font-size: 0.88rem;
            min-width: 160px;
            padding: 6px;
            animation: fadeUp 0.17s ease;
        }

        .auth-dropdown-menu .dropdown-item {
            border-radius: 8px;
            padding: 8px 14px;
            color: #2d3748;
            transition: background 0.15s;
        }

        .auth-dropdown-menu .dropdown-item:hover {
            background: rgba(27, 103, 154, 0.07);
            color: var(--brand);
        }

        .auth-dropdown-menu .dropdown-item.text-danger:hover {
            background: rgba(220, 53, 69, 0.06);
            color: #dc3545 !important;
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

        .mob-user-info {
            flex: 1;
        }

        .mob-user-name {
            font-size: 0.92rem;
            font-weight: 600;
            color: #1e3a52;
        }

        .mob-user-sub {
            font-size: 0.78rem;
            color: #94a3b8;
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

        /* Demo page */
        .demo-body {
            padding-top: 130px;
            text-align: center;
        }

        .demo-body h1 {
            font-family: Georgia, serif;
            font-size: 2.4rem;
            color: #d6272b;
        }

        .demo-body p {
            color: #3a5a7c;
            font-size: 1.05rem;
            opacity: 0.8;
        }

        .preview-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            background: #1b679a;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 9px 18px;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(27, 103, 154, 0.35);
        }

        .preview-btn:hover {
            background: #d6272b;
        }
    </style>
</head>

<body>

    <!-- ===== FLOATING NAVBAR ===== -->
    <div class="navbar-wrapper">
        <nav class="main-navbar">

            <!-- Brand -->
            <a class="d-flex align-items-center gap-2 text-decoration-none flex-shrink-0" href="#">
                <img src="{{ asset('image/mainlogo.png') }}" alt="Logo" width="full" height="50" class="brand-logo">
                <!-- <span class="brand-name">TravelCo</span> -->
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
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                            href="#" data-bs-toggle="dropdown">Solutions</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                                    href="{{ route('user.travelPackage.show') }}">Tours</a></li>
                            <li><a class="dropdown-item" href="#">Hotels</a></li>
                            <li><a class="dropdown-item" href="#">Flights</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link {{ request()->routeIs('blog') || request()->routeIs('blog.page') ? 'active' : '' }}"
                            href="{{ route('blog') }}">Blog</a></li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('aboutUs') || request()->routeIs('contactUs') ? 'active' : '' }}"
                            href="#" data-bs-toggle="dropdown">Company</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('aboutUs') ? 'active' : '' }}"
                                    href="{{ route('aboutUs') }}">About Us</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('contactUs') ? 'active' : '' }}"
                                    href="{{ route('contactUs') }}">Contact</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Logged out -->
                <div class="auth-section" id="loggedOut">
                    <a href="{{ route('login') }}" class="btn-login text-decoration-none">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-register text-decoration-none">
                        <i class="bi bi-person-plus"></i> Register
                    </a>
                </div>

                <!-- Logged in -->
                <div class="auth-section d-none" id="loggedIn">
                    <div class="dropdown">
                        <button class="user-btn dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-avatar">J</div>
                            <span>John Doe</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end auth-dropdown-menu mt-2">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i>My
                                    Profile</a></li>
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#"><i
                                        class="bi bi-box-arrow-right me-2"></i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ===== MOBILE PANEL ===== -->
            <div class="mobile-panel d-lg-none" id="mobilePanel">

                <!-- Nav links with accordion dropdowns -->
                <ul class="mob-nav-list">
                    <li>
                        <a class="mob-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">
                            <span><i class="bi bi-house me-2 opacity-50"></i>Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="mob-nav-link {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                            href="{{ route('user.travelPackage.show') }}">
                            <span><i class="bi bi-bag me-2 opacity-50"></i>Packages</span>
                        </a>
                    </li>

                    <!-- Solutions accordion -->
                    <li>
                        <button class="mob-nav-link {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                            onclick="toggleAccordion('solutions')">
                            <span><i class="bi bi-grid me-2 opacity-50"></i>Solutions</span>
                            <i class="bi bi-chevron-down mob-chevron" id="chevron-solutions"></i>
                        </button>
                        <ul class="mob-sub-list" id="acc-solutions">
                            <li><a class="mob-sub-link {{ request()->routeIs('user.travelPackage.show') ? 'active' : '' }}"
                                    href="{{ route('user.travelPackage.show') }}"><i
                                        class="bi bi-map me-2"></i>Tours</a></li>
                            <li><a class="mob-sub-link" href="#"><i class="bi bi-building me-2"></i>Hotels</a></li>
                            <li><a class="mob-sub-link" href="#"><i class="bi bi-airplane me-2"></i>Flights</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="mob-nav-link {{ request()->routeIs('blog') || request()->routeIs('blog.page') ? 'active' : '' }}"
                            href="{{ route('blog') }}">
                            <span><i class="bi bi-journal-text me-2 opacity-50"></i>Blog</span>
                        </a>
                    </li>

                    <!-- Company accordion -->
                    <li>
                        <button
                            class="mob-nav-link {{ request()->routeIs('aboutUs') || request()->routeIs('contactUs') ? 'active' : '' }}"
                            onclick="toggleAccordion('company')">
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

                <!-- Mobile auth: logged out -->
                <div id="mobLoggedOut">
                    <div class="mob-divider"></div>
                    <div class="mob-auth-footer">
                        <a href="{{ route('login') }}" class="btn-login text-decoration-none">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-register text-decoration-none">
                            <i class="bi bi-person-plus"></i> Register
                        </a>
                    </div>
                </div>

                <!-- Mobile auth: logged in -->
                <div id="mobLoggedIn" style="display:none;">
                    <div class="mob-divider"></div>
                    <div class="mob-user-row">
                        <div class="user-avatar" style="width:36px;height:36px;font-size:0.85rem;">J</div>
                        <div class="mob-user-info">
                            <div class="mob-user-name">John Doe</div>
                            <div class="mob-user-sub"><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="711b1e191f311409101c011d145f121e1c">[email&#160;protected]</a></div>
                        </div>
                        <button class="mob-logout-btn" onclick="mobileLogout()">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </div>
                </div>

            </div><!-- /mobile-panel -->

        </nav>
    </div>


    <!-- Controls -->
    <button class="preview-btn" onclick="toggleAuth()">Toggle Login State</button>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let mobileOpen = false;
        let loggedIn = false;

        function toggleMobile() {
            mobileOpen = !mobileOpen;
            document.getElementById('mobilePanel').classList.toggle('open', mobileOpen);
            const icon = document.getElementById('mobToggleIcon');
            icon.className = mobileOpen ? 'bi bi-x-lg fs-5' : 'bi bi-list fs-5';
            icon.style.color = '#1b679a';
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

        function toggleAuth() {
            loggedIn = !loggedIn;
            // Desktop
            document.getElementById('loggedOut').classList.toggle('d-none', loggedIn);
            document.getElementById('loggedIn').classList.toggle('d-none', !loggedIn);
            // Mobile
            document.getElementById('mobLoggedOut').style.display = loggedIn ? 'none' : 'block';
            document.getElementById('mobLoggedIn').style.display = loggedIn ? 'block' : 'none';
        }

        function mobileLogin() {
            toggleAuth();
        }

        function mobileLogout() {
            if (loggedIn) toggleAuth();
        }
    </script>
</body>

</html>
