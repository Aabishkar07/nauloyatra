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

                <div class="clouds" aria-hidden="true">
                    <div class="cloud cloud-wisp-1"></div>
                    <div class="cloud cloud-wisp-2"></div>
                    <div class="cloud cloud-wisp-3"></div>
                    <div class="cloud cloud-mid-1"></div>
                    <div class="cloud cloud-mid-2"></div>
                </div>

                <div class="fog-base" aria-hidden="true"></div>
                <div class="fog-blob fog-blob-1" aria-hidden="true"></div>
                <div class="fog-blob fog-blob-2" aria-hidden="true"></div>
                <div class="fog-blob fog-blob-3" aria-hidden="true"></div>
                <div class="fog-blob fog-blob-4" aria-hidden="true"></div>
                <div class="fog-floor" aria-hidden="true"></div>

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
                                    <button type="submit" class="btn btn-brand fw-bold">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>

        <section class="home-offers">
            <div class="home-offers-inner">
                <div class="text-center mb-4">
                    <h2 class="section-title">Special Offers & Discounts</h2>
                    <hr class="title-divider">
                    <p class="section-desc">
                        Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts.
                    </p>
                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
                    @foreach (($latestPackages ?? []) as $package)
                        @php
                            $imagePath = $package->image_1
                                ? asset('image/uploads/travelPackage/' . $package->image_1)
                                : asset('image/bg.jfif');
                        @endphp

                        <div class="col">
                            <a class="offer-card" href="{{ route('user.packagePage', $package->id) }}">
                                <div class="offer-card-img">
                                    <img src="{{ $imagePath }}" alt="{{ $package->package_name }}">
                                </div>

                                <div class="offer-card-body">
                                    <div class="offer-meta">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>{{ $package->tour_type }}</span>
                                    </div>
                                    <div class="offer-title">{{ $package->package_name }}</div>
                                    <div class="offer-price">${{ number_format((float) $package->price_start_from, 2) }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

<section class="services-section" >
    <div class="services-inner">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="section-title">Our Services</h2>
            <hr class="title-divider">
            <p class="section-desc">
                Far far away, behind the word mountains, far from the countries Vokalia and
                Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                right at the coast of the Semantics, a large language ocean.
            </p>
        </div>

        <!-- Grid -->
        <div class="row g-4 align-items-stretch">

            <!-- Left: Image -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="img-card">
                    <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b?w=800&q=80" alt="Golden Gate Bridge">
                </div>
            </div>

            <!-- Right: 2x2 service cards -->
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row g-4 h-100">

                    <!-- Beautiful Condo -->
                    <div class="col-12 col-sm-6">
                        <div class="service-card">
                            <svg class="service-icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8 32L32 10l24 22"/>
                                <rect x="18" y="32" width="28" height="22" rx="1"/>
                                <rect x="26" y="42" width="12" height="12" rx="1"/>
                                <path d="M24 32v-6a4 4 0 0 1 8 0v6"/>
                                <!-- chimney -->
                                <rect x="38" y="22" width="5" height="10" rx="1"/>
                            </svg>
                            <h5>Beautiful </h5>
                            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                    <!-- Easy to Connect -->
                    <div class="col-12 col-sm-6">
                        <div class="service-card">
                            <svg class="service-icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="8" y="18" width="48" height="32" rx="3"/>
                                <path d="M8 26l24 14 24-14"/>
                                <path d="M8 18l8-8h32l8 8"/>
                            </svg>
                            <h5>Easy to Connect</h5>
                            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                    <!-- Restaurants & Cafe -->
                    <div class="col-12 col-sm-6">
                        <div class="service-card">
                            <svg class="service-icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="32" cy="34" r="18"/>
                                <line x1="32" y1="16" x2="32" y2="8"/>
                                <line x1="20" y1="8" x2="20" y2="20"/>
                                <line x1="44" y1="8" x2="44" y2="20"/>
                                <line x1="14" y1="54" x2="50" y2="54"/>
                            </svg>
                            <h5>Restaurants &amp; Cafe</h5>
                            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                    <!-- 24/7 Support -->
                    <div class="col-12 col-sm-6">
                        <div class="service-card">
                            <svg class="service-icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 28c0-10 7-18 18-18s18 8 18 18"/>
                                <path d="M10 30a6 6 0 0 1 6-6h2v14h-2a6 6 0 0 1-6-6v-2z"/>
                                <path d="M46 24h2a6 6 0 0 1 6 6v2a6 6 0 0 1-6 6h-2V24z"/>
                                <path d="M48 36c0 8-7 12-16 12"/>
                                <path d="M28 48h6a3 3 0 0 1 0 6h-6"/>
                                <!-- wifi arcs -->
                                <path d="M38 20a16 16 0 0 1 4 4M42 16a22 22 0 0 1 6 6"/>
                            </svg>
                            <h5>24/7 Support</h5>
                            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>





<section class="dest-section">
    <div class="dest-inner">

        <div class="text-center">
            <h2 class="section-title">Popular Destination</h2>
            <hr class="title-divider">
        </div>

        <div class="swiper dest-swiper">
            <div class="swiper-wrapper">
                @foreach ($travelPackages ?? [] as $package)
                    @php
                        $imagePath = $package->image_1
                            ? asset('image/uploads/travelPackage/' . $package->image_1)
                            : asset('image/bg.jfif');
                    @endphp

                    <div class="swiper-slide">
                        <a class="dest-card" href="{{ route('user.packagePage', $package->id) }}">
                            <img src="{{ $imagePath }}" alt="{{ $package->package_name }}">
                            <div class="dest-label">
                                <p class="dest-name">{{ $package->package_name }}</p>
                                <p class="dest-country">{{ $package->tour_type }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>

        <div class="dest-nav">
            <button class="dest-arrow" id="destPrev"><i class="bi bi-arrow-left"></i></button>
            <button class="dest-arrow" id="destNext"><i class="bi bi-arrow-right"></i></button>
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

        <section class="home-difference">
            <div class="home-difference-inner">
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-lg-6">
                        <h2 class="difference-title">Discover the NauloYatra Difference</h2>
                        <p class="difference-lead">At NauloYatra Tours &amp; Travels, we craft journeys across Nepal with local insight, thoughtful planning, and genuine care—so your trip feels effortless from the first message to the final goodbye.</p>

                        <div class="difference-list">
                            <div class="difference-item">
                                <h5>Tailored to You</h5>
                                <p>From short getaways to full Himalayan adventures, we design itineraries that match your pace, budget, and interests.</p>
                            </div>
                            <div class="difference-item">
                                <h5>Local Guides, Real Experiences</h5>
                                <p>Explore beyond the obvious—culture, food, and communities—with knowledgeable local support at every step.</p>
                            </div>
                            <div class="difference-item">
                                <h5>Comfortable Logistics</h5>
                                <p>Reliable transport, clear schedules, and responsive assistance—so you can focus on the views, not the planning.</p>
                            </div>
                            <div class="difference-item">
                                <h5>Safety First</h5>
                                <p>We prioritize safety with trusted partners, well-managed routes, and help whenever you need it.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="difference-image">
                            <img src="{{ asset('image/people.png') }}" alt="Travelers" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-testimonials">
            <div class="home-testimonials-inner">
                <div class="text-center mb-4">
                    <h2 class="section-title">What Travelers Say</h2>
                    <hr class="title-divider">
                    <p class="section-desc">Real stories from guests who explored Nepal with NauloYatra.</p>
                </div>

                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-quote">“NauloYatra planned our Kathmandu–Pokhara trip perfectly. Everything was smooth and the team was always responsive.”</div>
                            <div class="testimonial-footer">
                                <div class="testimonial-avatar">A</div>
                                <div>
                                    <div class="testimonial-name">Aarav</div>
                                    <div class="testimonial-meta">India</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-quote">“Our trekking support was excellent—great guide, great pacing, and incredible views. Highly recommended.”</div>
                            <div class="testimonial-footer">
                                <div class="testimonial-avatar">S</div>
                                <div>
                                    <div class="testimonial-name">Sophia</div>
                                    <div class="testimonial-meta">United Kingdom</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-quote">“Clean transport, good hotels, and an itinerary that felt local—not touristy. We’ll travel with NauloYatra again.”</div>
                            <div class="testimonial-footer">
                                <div class="testimonial-avatar">M</div>
                                <div>
                                    <div class="testimonial-name">Mina</div>
                                    <div class="testimonial-meta">Nepal</div>
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
                    <p class="cta-dark-desc">Share your dates and interests—our team will suggest the best Nepal experience for you.</p>
                    <a href="{{ route('contactUs') }}" class="btn cta-dark-btn bg-white text-dark">Get in touch</a>
                </div>
            </div>
        </section>

        <section class="home-blog">
            <div class="home-blog-inner">
                <div class="home-blog-head">
                    <div>
                        <div class="blog-kicker">Expert Insights</div>
                        <h2 class="blog-title">Our Latest Blog Posts</h2>
                    </div>
                    <div>
                        <a href="{{ route('blog') }}" class="btn btn-outline-primary blog-viewall">View All Posts <span aria-hidden="true">→</span></a>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach (($latestBlogs ?? []) as $blog)
                        @php
                            $blogImg = $blog->image
                                ? asset('image/uploads/blog/' . $blog->image)
                                : asset('image/uploads/blog/empty-image.png');
                        @endphp

                        <div class="col-12 col-md-6 col-lg-4">
                            <a class="blog-card" href="{{ route('blog.page', $blog->id) }}">
                                <div class="blog-card-img">
                                    <img src="{{ $blogImg }}" alt="{{ $blog->title }}">
                                </div>
                                <div class="blog-card-body">
                                    <div class="blog-meta">By NauloYatra <span class="blog-dot">|</span> {{ \carbon\carbon::parse($blog->created_at)->format('d M, Y') }}</div>
                                    <div class="blog-card-title">{{ $blog->title }}</div>
                                    <div class="blog-read">Continue Reading <span aria-hidden="true">→</span></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

@endsection
