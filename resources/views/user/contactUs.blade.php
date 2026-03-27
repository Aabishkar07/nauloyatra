@extends('layouts/mainStructure')



@section('content')

<!-- Hero Section -->
<section class="modern-hero">
    <div class="container text-center">
        <div class="user-badge mb-3">Get in Touch</div>
        <h1 class="hero-title-premium mb-3">We'd Love to Hear From You</h1>
        <p class="hero-subtitle-premium mx-auto">Have questions about our packages or need a custom itinerary? Our travel experts are ready to help you plan your dream trip.</p>
    </div>
</section>

<section class="contact-section py-5">
    <div class="container">
        <div class="contact-grid">
            
            <!-- Contact Info Column -->
            <div class="contact-info">
                <div class="modern-card mb-4">
                    <h2 class="form-title h4 mb-4">Contact Information</h2>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Our Location</h4>
                            <address>A/24/2, St.Anna Road, Puttalam, Sri Lanka.</address>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div class="info-content">
                            <h4>Customer Care</h4>
                            <p>(+94) 74 133 8008</p>
                            <p class="small text-muted">Available 24/7 for support</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email Us</h4>
                            <p>info@nauloyatra.com</p>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-top">
                        <h4 class="h6 fw-bold mb-3">Follow Our Journey</h4>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-secondary rounded-circle p-2" style="width: 40px; height: 40px;"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-outline-secondary rounded-circle p-2" style="width: 40px; height: 40px;"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="btn btn-outline-secondary rounded-circle p-2" style="width: 40px; height: 40px;"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1012910.4346338012!2d79.23353424605882!3d7.389554877447044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afd153d55c804ff%3A0x57355f14d97f87a5!2sYm%20Travels%20%26%20Tours%20Pvt%20Ltd!5e0!3m2!1sen!2slk!4v1714190419622!5m2!1sen!2slk"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="contact-form">
                <div class="modern-card">
                    <h2 class="form-title">Send us a Message</h2>
                    <form action="{{ route('user.contactUs.store') }}" method="post">
                        @csrf

                        {{-- Validation & Success Messages --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm rounded-4 p-3 mb-4">
                                <p class="fw-bold mb-2">Please correct the following errors:</p>
                                <ul class="mb-0 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success border-0 shadow-sm rounded-4 p-3 mb-4">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill fs-5"></i>
                                    <span class="fw-medium">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="modern-input-group">
                                    <label for="user_name">Full Name</label>
                                    <input type="text" name="user_name" class="modern-form-control" id="user_name" placeholder="Enter your name" value="{{ old('user_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modern-input-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="modern-form-control" id="email" placeholder="example@mail.com" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="modern-input-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" class="modern-form-control" id="subject" placeholder="How can we help?" value="{{ old('subject') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="modern-input-group">
                                    <label for="discription">Your Message</label>
                                    <textarea name="discription" class="modern-form-control" id="discription" rows="6" placeholder="Tell us more about your travel plans..." required>{{ old('discription') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn-premium">
                                    Send Message <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection