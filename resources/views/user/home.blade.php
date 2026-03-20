{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

    {{-- Home Image --}}
    <div class="hero-section">
        <img src="{{ asset('image/bg.jfif') }}" class="hero-image" alt="main image">

        {{-- Image Text --}}
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

                    <div class="offer-card">
                        <div class="offer-badge">
                            <span class="discount-text">20% OFF</span>
                        </div>
                        <div class="offer-image">
                            <img src="{{ $imagePath }}" alt="{{ $package->package_name }}">
                            <div class="offer-overlay">
                                <a href="{{ route('user.packagePage', $package->id) }}" class="view-offer-btn">
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
                <p class="section-subtitle">Everything you need for the perfect Sri Lankan experience</p>
                <div class="title-divider"></div>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h3 class="service-title">Guided Tours</h3>
                    <p class="service-description">Expert local guides to show you the hidden gems and cultural treasures of
                        Sri Lanka.</p>
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
                <p class="section-subtitle">Discover the most beautiful places in Sri Lanka</p>
                <div class="title-divider"></div>
            </div>

            <div class="destinations-carousel">
                <div class="swiper dest-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($travelPackages ?? [] as $package)
                            @php
                                $imagePath = $package->image_1
                                    ? asset('image/uploads/travelPackage/' . $package->image_1)
                                    : asset('image/uploads/travelPackage/empty-image.png');
                            @endphp

                            <div class="swiper-slide">
                                <div class="destination-card">
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
                                                    class="dest-explore-btn">
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
                </div>

                <div class="destinations-nav">
                    <button class="dest-nav-btn" id="destPrev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="dest-nav-btn" id="destNext">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
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

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"NauloYatra planned our Sri Lanka trip perfectly. Everything was smooth
                            and the team was always responsive to our needs."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://picsum.photos/seed/user1/100/100.jpg" alt="Sarah Johnson">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Sarah Johnson</h4>
                            <p class="author-location">United Kingdom</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p class="testimonial-text">"Our cultural tour was exceptional! Great guide, amazing sights, and
                            authentic local experiences."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://picsum.photos/seed/user2/100/100.jpg" alt="Michael Chen">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Michael Chen</h4>
                            <p class="author-location">Singapore</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"Clean transport, comfortable hotels, and an itinerary that felt
                            local—not touristy. Highly recommended!"</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://picsum.photos/seed/user3/100/100.jpg" alt="Emma Rodriguez">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Emma Rodriguez</h4>
                            <p class="author-location">Australia</p>
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
                    <p class="why-description">Knowledgeable local guides who bring Sri Lanka's culture and history to life
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

                    <article class="blog-card">
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
                            <a href="{{ route('blog.page', $blog->id) }}" class="read-more-btn">
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
        </script>
    @endpush

@endsection