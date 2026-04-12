<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | NauloYatra</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Existing CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_css/dashboard.css') }}">
    <!-- Custom Modern Admin CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_css/modern-admin.css') }}">
    
</head>
<body class="admin-body">

    <div class="d-flex position-relative">
        <!-- Sidebar -->
        @include('layouts.admin-layouts.navigationbar')

        <!-- Main Content -->
        <main class="admin-main-wrapper flex-grow-1">
            <!-- Top Navbar (Mobile toggle) -->
            <div class="d-flex justify-content-between align-items-center mb-4 d-md-none">
                <h2 class="h5 mb-0 fw-bold">Admin Panel</h2>
                <button class="mobile-nav-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            
            @yield('admincontent')
        </main>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editors = ['#tourPlaneDescription', '#includeThings', '#Excludes_things'];
            editors.forEach(id => {
                if(document.querySelector(id)) {
                    ClassicEditor.create(document.querySelector(id)).catch(error => console.error(error));
                }
            });

            if(document.querySelector('#blogDescription')) {
                ClassicEditor.create(document.querySelector('#blogDescription'), {
                    ckfinder: {
                        uploadUrl: "{{route('admin.add.blog',['_token'=>csrf_token()])}}",
                    }
                }).catch(error => console.error(error));
            }

            // Mobile sidebar toggle
            const toggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('modernSidebar');
            if(toggle && sidebar) {
                toggle.addEventListener('click', () => {
                    sidebar.classList.toggle('show');
                });
            }
        });
    </script>
</body>
</html>

