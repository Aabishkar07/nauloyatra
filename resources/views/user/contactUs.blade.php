@extends('layouts/mainStructure')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/user_css/contactUs.css') }}">
@endsection

@section('content')

{{-- ═══════════════════════════════════════════
    HERO SECTION
═══════════════════════════════════════════ --}}
<section class="cu-hero">
    <div class="cu-hero-bg"></div>
    <div class="cu-hero-overlay"></div>

    <div class="cu-hero-content">
        <span class="cu-eyebrow">
            <i class="bi bi-chat-dots-fill"></i> Get In Touch
        </span>
        <h1 class="cu-hero-title">We'd Love to<br><span>Hear From You</span></h1>
        <p class="cu-hero-sub">Have questions about our packages or need a custom Himalayan itinerary?<br>Our Nepal travel experts are here to help you every step of the way.</p>

        <div class="cu-stats-row">
            <div class="cu-stat">
                <span class="cu-stat-num">24/7</span>
                <span class="cu-stat-label">Support</span>
            </div>
            <div class="cu-stat-divider"></div>
            <div class="cu-stat">
                <span class="cu-stat-num">< 2h</span>
                <span class="cu-stat-label">Response Time</span>
            </div>
            <div class="cu-stat-divider"></div>
            <div class="cu-stat">
                <span class="cu-stat-num">5000+</span>
                <span class="cu-stat-label">Happy Travelers</span>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="cu-scroll-hint">
        <i class="bi bi-chevron-double-down"></i>
    </div>
</section>

{{-- ═══════════════════════════════════════════
    QUICK CONTACT CARDS
═══════════════════════════════════════════ --}}
<section class="cu-quick-cards">
    <div class="cu-container">
        <div class="cu-cards-grid">
            <div class="cu-qcard">
                <div class="cu-qcard-icon cu-red">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div class="cu-qcard-body">
                    <h4>Our Office</h4>
                    <p>Thamel, Kathmandu<br>Nepal 44600</p>
                </div>
            </div>
            <div class="cu-qcard">
                <div class="cu-qcard-icon cu-green">
                    <i class="bi bi-whatsapp"></i>
                </div>
                <div class="cu-qcard-body">
                    <h4>WhatsApp Us</h4>
                    <p>(+977) 98-0000-0000<br><span class="cu-badge-live"><i class="bi bi-circle-fill"></i> Available Now</span></p>
                </div>
            </div>
            <div class="cu-qcard">
                <div class="cu-qcard-icon cu-blue">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="cu-qcard-body">
                    <h4>Email Us</h4>
                    <p>info@nauloyatra.com<br>bookings@nauloyatra.com</p>
                </div>
            </div>
            <div class="cu-qcard">
                <div class="cu-qcard-icon cu-orange">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <div class="cu-qcard-body">
                    <h4>Office Hours</h4>
                    <p>Sun – Fri: 9am – 6pm<br>Saturday: 10am – 3pm</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════
    MAIN CONTENT: FORM + SIDEBAR
