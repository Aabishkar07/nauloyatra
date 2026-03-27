@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
    <div class="container-fluid mb-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <a href="{{route('admin.booking')}}" class="btn-modern btn-modern-secondary text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <h2 class="h4 mb-0 fw-bold text-dark d-flex align-items-center">
                    @foreach ($bookings as $booking)
                        <span class="text-primary me-2">{{ $booking->user->name }}'s</span> Booking Details
                    @endforeach
                </h2>
            </div>
        </div>

        <!-- Alerts -->
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

        <div class="row g-4">
            <!-- Left Column: Details -->
            <div class="col-12 col-xl-7">
                <!-- Navigation Pills -->
                <ul class="nav nav-pills mb-4" id="bookingDetailsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill fw-medium px-4" id="pack-tab" data-bs-toggle="pill"
                            data-bs-target="#pack-content" type="button" role="tab">Package Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-medium px-4 mx-2" id="book-tab" data-bs-toggle="pill"
                            data-bs-target="#book-content" type="button" role="tab">Booking Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill fw-medium px-4" id="contact-tab" data-bs-toggle="pill"
                            data-bs-target="#contact-content" type="button" role="tab">Contact Info</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">

                    <!-- Package Info Tab -->
                    <div class="tab-pane fade show active" id="pack-content" role="tabpanel" tabindex="0">
                        <div class="admin-card">
                            <div class="admin-card-header">
                                <div><i class="bi bi-box-seam me-2 text-primary"></i> Travel Package Information</div>
                            </div>
                            <div class="admin-card-body p-4">
                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="text-muted small mb-1">Package ID</div>
                                        <div class="fw-semibold">#{{ $booking->package->id }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-muted small mb-1">Package Name</div>
                                        <div class="fw-semibold text-primary">{{ $booking->package->package_name }}</div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="text-muted small mb-1">Tour Type</div>
                                        <div class="fw-semibold"><span
                                                class="badge-soft-secondary">{{ $booking->package->tour_type }}</span></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-muted small mb-1">Duration</div>
                                        <div class="fw-semibold">{{ $booking->package->duration }} Days</div>
                                    </div>
                                </div>

                                <hr class="text-muted border-dashed my-4">

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-card-text me-2 text-primary"></i>
                                        Overview</h6>
                                    <div class="bg-light rounded p-3 text-secondary text-sm">
                                        {{ $booking->package->overview }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-check2-square me-2 text-success"></i>
                                        Included</h6>
                                    <div class="bg-light rounded p-3 text-secondary text-sm format-list">
                                        {!! $booking->package->included_things !!}
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-map me-2 text-info"></i> Tour Plan
                                    </h6>
                                    <div class="bg-light rounded p-3 text-secondary text-sm">
                                        {!! $booking->package->tour_plane_description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Info Tab -->
                    <div class="tab-pane fade" id="book-content" role="tabpanel" tabindex="0">
                        <div class="admin-card">
                            <div class="admin-card-header">
                                <div><i class="bi bi-journal-check me-2 text-primary"></i> Booking Details</div>
                            </div>
                            <div class="admin-card-body p-4">
                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="text-muted small mb-1">Booking Date</div>
                                        <div class="fw-semibold"><i class="bi bi-calendar-event opacity-50 me-1"></i>
                                            {{ \carbon\carbon::parse($booking->created_at)->format('d M, Y') }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-muted small mb-1">Travel Start Date</div>
                                        <div class="fw-bold text-primary"><i class="bi bi-send opacity-50 me-1"></i>
                                            {{ \carbon\carbon::parse($booking->date)->format('d M, Y') }}</div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="text-muted small mb-1">Adults</div>
                                        <div class="fw-semibold">{{ $booking->number_of_adult }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-muted small mb-1">Children</div>
                                        <div class="fw-semibold">{{ $booking->number_of_child }}</div>
                                    </div>
                                </div>

                                <hr class="text-muted border-dashed my-4">

                                <div class="mb-3">
                                    <div class="text-muted small mb-2">Pick Up Location</div>
                                    <div
                                        class="d-flex align-items-center bg-primary bg-opacity-10 text-primary-emphasis rounded p-3 fw-medium">
                                        <i class="bi bi-geo-alt-fill me-3 fs-5"></i>
                                        {{ $booking->pick_up_location }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="text-muted small mb-2">Additional Location Details</div>
                                    <div class="bg-light rounded p-3 text-secondary">
                                        {{ $booking->pick_up_location_details ?: 'No additional details provided.' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info Tab -->
                    <div class="tab-pane fade" id="contact-content" role="tabpanel" tabindex="0">
                        <div class="admin-card">
                            <div class="admin-card-header">
                                <div><i class="bi bi-person-lines-fill me-2 text-primary"></i> Contact Information</div>
                            </div>
                            <div class="admin-card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 60px; height: 60px; font-size: 1.5rem;">
                                        {{ substr($booking->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h5 class="mb-1 text-dark fw-bold">{{ $booking->user->name }}</h5>
                                        <div class="text-muted"><i class="bi bi-geo-alt me-1"></i>
                                            {{ $booking->user->user_country }}</div>
                                    </div>
                                </div>

                                <div class="list-group list-group-flush border-top border-bottom">
                                    <div class="list-group-item px-0 py-3 border-0 border-bottom border-light">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="bg-light rounded p-2 text-primary"><i
                                                        class="bi bi-envelope"></i></div>
                                            </div>
                                            <div class="col">
                                                <div class="text-muted small">Email Address</div>
                                                <div class="fw-medium">{{ $booking->user->email }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item px-0 py-3 border-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="bg-light rounded p-2 text-primary"><i
                                                        class="bi bi-telephone"></i></div>
                                            </div>
                                            <div class="col">
                                                <div class="text-muted small">Phone Number</div>
                                                <div class="fw-medium">{{ $booking->user->phone_number }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Center -->
                <div class="admin-card mt-4 border-primary">
                    <div class="admin-card-header bg-primary bg-opacity-10 text-primary border-bottom-0 pb-0">
                        <div><i class="bi bi-lightning-charge-fill me-2"></i> Action Center</div>
                    </div>
                    <div class="admin-card-body">
                        <!-- Invoice Status -->
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 me-3 text-secondary"><i class="bi bi-receipt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Invoice Summary</h6>
                                    <span class="text-muted small">Generation Status</span>
                                </div>
                            </div>
                            <div><span class="badge-soft-success px-3 py-2"><i class="bi bi-check2"></i> Sent</span></div>
                        </div>

                        <!-- Payment Status & Action -->
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 me-3 text-secondary"><i
                                        class="bi bi-credit-card"></i></div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Payment Status</h6>
                                    <div class="mt-1">
                                        @if ($booking->payment_status == "pending")
                                            <span class="badge-soft-warning"><i class="bi bi-hourglass"></i> Pending</span>
                                        @elseif ($booking->payment_status == "Success")
                                            <span class="badge-soft-success"><i class="bi bi-check-all"></i> Success</span>
                                        @elseif ($booking->payment_status == "Reject")
                                            <span class="badge-soft-danger"><i class="bi bi-x"></i> Rejected</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn-modern btn-modern-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i class="bi bi-search me-1"></i> Verify Payment
                                </button>
                            </div>
                        </div>

                        <!-- Booking Status -->
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 me-3 text-secondary"><i
                                        class="bi bi-calendar2-check"></i></div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Reservation Status</h6>
                                    <div class="mt-1">
                                        @if ($booking->reservation_status == "pending")
                                            <span class="badge-soft-info"><i class="bi bi-hourglass"></i> Pending</span>
                                        @elseif ($booking->reservation_status == "Conform")
                                            <span class="badge-soft-success"><i class="bi bi-check-all"></i> Confirmed</span>
                                        @elseif ($booking->reservation_status == "Reject")
                                            <span class="badge-soft-danger"><i class="bi bi-x"></i> Rejected</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($booking->payment_status == "Reject")
                            <div
                                class="d-flex justify-content-between align-items-center p-3 border border-danger bg-danger bg-opacity-10 rounded">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white text-danger rounded-circle p-2 me-3"><i
                                            class="bi bi-envelope-exclamation-fill"></i></div>
                                    <div>
                                        <h6 class="mb-0 fw-bold text-danger">Payment Rejected</h6>
                                        <span class="text-danger small opacity-75">Notify customer to resubmit</span>
                                    </div>
                                </div>
                                <div>
                                    <a href="mailto:{{$booking->user->email}}" class="btn-modern btn-modern-danger">
                                        <i class="bi bi-send-fill me-1"></i> Send Email
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column: Modern Invoice/Summary -->
            <div class="col-12 col-xl-5">
                <div class="admin-card border-0 shadow-lg position-sticky" style="top: 20px;">
                    <div class="admin-card-body p-0">
                        <!-- Invoice Header -->
                        <div class="bg-dark text-white p-4 rounded-top position-relative overflow-hidden">
                            <div class="position-absolute opacity-10" style="right: -30px; top: -30px;">
                                <i class="bi bi-file-earmark-text-fill" style="font-size: 150px;"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4 position-relative z-1">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white p-2 rounded me-3 shadow-sm">
                                        <img src="{{ asset('image/logo.png') }}" height="40" alt="Logo">
                                    </div>
                                    <h4 class="mb-0 fw-bold text-white">NauloYatra</h4>
                                </div>
                                <div class="text-end">
                                    <div class="badge bg-white text-dark mb-1">INVOICE</div>
                                    <div class="fw-bold fs-5 text-white">#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-white-50 small pe-5 position-relative z-1">
                                <i class="bi bi-geo-alt me-1"></i> No: 13, Kurunegala Road, 63000, Sri Lanka, Puttalam.
                            </div>
                        </div>

                        <!-- Invoice Body -->
                        <div class="p-4 bg-white">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="text-muted small text-uppercase fw-bold mb-1">Billed To</div>
                                    <div class="fw-bold text-dark">{{ $booking->user->name }}</div>
                                </div>
                                <div class="col-6 text-end">
                                    <div class="text-muted small text-uppercase fw-bold mb-1">Date</div>
                                    <div class="fw-bold text-dark">
                                        {{ \carbon\carbon::parse($booking->created_at)->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket Details -->
                            <div class="bg-light rounded p-3 mb-4">
                                <div class="fw-bold text-dark mb-2 text-uppercase small">Travel Plan</div>
                                <h5 class="fw-bold text-primary mb-1">{{ $booking->package->package_name }}</h5>
                                <div class="text-muted small mb-3">
                                    <span class="me-3"><i class="bi bi-bookmark"></i>
                                        {{ $booking->package->tour_type }}</span>
                                    <span><i class="bi bi-clock"></i> {{ $booking->package->duration }} Days</span>
                                </div>
                                <div class="d-flex mb-1">
                                    <div class="text-muted small fw-medium" style="width: 100px;">Travel Date:</div>
                                    <div class="small fw-semibold text-dark">
                                        {{ \carbon\carbon::parse($booking->date)->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Cost Breakdown -->
                            <div class="table-responsive mb-4">
                                <table class="table table-borderless table-sm mb-0">
                                    <thead>
                                        <tr class="border-bottom">
                                            <th class="text-muted small text-uppercase pb-2">Description</th>
                                            <th class="text-muted small text-uppercase pb-2 text-center">Qty</th>
                                            <th class="text-muted small text-uppercase pb-2 text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pt-3">
                                                <div class="fw-semibold text-dark">Adult Fee</div>
                                                <div class="small text-muted">${{ $booking->package->per_adult_fee }} each
                                                </div>
                                            </td>
                                            <td class="pt-3 text-center align-middle">{{ $booking->number_of_adult }}</td>
                                            <td class="pt-3 text-end align-middle fw-semibold">
                                                ${{ number_format($booking->number_of_adult * $booking->package->per_adult_fee, 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-2">
                                                <div class="fw-semibold text-dark">Child Fee</div>
                                                <div class="small text-muted">${{ $booking->package->per_child_fee }} each
                                                </div>
                                            </td>
                                            <td class="pt-2 text-center align-middle">{{ $booking->number_of_child }}</td>
                                            <td class="pt-2 text-end align-middle fw-semibold">
                                                ${{ number_format($booking->number_of_child * $booking->package->per_child_fee, 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-2 pb-3 border-bottom">
                                                <div class="fw-semibold text-dark">Base Package</div>
                                            </td>
                                            <td class="pt-2 pb-3 border-bottom text-center align-middle">1</td>
                                            <td class="pt-2 pb-3 border-bottom text-end align-middle fw-semibold">
                                                ${{ number_format($booking->package->price_start_from, 2) }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="text-end pt-3 text-muted fw-bold">Grand Total</td>
                                            <td class="text-end pt-3 fs-3 fw-bold text-dark">
                                                ${{ number_format($booking->total_fee, 2) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Print Action -->
                            <div class="text-center mt-2 d-grid">
                                <button onclick="window.print()"
                                    class="btn-modern btn-modern-secondary text-primary border-primary border bg-transparent">
                                    <i class="bi bi-printer me-2"></i> Print Invoice
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for checking payment receipt-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-bottom bg-light">
                    <h1 class="modal-title fs-5 fw-bold text-dark" id="staticBackdropLabel">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> Payment Verification
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center bg-body-tertiary">
                    @if($booking->payment_receipt)
                        <div class="bg-white p-2 rounded shadow-sm d-inline-block">
                            <img src="{{ asset('image/uploads/payment-recipt/' . $booking->payment_receipt) }}"
                                alt="Payment Receipt" class="img-fluid rounded" style="max-height: 500px;">
                        </div>
                    @else
                        <div class="py-5 text-muted">
                            <i class="bi bi-image fs-1 mb-3 d-block"></i>
                            No receipt image uploaded by the user.
                        </div>
                    @endif
                </div>
                <div
                    class="modal-footer border-top bg-light flex-wrap justify-content-center justify-content-sm-end gap-2 p-3">
                    <button type="button" class="btn-modern btn-modern-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{route('admin.payment.receipt.image.Reject', $booking->id)}}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="btn-modern btn-modern-danger">
                            <i class="bi bi-x-circle me-1"></i> Reject Payment
                        </button>
                    </form>
                    <form action="{{route('admin.payment.receipt.image.Acccept', $booking->id)}}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="btn-modern btn-modern-success">
                            <i class="bi bi-check-circle me-1"></i> Approve & Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Scoped styles specific to the booking details page */
        @media print {
            body * {
                visibility: hidden;
            }

            .col-xl-5,
            .col-xl-5 * {
                visibility: visible;
            }

            .col-xl-5 {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .admin-card {
                box-shadow: none !important;
            }
        }

        .format-list ul {
            padding-left: 1.2rem;
            margin-bottom: 0;
        }

        .format-list li {
            margin-bottom: 0.25rem;
        }

        .border-dashed {
            border-style: dashed !important;
        }
    </style>
@endsection