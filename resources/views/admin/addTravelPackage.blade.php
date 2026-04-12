@extends('layouts/admin-layouts/main-structure')

@section('admincontent')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h2 class="h3 mb-0 fw-bold text-dark">Travel Packages</h2>
            <p class="text-muted small mb-0 mt-1">Create and manage all travel packages</p>
        </div>
        <a href="{{ route('admin.addPackage.create') }}" class="btn btn-modern btn-modern-primary">
            <i class="bi bi-plus-lg"></i> Create Package
        </a>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-exclamation-triangle-fill fs-5 mt-1"></i>
                <div>
                    <strong class="d-block mb-1">Please fix the following errors:</strong>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Travel Packages Table --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-map text-primary"></i>
                <span>All Packages</span>
            </div>
            <span class="badge bg-primary rounded-pill px-3">{{ $travelPackage->count() }} Total</span>
        </div>

        @if ($travelPackage->isNotEmpty())
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th style="width: 80px;">Image</th>
                                <th>Package Name</th>
                                <th>Tour Type</th>
                                <th>Price From</th>
                                <th>Created</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($travelPackage as $index => $package)
                                <tr>
                                    <td class="text-muted fw-medium">{{ $index + 1 }}</td>
                                    <td>
                                        @if($package->image_1 != "")
                                            <img src="{{ asset('image/uploads/travelPackage/'.$package->image_1) }}"
                                                 alt="Package Image"
                                                 class="rounded-2"
                                                 style="width: 52px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="rounded-2 bg-light d-flex align-items-center justify-content-center" style="width: 52px; height: 40px;">
                                                <i class="bi bi-image text-muted small"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-medium text-dark">{{ $package->package_name }}</span>
                                    </td>
                                    <td>
                                        <span class="badge-soft-primary">
                                            <i class="bi bi-geo-alt me-1"></i>{{ $package->tour_type }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark">${{ number_format($package->price_start_from) }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ \Carbon\Carbon::parse($package->created_at)->format('M d, Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-end">
                                            <a href="{{ route('admin.editTravelPackage', $package->id) }}"
                                               class="btn btn-modern btn-modern-primary btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <a href="{{ route('user.packagePage', $package->id) }}"
                                               class="btn btn-sm btn-outline-secondary rounded-2"
                                               target="_blank" title="View">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                            <button onclick="deleteTravelPackage({{ $package->id }});"
                                                    class="btn btn-sm btn-outline-danger rounded-2" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <form id="delete-travelPackage-from-{{ $package->id }}"
                                                  action="{{ route('admin.deleteTravelPackage', $package->id) }}"
                                                  method="post" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="admin-card-body text-center py-5">
                <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3" style="width: 72px; height: 72px;">
                    <i class="bi bi-luggage text-secondary" style="font-size: 2rem;"></i>
                </div>
                <h5 class="fw-semibold text-dark mb-1">No Travel Packages Yet</h5>
                <p class="text-muted small mb-0">Click "Create Package" to add your first travel package.</p>
            </div>
        @endif
    </div>

</div>

<script>
function deleteTravelPackage(id) {
    if (confirm("Are you sure you want to delete this travel package? This action cannot be undone.")) {
        document.getElementById('delete-travelPackage-from-' + id).submit();
    }
}
</script>
@endsection