{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/package.css') }}">
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="package-breadcrumb">
        <div class="container">
            <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.travelPackage.show') }}">All Packages</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $travelPackage->package_name }}</li>
                    </ol>
                </nav> -->
        </div>
    </div>

    <!-- Package Hero -->
    <section class="package-hero py-5" style="background: var(--user-gray-soft);">
        <div class="container">
            <div class="hero-layout">
                <!-- Main Content -->
                <div class="hero-main">
                    <div class="package-header mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="user-badge">{{ $travelPackage->tour_type }}</span>
                            <span class="text-muted"><i class="bi bi-clock me-1"></i> {{ $travelPackage->duration }}
                                Days</span>
                            <span class="text-muted"><i class="bi bi-geo-alt me-1"></i> Nepal</span>
                        </div>
                        <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -0.03em; color: var(--user-dark);">
                            {{ $travelPackage->package_name }}
                        </h1>
                        <p class="lead text-muted">{{ $travelPackage->package_name }} - An unforgettable journey awaits.</p>

                        <div class="package-actions d-flex gap-3 mt-4">
                            <button type="button" class="btn-premium btn-whatsapp rounded-pill px-4"
                                style="background: #25d366; color: white; border: none;">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp Us
                            </button>
                            <button type="button" class="btn-premium btn-share rounded-pill px-4" data-bs-toggle="modal"
                                data-bs-target="#shareModal"
                                style="background: white; border: 1px solid var(--user-border);">
                                <i class="bi bi-share"></i>
                                Share
                            </button>
                        </div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="package-gallery">
                        <div class="gallery-main">
                            @if ($travelPackage->image_1 != "")
                                <img src="{{ asset('image/uploads/travelPackage/' . $travelPackage->image_1) }}" alt="Main image">
                            @else
                                <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="Main image">
                            @endif
                        </div>
                        <div class="gallery-thumbs">
                            <div class="gallery-thumb">
                                @if ($travelPackage->image_2 != "")
                                    <img src="{{ asset('image/uploads/travelPackage/' . $travelPackage->image_2) }}"
                                        alt="Gallery 2">
                                @else
                                    <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="Gallery 2">
                                @endif
                            </div>
                            <div class="gallery-thumb">
                                @if ($travelPackage->image_3 != "")
                                    <img src="{{ asset('image/uploads/travelPackage/' . $travelPackage->image_3) }}"
                                        alt="Gallery 3">
                                @else
                                    <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="Gallery 3">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Quick Info -->
                    <div class="quick-info">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Duration</span>
                                <span class="info-value">{{ $travelPackage->duration }} Days</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-tag"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Tour Type</span>
                                <span class="info-value">{{ $travelPackage->tour_type }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="info-content">
                                <span class="info-label">Starting Price</span>
                                <span class="info-value">${{ $travelPackage->price_start_from }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="modern-card p-4 categories shadow-sm mt-4">
                        <h3 class="h5 fw-bold mb-3">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="#"
                                    class="text-decoration-none text-muted d-flex justify-content-between">Travel Stories
                                    <span>(12)</span></a></li>
                            <li class="mb-2"><a href="#"
                                    class="text-decoration-none text-muted d-flex justify-content-between">Heritage
                                    <span>(8)</span></a></li>
                            <li class="mb-2"><a href="#"
                                    class="text-decoration-none text-muted d-flex justify-content-between">Adventure
                                    <span>(15)</span></a></li>
                        </ul>
                    </div>

                    <!-- Content Sections -->
                    <div class="package-content">
                        <!-- Overview -->
                        <div class="content-section">
                            <h3 class="section-title">Overview</h3>
                            <div class="section-content">
                                <p>{{ $travelPackage->overview }}</p>
                            </div>
                        </div>

                        <!-- What's Included -->
                        <div class="content-section">
                            <h3 class="section-title">What's Included</h3>
                            <div class="section-content included-content">
                                {!! $travelPackage->included_things !!}
                            </div>
                        </div>

                        <!-- Tour Plan -->
                        <div class="content-section">
                            <h3 class="section-title">Tour Plan</h3>
                            <div class="section-content tour-plan-content">
                                {!! $travelPackage->tour_plane_description !!}
                            </div>

                            <!-- WhatsApp CTA -->
                            <div class="whatsapp-cta">
                                <div class="cta-content">
                                    <h4>Personalize Your Tour</h4>
                                    <p>Connect with our team on WhatsApp for custom itineraries</p>
                                </div>
                                <div class="cta-icon">
                                    <i class="bi bi-whatsapp"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Sidebar -->
                <aside class="booking-sidebar">
                    <div class="glass-sidebar" style="position: sticky; top: 120px;">
                        <div class="booking-header mb-4">
                            <h3 class="fw-bold">Book Your Trip</h3>
                            <p class="text-muted small">No immediate payment • Expert guidance</p>
                        </div>

                        <div class="booking-body">
                            @auth
                                <form action="{{ route('user.booking.store') }}" method="post" class="booking-form">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $travelPackage->id }}">

                                    <!-- Travel Dates -->
                                    <div class="form-group">
                                        <label class="form-label">Arrival Date *</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>

                                    <!-- Number of Travelers -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Adults (18+)
                                                <span class="price-note">${{ $travelPackage->per_adult_fee }}/person</span>
                                            </label>
                                            <input type="number" name="number_of_adult" min="0" value=""
                                                oninput="updateTotalPrice()" class="form-control" placeholder="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">
                                                Children (6-12)
                                                <span class="price-note">${{ $travelPackage->per_child_fee }}/person</span>
                                            </label>
                                            <input type="number" name="number_of_child" min="0" value=""
                                                oninput="updateTotalPrice()" class="form-control" placeholder="0" required>
                                        </div>
                                    </div>

                                    <!-- Pickup Location -->
                                    <div class="form-group">
                                        <label class="form-label">Pickup Location</label>
                                        <select name="pick_up_location" class="form-control">
                                            <option>From Hotel</option>
                                            <option>From Airport</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Hotel/Airport Details</label>
                                        <textarea name="pick_up_location_details" class="form-control" rows="3"
                                            placeholder="Enter your hotel name, address, or airport terminal..."></textarea>
                                    </div>

                                    <!-- Price Summary -->
                                    <div class="price-summary">
                                        <div class="price-row">
                                            <span>Base Price</span>
                                            <span>${{ $travelPackage->price_start_from }}</span>
                                        </div>
                                        <div class="price-row total">
                                            <span>Total (USD)</span>
                                            <input type="number" id="totalPrice" name="total_fee"
                                                value="{{ $travelPackage->price_start_from }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn-premium btn-premium-primary w-100 py-3 mt-4">Book My
                                        Adventure</button>

                                    <p class="cancel-note">
                                        Not sure? Cancel within 24 hours for free refund
                                    </p>
                                </form>
                            @else
                                <div class="auth-required">
                                    <i class="bi bi-lock"></i>
                                    <h4>Login Required</h4>
                                    <p>Please log in to your account before booking</p>
                                    <a href="{{ route('login') }}" class="btn-login">Log In to Book</a>
                                </div>
                            @endauth
                        </div>
                    </div>

                    <!-- Help Card -->
                    <div class="help-card">
                        <h4>Need Help?</h4>
                        <p>Our travel experts are available 24/7 to assist you</p>
                        <div class="help-actions">
                            <button class="help-btn whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp
                            </button>
                            <button class="help-btn call">
                                <i class="bi bi-telephone"></i>
                                Call Us
                            </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Important Notice -->
    <section class="notice-section">
        <div class="container">
            <div class="notice-card">
                <div class="notice-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                <div class="notice-content">
                    <h4>Good to Know Before Booking</h4>
                    <ul>
                        <li>Customize your package with additional requests during booking</li>
                        <li>Receive detailed invoice after booking completion</li>
                        <li>Proceed with payment only after reviewing your invoice</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share this Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Copy the link below to share:</p>
                    <div class="share-input-group">
                        <input type="text" id="shareUrl" value="{{ url()->current() }}" readonly>
                        <button class="copy-btn" onclick="copyShareUrl()">Copy</button>
                    </div>
                    <p id="copyMsg" class="copy-success">✓ Copied to clipboard</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        const startFee = {{ $travelPackage->price_start_from }};
        const perAdultFee = {{ $travelPackage->per_adult_fee }};
        const perChildFee = {{ $travelPackage->per_child_fee }};

        function updateTotalPrice() {
            const adults = parseInt(document.querySelector('input[name="number_of_adult"]').value) || 0;
            const children = parseInt(document.querySelector('input[name="number_of_child"]').value) || 0;
            const total = startFee + (adults * perAdultFee) + (children * perChildFee);
            document.getElementById('totalPrice').value = total.toFixed(2);
        }

        function copyShareUrl() {
            const input = document.getElementById('shareUrl');
            input.select();
            navigator.clipboard.writeText(input.value).then(() => {
                const msg = document.getElementById('copyMsg');
                msg.style.display = 'block';
                setTimeout(() => msg.style.display = 'none', 2000);
            });
        }

        // Gallery functionality
        document.addEventListener('DOMContentLoaded', function () {
            const mainImg = document.querySelector('.gallery-main img');
            const thumbs = document.querySelectorAll('.gallery-thumb img');

            thumbs.forEach(thumb => {
                thumb.addEventListener('click', function () {
                    mainImg.src = this.src;
                });
            });
        });
    </script>
@endsection