{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

    <!-- Hero Section -->
    <section class="about-hero" style="background-image: url('{{ asset('image/about-page-image/team.jpg') }}');">
        <div class="about-hero-overlay"></div>
        <div class="about-hero-content container">
            <h1 class="display-3 fw-bold mb-3">About Us</h1>
            <p class="lead text-light">Unveiling the breathtaking beauty of Nepal, one journey at a time.</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="container py-5 my-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('image/about-page-image/team.jpg') }}" alt="Team image" class="img-fluid rounded-4 shadow-lg w-100" style="object-fit: cover; min-height: 400px;">
                    <!-- Optional decorative element -->
                    <div class="position-absolute bottom-0 end-0 bg-primary text-white p-4 rounded-4 shadow translate-middle-y me-n4 d-none d-lg-block" style="background-color: #0d6efd !important;">
                        <h4 class="mb-0 fw-bold">10+ Years</h4>
                        <small>of Excellence</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase fw-bold mb-2" style="color: #0d6efd !important;">Discover Our Journey</h6>
                <h2 class="display-5 fw-bold mb-4">OUR STORY</h2>
                <div class="text-justify lh-lg text-muted">
                    <p class="mb-4">
                        At NauloYatra Tours & Travels, we are passionate about showcasing the breathtaking beauty of Nepal.
                        As a leading travel agency in the country, we specialize in crafting personalized itineraries
                        that offer unforgettable experiences.
                    </p>
                    <p>
                        With our deep local knowledge and expertise, we take pride in curating unique journeys that immerse you in Nepal's rich culture, majestic Himalayas, and vibrant heritage. Whether you seek a thrilling mountain trek, serene lakeside retreats, or a cultural exploration of ancient temples, we are here to make your travel dreams come true. Trust NauloYatra to guide you on an extraordinary journey through the wonders of Nepal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-light py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-primary text-uppercase fw-bold mb-2" style="color: #0d6efd !important;">Our Core Values</h6>
                <h2 class="display-6 fw-bold">Why Travel With Us</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 text-center">
                <!-- Feature 1 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm hover-elevate p-4 rounded-4">
                        <div class="card-body">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('image/help-tools/img1About.svg') }}" alt="1 YEARS EXPERIENCES log">
                            </div>
                            <h5 class="fw-bold mb-3">1 YEARS EXPERIENCES</h5>
                            <p class="text-muted small mb-0">Discover Nepal's wonders with our expertise. Memorable journeys tailored to your preferences await.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm hover-elevate p-4 rounded-4">
                        <div class="card-body">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('image/help-tools/img2About.svg') }}" alt="ACCOMMODATION ADVICE logo">
                            </div>
                            <h5 class="fw-bold mb-3">ACCOMMODATION ADVICE</h5>
                            <p class="text-muted small mb-0">Find your perfect stay in Nepal. Expert advice on accommodations to make your trip unforgettable.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm hover-elevate p-4 rounded-4">
                        <div class="card-body">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('image/help-tools/img3About.svg') }}" alt="MAP logo">
                            </div>
                            <h5 class="fw-bold mb-3">MOST COMPLETED MAP</h5>
                            <p class="text-muted small mb-0">Explore confidently with our complete map. Discover hidden gems and plan your adventures effortlessly.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm hover-elevate p-4 rounded-4">
                        <div class="card-body">
                            <div class="feature-icon-wrapper">
                                <img src="{{ asset('image/help-tools/img4About.svg') }}" alt="TRANSPORT logo">
                            </div>
                            <h5 class="fw-bold mb-3">TRANSPORT</h5>
                            <p class="text-muted small mb-0">Choose from our reliable transport options and enjoy convenient journeys to your desired destinations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us-section" style="background-image: url('{{ asset('image/help-tools/for-about-section-Img.svg') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="why-choose-us-overlay text-center">
                        <h6 class="text-primary text-uppercase fw-bold mb-2" style="color: #0d6efd !important;">Our Promise</h6>
                        <h2 class="display-5 fw-bold mb-4">WHY CHOOSE US?</h2>
                        <div class="text-muted lh-lg fs-5">
                            <p class="mb-0">
                                At NauloYatra, we are your trusted travel partner for exploring the wonders of Nepal. With our extensive experience and local expertise, we offer personalized itineraries and seamless travel experiences tailored to your preferences. Our dedicated team of professionals is committed to providing exceptional service, ensuring your journey is filled with unforgettable moments. From ancient heritage sites in Kathmandu Valley to the majestic peaks of the Himalayas, serene Pokhara lakeside to thrilling Chitwan wildlife safaris, we strive to showcase the very best of Nepal. Choose NauloYatra for a truly immersive and memorable travel experience in the land of the Himalayas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection