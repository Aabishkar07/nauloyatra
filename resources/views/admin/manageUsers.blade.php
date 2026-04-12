@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h2 class="h3 mb-0 fw-bold text-dark">Manage Users</h2>
    </div>

    <!-- Status Messages -->
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm border-0 mb-4">
            <ul class="mb-0 fw-medium">
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-octagon me-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Quick Stats -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-md-4">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">All Registered Users</div>
                        <div class="stat-card-value">{{ $allRegisterUsers }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">Users with Reservation</div>
                        <div class="stat-card-value">{{ $allReservation }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-secondary bg-opacity-10 text-secondary">
                        <i class="bi bi-person-x-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">No Reservations</div>
                        <div class="stat-card-value">{{ $allRegisterUsers - $allReservation }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Table App -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div><i class="bi bi-person-lines-fill me-2 text-primary"></i> User Directory</div>
        </div>
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table table-modern align-middle">
                    <thead>
                        <tr>
                            <th width="8%">ID</th>
                            <th width="25%">User Name</th>
                            <th width="15%">Country</th>
                            <th width="12%" class="text-center">Reservations</th>
                            <th width="15%" class="text-center">Joined</th>
                            <th width="25%" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($User as $UserDetails)
                        <tr>
                            <td class="text-muted fw-medium">#{{ $UserDetails->id }}</td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $UserDetails->name }}</div>
                                <div class="text-muted small">{{ $UserDetails->email }}</div>
                            </td>
                            <td>
                                @if($UserDetails->user_country)
                                    <span class="badge-soft-secondary"><i class="bi bi-geo-alt me-1"></i> {{ $UserDetails->user_country }}</span>
                                @else
                                    <span class="text-muted small">Not specified</span>
                                @endif
                            </td>
                            <td class="text-center"> 
                                @if ($UserDetails->bookings->count() == 0)
                                    <span class="text-muted fw-medium">-</span>
                                @else
                                    <span class="badge-soft-success">{{ $UserDetails->bookings->count() }} </span>
                                @endif
                            </td>
                            <td class="text-center text-muted">
                                {{ \Carbon\Carbon::parse($UserDetails->created_at)->format('M d, Y') }}
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="mailto:{{ $UserDetails->email }}" class="btn-modern btn-modern-primary btn-sm">
                                        <i class="bi bi-envelope"></i> Contact
                                    </a>
                                    <a href="#" onclick="deleteUser({{ $UserDetails->id}});" class="btn-modern btn-modern-danger btn-sm">
                                        <i class="bi bi-trash3"></i> Remove
                                    </a>
                                </div>
                                <form id="delete-user-{{ $UserDetails->id }}" action="{{route('admin.user.destroyBlog', $UserDetails->id)}}" method="post" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- script for delete user confirmation alert -->
<script>
    function deleteUser(id){
        if(confirm("Do you want to Remove This User Account? This action cannot be undone.")){
            document.getElementById('delete-user-' + id).submit();
        }
    }
</script>
@endsection