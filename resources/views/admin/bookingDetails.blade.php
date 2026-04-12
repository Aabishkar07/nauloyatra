@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h2 class="h3 mb-0 fw-bold text-dark">Booking Management</h2>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-4">
        <!-- All Reservations -->
        <div class="col-12 col-md-4 col-xl-2">
            <div class="stat-card">
                <div class="stat-card-title text-muted mb-1">Total Bookings</div>
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3" style="width:40px;height:40px;font-size:1.2rem;">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="stat-card-value fs-4">{{ $allReservation }}</div>
                </div>
            </div>
        </div>
        <!-- Confirmed -->
        <div class="col-12 col-md-4 col-xl-2">
            <div class="stat-card">
                <div class="stat-card-title text-muted mb-1">Confirmed</div>
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success bg-opacity-10 text-success me-3" style="width:40px;height:40px;font-size:1.2rem;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="stat-card-value fs-4">{{ $conformCountReservation }}</div>
                </div>
            </div>
        </div>
        <!-- Rejected -->
        <div class="col-12 col-md-4 col-xl-3">
            <div class="stat-card">
                <div class="stat-card-title text-muted mb-1">Rejected Reservations</div>
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-danger bg-opacity-10 text-danger me-3" style="width:40px;height:40px;font-size:1.2rem;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div class="stat-card-value fs-4">{{ $rejectedCountReservation }}</div>
                </div>
            </div>
        </div>
        <!-- Pending Payment -->
        <div class="col-12 col-md-6 col-xl-2">
            <div class="stat-card">
                <div class="stat-card-title text-muted mb-1">Pending Payment</div>
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3" style="width:40px;height:40px;font-size:1.2rem;">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="stat-card-value fs-4">{{ $pendingCountPayment }}</div>
                </div>
            </div>
        </div>
        <!-- Payment to check -->
        <!-- <div class="col-12 col-md-6 col-xl-3">
            <div class="stat-card border-warning">
                <div class="stat-card-title text-warning fw-bold mb-1">Needs Action (Payment Paid)</div>
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning text-dark me-3" style="width:40px;height:40px;font-size:1.2rem;">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <div class="stat-card-value fs-4">{{ $conformCountPayment }}</div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Details Table -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div><i class="bi bi-ticket-detailed me-2 text-primary"></i> All Booking Records</div>
        </div>
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table table-modern align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="8%">ID</th>
                            <th width="20%">Tour Name</th>
                            <th width="15%">Travel Date</th>
                            <th width="12%" class="text-center">Duration</th>
                            <th width="10%" class="text-end">Total</th>
                            <th width="12%" class="text-center">Reservation</th>
                            <th width="12%" class="text-center">Payment</th>
                            <th width="11%" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td class="text-muted fw-medium">#{{ $booking->id }}</td>
                            <td>
                                <div class="fw-semibold text-dark text-truncate" style="max-width: 200px;" title="{{ $booking->package->package_name }}">
                                    {{ $booking->package->package_name }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center text-muted">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    {{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge-soft-secondary">
                                    <i class="bi bi-clock me-1"></i> {{ $booking->package->duration }} {{ $booking->package->duration_type }}
                                </span>
                            </td>
                            <td class="text-end fw-bold text-dark">${{ number_format($booking->total_fee, 2) }}</td>
                            
                            <!-- Reservation Status -->
                            <td class="text-center">
                                @if ( $booking->reservation_status  == "pending")
                                    <span class="badge-soft-info"><i class="bi bi-hourglass me-1"></i>Pending</span>
                                @elseif ( $booking->reservation_status  == "Conform")
                                    <span class="badge-soft-success"><i class="bi bi-check me-1"></i>Confirmed</span>
                                @elseif ( $booking->reservation_status  == "Reject")
                                    <span class="badge-soft-danger"><i class="bi bi-x me-1"></i>Rejected</span>
                                @endif
                            </td>

                            <!-- Payment Status -->
                            <td class="text-center">
                                @if ( $booking->payment_status  == "pending")
                                    <span class="badge-soft-warning"><i class="bi bi-clock-history me-1"></i>Pending</span>
                                @elseif ( $booking->payment_status  == "Success")
                                    <span class="badge-soft-success"><i class="bi bi-check-all me-1"></i>Success</span>
                                @elseif ( $booking->payment_status  == "Reject")
                                    <span class="badge-soft-danger"><i class="bi bi-x-circle me-1"></i>Rejected</span>
                                @endif
                            </td>
                            
                            <!-- Actions -->
                            <td class="text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{route('admin.showOneUserBookingDataAll', $booking->id  )}}" class="btn-modern btn-modern-primary btn-sm" title="View Details">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if(count($bookings) === 0)
            <div class="text-center py-5 text-muted">
                <i class="bi bi-inbox fs-1 mb-3 d-block text-secondary"></i>
                <h5>No Bookings Found</h5>
                <p>There are currently no booking records in the system.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection