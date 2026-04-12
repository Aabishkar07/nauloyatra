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
                        href="#" onclick="return false;">Company <i class="bi bi-chevron-down"
                            style="font-size:0.65rem;opacity:0.7;"></i></a>
                    <div class="custom-dropdown">
                        <a href="{{ route('aboutUs') }}"
                            class="custom-dropdown-item {{ request()->routeIs('aboutUs') ? 'active' : '' }}">
                            <i class="bi bi-people"></i> About Us
                        </a>
                        <a href="{{ route('contactUs') }}"
                            class="custom-dropdown-item {{ request()->routeIs('contactUs') ? 'active' : '' }}">
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
                        href="{{ route('home') }}"><span><i class="bi bi-house me-2 opacity-50"></i>Home</span></a>
                </li>
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
                        class="btn-login text-decoration-none flex-grow-1 text-center py-2 rounded-pill">Login</a>
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