═══════════════════════════════════════════ --}}
<section class="cu-main-section">
    <div class="cu-container">
        <div class="cu-main-grid">

            {{-- ─── MESSAGE FORM ─── --}}
            <div class="cu-form-col">
                <div class="cu-form-card">
                    <div class="cu-form-header">
                        <div class="cu-form-badge">
                            <i class="bi bi-send-fill"></i> Send a Message
                        </div>
                        <h2>Plan Your Nepal Adventure</h2>
                        <p>Fill in the details below and we'll get back to you within 2 hours.</p>
                    </div>

                    {{-- Alerts --}}
                    @if ($errors->any())
                        <div class="cu-alert cu-alert-error">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <div>
                                <strong>Please fix the following:</strong>
                                <ul class="mb-0 mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="cu-alert cu-alert-success">
                            <i class="bi bi-check-circle-fill cu-alert-icon"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('user.contactUs.store') }}" method="post" class="cu-form">
                        @csrf

                        <div class="cu-form-row">
                            <div class="cu-field">
                                <label for="user_name">
                                    <i class="bi bi-person"></i> Full Name
                                </label>
                                <input type="text" id="user_name" name="user_name"
                                       value="{{ old('user_name') }}"
                                       placeholder="e.g. Aarav Thapa" required>
                            </div>
                            <div class="cu-field">
                                <label for="email">
                                    <i class="bi bi-envelope"></i> Email Address
                                </label>
                                <input type="email" id="email" name="email"
                                       value="{{ old('email') }}"
                                       placeholder="you@example.com" required>
                            </div>
                        </div>

                        <div class="cu-field">
                            <label for="subject">
                                <i class="bi bi-chat-left-text"></i> Subject
                            </label>
                            <input type="text" id="subject" name="subject"
                                   value="{{ old('subject') }}"
                                   placeholder="e.g. Everest Base Camp Trek inquiry" required>
                        </div>

                        <div class="cu-field">
                            <label for="discription">
                                <i class="bi bi-pencil-square"></i> Your Message
                            </label>
                            <textarea id="discription" name="discription" rows="6"
                                      placeholder="Tell us your travel dates, group size, destinations you'd love to visit in Nepal...">{{ old('discription') }}</textarea>
                        </div>

                        <div class="cu-form-row cu-trip-prefs">
                            <div class="cu-field">
                                <label for="trip_type">
                                    <i class="bi bi-map"></i> Trip Type
                                </label>
                                <select id="trip_type" name="trip_type">
                                    <option value="">Select a trip type</option>
                                    <option>Trekking / Hiking</option>
                                    <option>Cultural Tour</option>
                                    <option>Adventure Tour</option>
                                    <option>Wildlife Safari</option>
                                    <option>Helicopter Tour</option>
                                    <option>Custom Package</option>
                                </select>
                            </div>
                            <div class="cu-field">
                                <label for="travelers">
                                    <i class="bi bi-people"></i> Number of Travelers
                                </label>
                                <select id="travelers" name="travelers">
                                    <option value="">Select group size</option>
                                    <option>Solo (1)</option>
                                    <option>Couple (2)</option>
                                    <option>Small Group (3–6)</option>
                                    <option>Large Group (7+)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="cu-submit-btn">
                            <span>Send My Inquiry</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- ─── SIDEBAR ─── --}}
            <aside class="cu-sidebar">

                {{-- Reach Us Block --}}
                <div class="cu-sidebar-card cu-reach-card">
                    <div class="cu-reach-img-wrap">
                        <img src="{{ asset('image/bg.jfif') }}" alt="Nepal landscape" class="cu-reach-img">
                        <div class="cu-reach-overlay">
                            <img src="{{ asset('image/mainlogo.png') }}" alt="NauloYatra" class="cu-reach-logo">
                            <span>NauloYatra</span>
                        </div>
                    </div>

                    <div class="cu-reach-info">
                        <div class="cu-reach-item">
                            <div class="cu-reach-icon" style="background:#fef2f2;color:#d6272b;">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <strong>Office Address</strong>
                                <p>Thamel, Kathmandu, Nepal 44600</p>
                            </div>
                        </div>
                        <div class="cu-reach-item">
                            <div class="cu-reach-icon" style="background:#f0fdf4;color:#16a34a;">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <strong>Phone / WhatsApp</strong>
                                <p>(+977) 98-0000-0000</p>
                            </div>
                        </div>
                        <div class="cu-reach-item">
                            <div class="cu-reach-icon" style="background:#eff6ff;color:#2563eb;">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <strong>Email</strong>
                                <p>info@nauloyatra.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="cu-social-strip">
                        <span>Follow Us</span>
                        <div class="cu-social-links">
                            <a href="#" class="cu-social-btn cu-fb"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="cu-social-btn cu-ig"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="cu-social-btn cu-tw"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="cu-social-btn cu-yt"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Why Contact Us --}}
                <div class="cu-sidebar-card cu-why-card">
                    <h4 class="cu-why-title"><i class="bi bi-star-fill cu-star"></i> Why Contact Us?</h4>
                    <ul class="cu-why-list">
                        <li><i class="bi bi-check-circle-fill"></i> Free customized itinerary planning</li>
                        <li><i class="bi bi-check-circle-fill"></i> Best price guarantee — no hidden fees</li>
                        <li><i class="bi bi-check-circle-fill"></i> Expert local guides from Nepal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 24/7 on-trip emergency support</li>
                        <li><i class="bi bi-check-circle-fill"></i> Flexible booking & free cancellation</li>
                    </ul>
                </div>

            </aside>
        </div>

        {{-- ─── MAP ─── --}}
        <div class="cu-map-wrap">
            <div class="cu-map-label">
                <i class="bi bi-pin-map-fill"></i> Find Us in Thamel, Kathmandu
            </div>
            <div class="cu-map-frame">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.8741565694754!2d85.30620221506277!3d27.715348682789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcb77fd4bd%3A0x58099b903e0517e8!2sThamel%2C%20Kathmandu%2044600%2C%20Nepal!5e0!3m2!1sen!2snp!4v1680000000000!5m2!1sen!2snp"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════
    BOTTOM CTA BANNER
═══════════════════════════════════════════ --}}
<section class="cu-cta-banner">
    <div class="cu-container cu-cta-inner">
        <div>
            <h3>Ready to explore Nepal?</h3>
            <p>Browse our curated packages and find your perfect adventure.</p>
        </div>
        <a href="{{ route('user.travelPackage.show') }}" class="cu-cta-btn">
            Explore Packages <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</section>

@endsection