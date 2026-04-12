@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h2 class="h3 mb-0 fw-bold text-dark">Dashboard Overview</h2>
        <div class="text-muted small">{{ now()->format('l, F j, Y') }}</div>
    </div>

    <!-- Stats Grid: Summary -->
    <div class="row g-4 mb-5">
        <!-- Users -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">Total Users</div>
                        <div class="stat-card-value">3</div>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-top text-sm text-muted d-flex justify-content-between">
                    <span><span class="badge-soft-success">3</span> Active</span>
                    <span><span class="badge-soft-warning">3</span> Inactive</span>
                </div>
            </div>
        </div>

        <!-- Reservations -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">All Reservations</div>
                        <div class="stat-card-value">{{$allReservation}}</div>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-top text-sm text-muted d-flex justify-content-between">
                    <span><span class="badge-soft-success">{{$conformCountReservation}}</span> Confirmed</span>
                    <span><span class="badge-soft-danger">{{$rejectedCountReservation}}</span> Rejected</span>
                </div>
            </div>
        </div>

        <!-- Payments to check -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">Payments to Check</div>
                        <div class="stat-card-value">{{ $conformCountPayment + $pendingCountPayment }}</div>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-top text-sm text-muted">
                    <span>Pending verifications</span>
                </div>
            </div>
        </div>

        <!-- Blog Posts -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ms-3">
                        <div class="stat-card-title">Total Blog Posts</div>
                        <div class="stat-card-value">{{$allBlogPost}}</div>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-top text-sm text-muted">
                    <span>Published articles</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Travel Packages Details -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <i class="bi bi-map me-2 text-primary"></i> Travel Packages Breakdown
            </div>
            <span class="badge bg-primary rounded-pill px-3">{{$allTravelPackage}} Total</span>
        </div>
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table table-modern">
                    <thead>
                        <tr>
                            <th>Package Category</th>
                            <th class="text-end">Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3"><i class="bi bi-compass text-secondary fs-5"></i></div>
                                    <span class="fw-medium">Adventure Tour</span>
                                </div>
                            </td>
                            <td class="text-end fw-bold">{{$AdventureTour}}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3"><i class="bi bi-brightness-high text-warning fs-5"></i></div>
                                    <span class="fw-medium">Beach Holiday Tour</span>
                                </div>
                            </td>
                            <td class="text-end fw-bold">{{$BeachHolidayTour}}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3"><i class="bi bi-bank text-info fs-5"></i></div>
                                    <span class="fw-medium">Cultural Tour</span>
                                </div>
                            </td>
                            <td class="text-end fw-bold">{{$CulturalTour}}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3"><i class="bi bi-briefcase text-primary fs-5"></i></div>
                                    <span class="fw-medium">Business Trip Tour</span>
                                </div>
                            </td>
                            <td class="text-end fw-bold">{{$BusinessTripTour}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection