{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')
    <style>
        /* Mouse Parallax Animation CSS */
        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
        }

        /* Dark overlay for text readability */
        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0.5) 100%);
            z-index: 10;
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
            transition: transform 0.1s ease-out;
            will-change: transform;
        }

        .hero-content {
            position: absolute;
            inset: 0;
            z-index: 25;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 100px 5% 40px;
            /* top: clears navbar, sides: responsive, bottom: breathing room */
            gap: 28px;
            text-align: center;
        }

        .mainTextPosition {
            color: white;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
        }

        .mainTextSize {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.15;
            margin-bottom: 0.5rem;
        }

        .mainTextPosition p {
            margin-top: 8px;
            font-size: clamp(0.95rem, 2vw, 1.15rem);
            opacity: 0.9;
        }

        .hero-search {
            width: 100%;
            max-width: 860px;
        }

        .hero-search-form {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 20px 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .hero-search-form:hover {
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transform: translateY(-1px);
        }

        .hero-search-form label {
            font-size: 0.85rem;
            color: #2c3e50;
            font-weight: 500;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .hero-search-form .form-select,
        .hero-search-form .form-control {
            height: 44px;
            font-size: 0.9rem;
            border-radius: 10px;
            border: 1px solid rgba(214, 39, 43, 0.08);
            background: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .hero-search-form .form-select:focus,
        .hero-search-form .form-control:focus {
            border-color: rgba(214, 39, 43, 0.2);
            box-shadow: 0 0 0 0.15rem rgba(214, 39, 43, 0.1);
            background: rgba(255, 255, 255, 0.9);
            outline: none;
        }

        .hero-search-form .form-select option {
            background: white;
            color: #2c3e50;
        }

        .btn-danger {
            background: linear-gradient(135deg, #d6272b, #b91f23);
            border: none;
            height: 44px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(214, 39, 43, 0.25);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #b91f23, #a71e22);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(214, 39, 43, 0.3);
        }

        .btn-danger:active {
            transform: translateY(0);
            box-shadow: 0 1px 5px rgba(214, 39, 43, 0.2);
        }

        /* Mouse Parallax Animation */
        .hero-section:hover .hero-image {
            transform: scale(1.05);
        }
    </style>

    {{-- Home Image --}}
    <div class="hero-section" id="heroSection">
        <img src="{{ asset('image/bg.jfif') }}" class="hero-image" alt="main image">

        {{-- Hero Content: text + search grouped and centered --}}
        <div class="hero-content">
            <div class="mainTextPosition text-center">
                <h5 class="mainTextSize">Explore The Beauty Of Nepal</h5>
                <p>Travel Freely. Travel Smart. Travel with NauloYatra.</p>
            </div>

            <div class="hero-search">
                <form action="{{ route('user.travelPackage.show') }}" method="get" class="hero-search-form">
                    @csrf

                    <div class="row g-2 align-items-end">
                        <div class="col-12 col-md-3">
                            <label for="price" class="fw-bold">Sort by price:</label>
                            <select name="price" id="price" class="form-select">
                                <option value="low_to_high">Low To High</option>
                                <option value="high_to_low">High To Low</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="date" class="fw-bold">Check in - Check out:</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="tour_type" class="fw-bold">Tour Category:</label>
                            <select name="tour_type" id="tour_type" class="form-select">
                                <option value="">All Categories</option>
                                <option value="Adventure Tour">Adventure Tour</option>
                                <option value="Beach Holiday Tour">Beach Holiday Tour</option>
                                <option value="Cultural Tour">Cultural Tour</option>
                                <option value="Business Trip Tour">Business Trip Tour</option>
                                <option value="Wildlife Safaris">Wildlife Safaris</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn fw-bold">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Special Offers Section -->
    <section class="offers-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Exclusive Deals</h2>
                <p class="section-subtitle">Limited-time offers on our most popular packages</p>
                <div class="title-divider"></div>
            </div>

            <div class="offers-grid">
                @foreach (($latestPackages ?? []) as $package)
                    @php
                        $imagePath = $package->image_1
                            ? asset('image/uploads/travelPackage/' . $package->image_1)
                            : asset('image/uploads/travelPackage/empty-image.png');
                    @endphp

                    <div class="offer-card position-relative">
                        <div class="offer-badge">
                            <span class="discount-text">20% OFF</span>
                        </div>
                        <div class="offer-image">
                            <img src="{{ $imagePath }}" alt="{{ $package->package_name }}">
                            <div class="offer-overlay">
                                <a href="{{ route('user.packagePage', $package->id) }}" class="view-offer-btn stretched-link">
                                    <i class="bi bi-eye"></i>
                                    View Details
                                </a>
                            </div>
                        </div>
                        <div class="offer-content">
                            <div class="offer-meta">
                                <span class="offer-type">
                                    <i class="bi bi-tag"></i>
                                    {{ $package->tour_type }}
                                </span>
                                <span class="offer-duration">
                                    <i class="bi bi-clock"></i>
                                    {{ $package->duration }} Days
                                </span>
                            </div>
                            <h3 class="offer-title">{{ $package->package_name }}</h3>
                            <div class="offer-price">
                                <span
                                    class="original-price">${{ number_format((float) $package->price_start_from * 1.2, 2) }}</span>
                                <span class="current-price">${{ number_format((float) $package->price_start_from, 2) }}</span>
                                <span class="price-label">per person</span>
                            </div>
                            <div class="offer-features">
                                <div class="feature-tag">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Free Cancellation
                                </div>
                                <div class="feature-tag">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Hotel Included
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('user.travelPackage.show') }}" class="view-all-btn">
                    View All Packages
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Our Services</h2>
                <p class="section-subtitle">Everything you need for the perfect Himalayan experience</p>
                <div class="title-divider"></div>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h3 class="service-title">Guided Tours</h3>
                    <p class="service-description">Expert local guides to show you the hidden gems and cultural treasures of
                        Nepal.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Professional Guides</li>
                        <li><i class="bi bi-check-circle-fill"></i> Local Knowledge</li>
                        <li><i class="bi bi-check-circle-fill"></i> Flexible Schedules</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3 class="service-title">Premium Hotels</h3>
                    <p class="service-description">Handpicked accommodations from luxury resorts to charming boutique hotels
                        across the island.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> 3-5 Star Properties</li>
                        <li><i class="bi bi-check-circle-fill"></i> Prime Locations</li>
                        <li><i class="bi bi-check-circle-fill"></i> Best Price Guarantee</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h3 class="service-title">Transportation</h3>
                    <p class="service-description">Comfortable and reliable transport options including private vehicles and
                        domestic flights.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Airport Transfers</li>
                        <li><i class="bi bi-check-circle-fill"></i> Private Vehicles</li>
                        <li><i class="bi bi-check-circle-fill"></i> 24/7 Support</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h3 class="service-title">24/7 Support</h3>
                    <p class="service-description">Round-the-clock assistance from our dedicated travel experts throughout
                        your journey.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Emergency Hotline</li>
                        <li><i class="bi bi-check-circle-fill"></i> Live Chat Support</li>
                        <li><i class="bi bi-check-circle-fill"></i> WhatsApp Assistance</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <!-- Popular Destinations Section -->
    <section class="destinations-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Popular Destinations</h2>
                <p class="section-subtitle">Discover the most beautiful places in Nepal</p>
                <div class="title-divider"></div>
            </div>

            <div class="destinations-carousel">
                @if($travelPackages && $travelPackages->count() > 0)
                    <div class="swiper dest-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($travelPackages as $package)
                                @php
                                    $imagePath = $package->image_1
                                        ? asset('image/uploads/travelPackage/' . $package->image_1)
                                        : asset('image/uploads/travelPackage/empty-image.png');
                                @endphp

                                <div class="swiper-slide">
                                    <div class="destination-card position-relative">
                                        <div class="dest-image">
                                            <img src="{{ $imagePath }}" alt="{{ $package->package_name }}">
                                            <div class="dest-overlay">
                                                <div class="dest-content">
                                                    <h3 class="dest-name">{{ $package->package_name }}</h3>
                                                    <p class="dest-type">{{ $package->tour_type }}</p>
                                                    <div class="dest-duration">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $package->duration }} Days
                                                    </div>
                                                    <a href="{{ route('user.packagePage', $package->id) }}"
                                                        class="dest-explore-btn stretched-link">
                                                        Explore
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add pagination if needed -->
                        <div class="swiper-pagination"></div>
                    </div>
                @else
                    <!-- Fallback content when no packages available -->
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center py-5">
                                <div class="empty-destinations">
                                    <div class="empty-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <h4 class="empty-title">No Destinations Available</h4>
                                    <p class="empty-description">Check back soon for amazing travel packages!</p>
                                    <a href="{{ route('user.travelPackage.show') }}" class="btn btn-primary mt-3">
                                        View All Packages
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if($travelPackages && $travelPackages->count() > 1)
                    <div class="destinations-nav">
                        <button class="dest-nav-btn" id="destPrev">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="dest-nav-btn" id="destNext">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof Swiper === 'undefined') return;
                const el = document.querySelector('.dest-swiper');
                if (!el) return;

                new Swiper(el, {
                    slidesPerView: 1.1,
                    spaceBetween: 15,
                    centeredSlides: false,
                    loop: true,
                    loopAdditionalSlides: 3,
                    watchSlidesProgress: true,
                    watchSlidesVisibility: true,
                    pagination: {
                        el: '.dest-swiper .swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                        dynamicMainBullets: 3,
                    },
                    navigation: {
                        prevEl: '#destPrev',
                        nextEl: '#destNext',
                    },
                    breakpoints: {
                        // Mobile devices
                        320: {
                            slidesPerView: 1.1,
                            spaceBetween: 12,
                            centeredSlides: true,
                        },
                        375: {
                            slidesPerView: 1.2,
                            spaceBetween: 14,
                            centeredSlides: true,
                        },
                        425: {
                            slidesPerView: 1.3,
                            spaceBetween: 16,
                            centeredSlides: true,
                        },
                        // Tablets
                        576: {
                            slidesPerView: 1.5,
                            spaceBetween: 18,
                            centeredSlides: false,
                        },
                        768: {
                            slidesPerView: 2.0,
                            spaceBetween: 20,
                            centeredSlides: false,
                        },
                        // Small desktops
                        992: {
                            slidesPerView: 2.5,
                            spaceBetween: 24,
                            centeredSlides: false,
                        },
                        // Large desktops
                        1200: {
                            slidesPerView: 3.0,
                            spaceBetween: 28,
                            centeredSlides: false,
                        },
                        1400: {
                            slidesPerView: 3.5,
                            spaceBetween: 32,
                            centeredSlides: false,
                        },
                    },
                    // Touch events optimization
                    touchEventsTarget: 'wrapper',
                    touchRatio: 1,
                    touchAngle: 45,
                    grabCursor: true,
                    // Resistance for better feel
                    resistance: true,
                    resistanceRatio: 0.85,
                    // Prevent clicks on swipe
                    preventClicks: true,
                    preventClicksPropagation: true,
                    // Smooth transitions
                    speed: 400,
                    effect: 'slide',
                    // Free mode for natural scrolling
                    freeMode: false,
                    freeModeSticky: false,
                });
            });
        </script>
    @endpush

    <section class="home-difference-modern">
        <div class="container">
            <div class="row align-items-center column-reverse-mobile g-5">
                <!-- Image Column -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="difference-img-wrapper">
                        <img src="{{ asset('image/people.png') }}" alt="Travelers" class="img-fluid main-img">
                        <div class="experience-badge">
                            <span class="d-block display-4 fw-bold text-danger">10+</span>
                            <span class="d-block fw-semibold text-dark">Years of<br>Experience</span>
                        </div>
                    </div>
                </div>

                <!-- Text Column -->
                <div class="col-lg-6">
                    <div class="difference-content">
                        <span class="text-uppercase fw-bold text-danger tracking-wide mb-2 d-block">Why Choose Us</span>
                        <h2 class="difference-heading-new mb-4">Discover the NauloYatra Difference</h2>
                        <p class="difference-desc-new mb-5">At NauloYatra Tours &amp; Travels, we craft journeys across
                            Nepal with local insight, thoughtful planning, and genuine care—so your trip feels effortless
                            from the first message to the final goodbye.</p>

                        <div class="difference-features">
                            <!-- Feature 1 -->
                            <div class="diff-feature-box">
                                <div class="diff-icon">
                                    <i class="bi bi-compass"></i>
                                </div>
                                <div class="diff-text">
                                    <h5 class="fw-bold mb-2 text-dark">Tailored to You</h5>
                                    <p class="mb-0 text-muted">From short getaways to full Himalayan adventures, we design
                                        itineraries that match your pace, budget, and interests.</p>
                                </div>
                            </div>

                            <!-- Feature 2 -->
                            <div class="diff-feature-box">
                                <div class="diff-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="diff-text">
                                    <h5 class="fw-bold mb-2 text-dark">Local Guides, Real Experiences</h5>
                                    <p class="mb-0 text-muted">Explore beyond the obvious—culture, food, and
                                        communities—with knowledgeable local support at every step.</p>
                                </div>
                            </div>

                            <!-- Feature 3 -->
                            <div class="diff-feature-box">
                                <div class="diff-icon">
                                    <i class="bi bi-car-front"></i>
                                </div>
                                <div class="diff-text">
                                    <h5 class="fw-bold mb-2 text-dark">Comfortable Logistics</h5>
                                    <p class="mb-0 text-muted">Reliable transport, clear schedules, and responsive
                                        assistance—so you can focus on the views, not the planning.</p>
                                </div>
                            </div>

                            <!-- Feature 4 -->
                            <div class="diff-feature-box">
                                <div class="diff-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="diff-text">
                                    <h5 class="fw-bold mb-2 text-dark">Safety First</h5>
                                    <p class="mb-0 text-muted">We prioritize safety with trusted partners, well-managed
                                        routes, and help whenever you need it.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">What Travelers Say</h2>
                <p class="section-subtitle">Real experiences from our valued customers</p>
                <div class="title-divider"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="modern-card p-4 h-100">
                        <div class="testimonial-rating mb-3 text-warning">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted mb-4 italic" style="font-style: italic;">"NauloYatra planned our Nepal trek
                            perfectly. Everything was smooth and the team was always responsive to our needs."</p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://picsum.photos/seed/user1/100/100.jpg" alt="Sarah Johnson"
                                class="rounded-circle shadow-sm" style="width: 50px; height: 50px;">
                            <div>
                                <h4 class="h6 fw-bold mb-0">Sarah Johnson</h4>
                                <p class="small text-muted mb-0">United Kingdom</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="modern-card p-4 h-100">
                        <div class="testimonial-rating mb-3 text-warning">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                        </div>
                        <p class="text-muted mb-4 italic" style="font-style: italic;">"Our cultural tour was exceptional!
                            Great guide, amazing sights, and authentic local experiences."</p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://picsum.photos/seed/user2/100/100.jpg" alt="Michael Chen"
                                class="rounded-circle shadow-sm" style="width: 50px; height: 50px;">
                            <div>
                                <h4 class="h6 fw-bold mb-0">Michael Chen</h4>
                                <p class="small text-muted mb-0">Singapore</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="modern-card p-4 h-100">
                        <div class="testimonial-rating mb-3 text-warning">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted mb-4 italic" style="font-style: italic;">"Clean transport, comfortable hotels,
                            and an itinerary that felt local—not touristy. Highly recommended!"</p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://picsum.photos/seed/user3/100/100.jpg" alt="Emma Rodriguez"
                                class="rounded-circle shadow-sm" style="width: 50px; height: 50px;">
                            <div>
                                <h4 class="h6 fw-bold mb-0">Emma Rodriguez</h4>
                                <p class="small text-muted mb-0">Australia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-cta">
        <div class="home-cta-inner">
            <div class="cta-dark">
                <h3 class="cta-dark-title">Lets you Explore the Best. Contact Us Now</h3>
                <p class="cta-dark-desc">Share your dates and interests—our team will suggest the best Nepal experience for
                    you.</p>
                <a href="{{ route('contactUs') }}" class="btn cta-dark-btn bg-white text-dark">Get in touch</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Why Choose NauloYatra</h2>
                <p class="section-subtitle">Experience the difference with our expert travel services</p>
                <div class="title-divider"></div>
            </div>

            <div class="why-choose-grid">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <h3 class="why-title">Expert Local Guides</h3>
                    <p class="why-description">Knowledgeable local guides who bring Nepal's culture, mountains and heritage
                        to life
                    </p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3 class="why-title">100% Safe Travel</h3>
                    <p class="why-description">Your safety is our priority with comprehensive travel insurance support</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <h3 class="why-title">Best Price Guarantee</h3>
                    <p class="why-description">Competitive pricing with no hidden fees or surprise charges</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h3 class="why-title">24/7 Support</h3>
                    <p class="why-description">Round-the-clock assistance from booking to completion of your journey</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2 class="cta-title">Ready for Your Adventure?</h2>
                    <p class="cta-subtitle mx-auto">Let us help you create unforgettable memories in the Pearl of the Indian
                        Ocean</p>
                </div>
                <div class="cta-buttons">
                    <a href="{{ route('user.travelPackage.show') }}" class="cta-btn primary">
                        <i class="bi bi-search"></i>
                        Explore Packages
                    </a>
                    <a href="{{ route('contactUs') }}" class="cta-btn secondary">
                        <i class="bi bi-chat-dots"></i>
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="section-header">
                <div>
                    <div class="blog-kicker">Latest Updates</div>
                    <h2 class="section-title">From Our Blog</h2>
                </div>
                <div>
                    <a href="{{ route('blog') }}" class="view-all-btn">
                        View All Posts
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="blog-grid">
                @foreach (($latestBlogs ?? []) as $blog)
                    @php
                        $blogImg = $blog->image
                            ? asset('image/uploads/blog/' . $blog->image)
                            : asset('image/uploads/blog/empty-image.png');
                    @endphp

                    <article class="blog-card position-relative">
                        <div class="blog-image">
                            <img src="{{ $blogImg }}" alt="{{ $blog->title }}">
                            <div class="blog-category">Travel Tips</div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="blog-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                                <span class="blog-author">By NauloYatra Team</span>
                            </div>
                            <h3 class="blog-title">{{ Str::limit($blog->title, 60) }}</h3>
                            <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->description ?? ''), 100) }}</p>
                            <a href="{{ route('blog.page', $blog->id) }}" class="read-more-btn stretched-link">
                                Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof Swiper === 'undefined') return;
                const el = document.querySelector('.dest-swiper');
                if (!el) return;

                new Swiper(el, {
                    slidesPerView: 1.15,
                    spaceBetween: 20,
                    centeredSlides: false,
                    loop: true,
                    pagination: {
                        el: '.dest-swiper .swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        prevEl: '#destPrev',
                        nextEl: '#destNext',
                    },
                    breakpoints: {
                        576: { slidesPerView: 1.8, spaceBetween: 20 },
                        768: { slidesPerView: 2.2, spaceBetween: 24 },
                        992: { slidesPerView: 3, spaceBetween: 28 },
                        1400: { slidesPerView: 3, spaceBetween: 32 },
                    }
                });
            });

            // Mouse Parallax Animation for Hero Section
            const heroSection = document.getElementById('heroSection');
            const heroImage = heroSection?.querySelector('.hero-image');
            const mainText = heroSection?.querySelector('.mainTextPosition');
            const heroSearch = heroSection?.querySelector('.hero-search');

            if (heroSection && heroImage) {
                let mouseX = 0, mouseY = 0;
                let currentX = 0, currentY = 0;
                let targetX = 0, targetY = 0;

                // Mouse move handler
                const handleMouseMove = (e) => {
                    const rect = heroSection.getBoundingClientRect();
                    mouseX = (e.clientX - rect.left) / rect.width - 0.5;
                    mouseY = (e.clientY - rect.top) / rect.height - 0.5;

                    targetX = mouseX * 20; // Adjust parallax intensity
                    targetY = mouseY * 20;
                };

                // Touch move handler for mobile
                const handleTouchMove = (e) => {
                    const touch = e.touches[0];
                    const rect = heroSection.getBoundingClientRect();
                    mouseX = (touch.clientX - rect.left) / rect.width - 0.5;
                    mouseY = (touch.clientY - rect.top) / rect.height - 0.5;

                    targetX = mouseX * 15; // Slightly less intense on mobile
                    targetY = mouseY * 15;
                };

                // Animation loop
                const animate = () => {
                    currentX += (targetX - currentX) * 0.1;
                    currentY += (targetY - currentY) * 0.1;

                    // Apply parallax transformations
                    if (heroImage) {
                        heroImage.style.transform = `translate(${currentX}px, ${currentY}px) scale(1.05)`;
                    }

                    if (mainText) {
                        mainText.style.transform = `translate(calc(-50% + ${currentX * 0.5}px), calc(-50% + ${currentY * 0.5}px))`;
                    }

                    if (heroSearch) {
                        heroSearch.style.transform = `translate(calc(-50% + ${currentX * 0.3}px), calc(58% + ${currentY * 0.2}px))`;
                    }

                    requestAnimationFrame(animate);
                };

                // Start animation loop
                animate();

                // Event listeners
                heroSection.addEventListener('mousemove', handleMouseMove);
                heroSection.addEventListener('touchmove', handleTouchMove);

                // Reset on mouse leave
                heroSection.addEventListener('mouseleave', () => {
                    targetX = 0;
                    targetY = 0;
                });

                heroSection.addEventListener('touchend', () => {
                    targetX = 0;
                    targetY = 0;
                });

                // Smooth reset on page load
                setTimeout(() => {
                    targetX = 0;
                    targetY = 0;
                }, 100);
            }
        </script>
    @endpush

    <script>
        // Additional mouse parallax for hero section (fallback)
        document.addEventListener('DOMContentLoaded', function () {
            const heroSection = document.getElementById('heroSection');
            if (heroSection) {
                // Add subtle hover effect
                heroSection.addEventListener('mouseenter', () => {
                    heroSection.style.transition = 'all 0.3s ease';
                });

                heroSection.addEventListener('mouseleave', () => {
                    heroSection.style.transition = 'all 0.5s ease';
                });
            }
        });
    </script>

@endsection