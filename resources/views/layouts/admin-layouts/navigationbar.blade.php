<nav id="modernSidebar">
    <a href="{{route('admin.home')}}" class="sidebar-brand">
        <img src="{{ asset('image/mainlogo.png') }}" alt="Agency logo" width="36" height="36">
        <span>NauloYatra</span>
    </a>

    <div class="sidebar-nav flex-grow-1">
        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{route('admin.home')}}">
            <i class="bi bi-grid-1x2"></i>
            Dashboard
        </a>
        
        <div class="sidebar-divider"></div>

        <a class="nav-link {{ request()->is('admin/manageUsers') ? 'active' : '' }}" href="{{route('admin.manageUsers')}}">
            <i class="bi bi-people"></i>
            Manage Users
        </a>
        <a class="nav-link {{ request()->is('admin/Booking*') ? 'active' : '' }}" href="{{route('admin.booking')}}">
            <i class="bi bi-calendar-check"></i>
            Bookings
        </a>
        <a class="nav-link {{ request()->is('admin/massage*') ? 'active' : '' }}" href="{{route('admin.massage')}}">
            <i class="bi bi-envelope"></i>
            Messages
        </a>
        <a class="nav-link {{ request()->is('admin/review*') ? 'active' : '' }}" href="{{route('admin.review')}}">
            <i class="bi bi-star"></i>
            Reviews
        </a>

        <div class="sidebar-divider"></div>
        
        <a class="nav-link {{ request()->is('admin/showPackage*') || request()->is('admin/addPackage*') || request()->is('package/page*') ? 'active' : '' }}" href="{{route('admin.travelPackage.show')}}">
            <i class="bi bi-map"></i>
            Travel Packages
        </a>
        <a class="nav-link {{ request()->is('admin/addBlog*') || request()->is('admin/*/editBlog') ? 'active' : '' }}" href="{{route('admin.addBlog')}}">
            <i class="bi bi-journal-text"></i>
            Blog Posts
        </a>
        
        <div class="sidebar-divider"></div>

        <a class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}" href="{{route('admin.setting')}}">
            <i class="bi bi-gear"></i>
            Settings
        </a>
    </div>

    <div class="sidebar-footer mt-auto p-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start text-danger" style="margin: 0; padding: 10px 16px;">
                <i class="bi bi-box-arrow-right text-danger"></i>
                Log Out
            </button>
        </form>
    </div>
</nav>
