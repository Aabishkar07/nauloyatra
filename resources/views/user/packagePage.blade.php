{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&family=DM+Serif+Display&display=swap');

  :root {
    --ink:     #1c1c1e;
    --muted:   #6b7280;
    --line:    #e5e7eb;
    --surface: #f9fafb;
    --accent:  #2563eb;
    --green:   #16a34a;
    --r:       8px;
  }

  /* ─── base ─────────────────────────────────────────── */
  .pkg-page { font-family:'DM Sans',sans-serif; color:var(--ink); margin-top:100px; padding-bottom:80px; }

  /* ─── breadcrumb ────────────────────────────────────── */
  .bc { display:flex; align-items:center; gap:6px; font-size:.8rem; color:var(--muted); margin-bottom:22px; flex-wrap:wrap; }
  .bc a { color:var(--muted); text-decoration:none; display:inline-flex; align-items:center; gap:5px; transition:color .2s; }
  .bc a:hover { color:var(--accent); }
  .bc-sep { color:#d1d5db; }

  /* ─── title row ─────────────────────────────────────── */
  .pkg-title { font-family:'DM Serif Display',serif; font-size:clamp(1.4rem,3vw,2rem); font-weight:400; line-height:1.25; margin-bottom:4px; }
  .pkg-sub   { font-size:.875rem; color:var(--muted); margin-bottom:0; font-style:italic; }

  /* ─── action buttons ────────────────────────────────── */
  .btn-wa    { background:#25d366; color:#fff; border:none; border-radius:var(--r); padding:8px 16px; font-size:.82rem; font-weight:500; display:inline-flex; align-items:center; gap:6px; cursor:pointer; font-family:inherit; transition:opacity .2s; white-space:nowrap; }
  .btn-wa:hover { opacity:.85; color:#fff; }
  .btn-share { background:#fff; color:var(--ink); border:1px solid var(--line); border-radius:var(--r); padding:8px 16px; font-size:.82rem; font-weight:500; display:inline-flex; align-items:center; gap:6px; cursor:pointer; font-family:inherit; transition:border-color .2s,color .2s; white-space:nowrap; }
  .btn-share:hover { border-color:var(--accent); color:var(--accent); }

  /* ─── hero images ───────────────────────────────────── */
  .hero-grid { display:grid; grid-template-columns:2fr 1fr; grid-template-rows:185px 185px; gap:6px; border-radius:var(--r); overflow:hidden; margin:20px 0 36px; }
  .hero-main { grid-row:span 2; overflow:hidden; }
  .hero-side { overflow:hidden; }
  .hero-grid img { width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s ease; }
  .hero-grid img:hover { transform:scale(1.04); }
  @media(max-width:576px){
    .hero-grid { grid-template-columns:1fr; grid-template-rows:200px 130px 130px; height:auto; }
    .hero-main  { grid-row:auto; }
  }

  /* ─── dividers ──────────────────────────────────────── */
  .thin-hr { border:none; border-top:1px solid var(--line); margin:36px 0; }

  /* ─── section label ─────────────────────────────────── */
  .sec-label { font-size:.7rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:var(--muted); margin-bottom:10px; }

  /* ─── snapshot strip ────────────────────────────────── */
  .snap-strip { display:flex; border:1px solid var(--line); border-radius:var(--r); background:#fff; overflow:hidden; margin-bottom:36px; }
  .snap-item  { flex:1; padding:16px 20px; }
  .snap-item+.snap-item { border-left:1px solid var(--line); }
  .snap-val { font-size:1rem; font-weight:600; color:var(--ink); }
  .snap-key { font-size:.75rem; color:var(--muted); margin-top:3px; }
  @media(max-width:576px){
    .snap-strip { flex-direction:column; }
    .snap-item+.snap-item { border-left:none; border-top:1px solid var(--line); }
  }

  /* ─── overview ──────────────────────────────────────── */
  .overview-text { font-size:.9rem; color:#374151; line-height:1.85; }

  /* ─── includes box ──────────────────────────────────── */
  .inc-box { background:#fff; border:1px solid var(--line); border-radius:var(--r); padding:18px 22px; font-size:.875rem; line-height:1.8; }

  /* ─── notice ────────────────────────────────────────── */
  .notice-box { background:#eff6ff; border-left:3px solid var(--accent); border-radius:var(--r); padding:14px 18px; font-size:.83rem; color:#1e40af; line-height:1.7; }
  .notice-box ul { margin:6px 0 0; padding-left:18px; }

  /* ─── tour plan ─────────────────────────────────────── */
  .plan-box { background:#fff; border:1px solid var(--line); border-radius:var(--r); padding:20px 22px; font-size:.875rem; line-height:1.85; }
  .wa-cta   { display:flex; align-items:center; justify-content:space-between; gap:12px; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:var(--r); padding:16px 20px; margin-top:12px; }
  .wa-cta-t { font-size:.875rem; font-weight:500; color:#166534; }
  .wa-cta-s { font-size:.76rem; color:#4ade80; }

  /* ─── auth alert ────────────────────────────────────── */
  .auth-alert { background:#fff7ed; border:1px solid #fed7aa; border-radius:var(--r); padding:12px 18px; font-size:.83rem; color:#92400e; margin-bottom:20px; }
  .auth-alert a { color:var(--accent); font-weight:600; }

  /* ─── booking card ──────────────────────────────────── */
  .book-card   { background:#fff; border:1px solid var(--line); border-radius:var(--r); overflow:hidden; }
  .book-header { padding:16px 24px; border-bottom:1px solid var(--line); display:flex; align-items:baseline; justify-content:space-between; flex-wrap:wrap; gap:4px; }
  .book-title  { font-weight:600; font-size:.93rem; }
  .book-sub    { font-size:.75rem; color:var(--muted); }
  .book-body   { padding:24px; }

  /* form inputs */
  .f-label   { display:block; font-size:.73rem; font-weight:600; letter-spacing:.05em; text-transform:uppercase; color:var(--muted); margin-bottom:5px; }
  .f-control { width:100%; border:1px solid var(--line); border-radius:6px; padding:9px 12px; font-size:.875rem; color:var(--ink); font-family:inherit; background:#fff; transition:border-color .2s,box-shadow .2s; outline:none; }
  .f-control:focus { border-color:var(--accent); box-shadow:0 0 0 3px rgba(37,99,235,.08); }
  textarea.f-control { resize:none; }

  /* price rows */
  .price-row        { display:flex; justify-content:space-between; align-items:center; padding:10px 14px; border-radius:6px; font-size:.875rem; margin-bottom:6px; }
  .price-row.base   { background:var(--surface); border:1px solid var(--line); color:var(--muted); }
  .price-row.total  { background:var(--ink); color:#fff; font-weight:600; }
  .price-row.total input { background:transparent; border:none; color:#fff; font-weight:600; font-size:.875rem; text-align:right; width:110px; outline:none; font-family:inherit; }

  /* submit buttons */
  .btn-book  { width:100%; padding:11px; background:var(--accent); color:#fff; border:none; border-radius:6px; font-size:.9rem; font-weight:600; cursor:pointer; font-family:inherit; letter-spacing:.01em; transition:background .2s; }
  .btn-book:hover { background:#1d4ed8; }
  .btn-login { display:block; width:100%; padding:11px; background:var(--ink); color:#fff; border:none; border-radius:6px; font-size:.9rem; font-weight:600; text-align:center; text-decoration:none; font-family:inherit; transition:opacity .2s; }
  .btn-login:hover { opacity:.82; color:#fff; }
  .cancel-note { font-size:.75rem; color:var(--muted); text-align:center; margin-top:10px; margin-bottom:0; }

  /* ─── share modal ───────────────────────────────────── */
  .modal-content { border:1px solid var(--line); border-radius:var(--r); box-shadow:0 8px 32px rgba(0,0,0,.1); }
  .share-input-wrap { display:flex; border:1px solid var(--line); border-radius:6px; overflow:hidden; }
  .share-input-wrap input { flex:1; border:none; padding:8px 12px; font-size:.8rem; outline:none; font-family:inherit; color:var(--ink); }
  .share-copy-btn { background:var(--ink); color:#fff; border:none; padding:8px 16px; font-size:.8rem; cursor:pointer; font-family:inherit; transition:background .2s; }
  .share-copy-btn:hover { background:var(--accent); }
</style>

<div class="container pkg-page">

  {{-- ══ Alerts ══════════════════════════════════════════════════════ --}}
  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show rounded-2 mb-4" style="font-size:.85rem" role="alert">
      <strong>Please fix the following:</strong>
      <ul class="mb-0 mt-1 ps-3">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        <li class="fw-light" style="color:#6b7280">Please try again.</li>
      </ul>
      <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-2 mb-4" style="font-size:.85rem" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- ══ Breadcrumb ══════════════════════════════════════════════════ --}}
  <nav class="bc" aria-label="breadcrumb">
    <a href="{{ route('user.travelPackage.show') }}">
      <img src="{{ asset('image/help-tools/home.svg') }}" width="14" alt="home">
      All Packages
    </a>
    <span class="bc-sep">›</span>
    <span>{{ $travelPackage->package_name }}</span>
  </nav>

  {{-- ══ Title Row ═══════════════════════════════════════════════════ --}}
  <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-2">
    <div>
      <h1 class="pkg-title">{{ $travelPackage->tour_type }} — {{ $travelPackage->package_name }}</h1>
      <p class="pkg-sub">Discover {{ $travelPackage->package_name }}</p>
    </div>
    <div class="d-flex gap-2 mt-1 flex-wrap">
      <button type="button" class="btn-wa">
        <img src="{{ asset('image/help-tools/whatsapp.svg') }}" width="15" alt="whatsapp"> Contact Us
      </button>
      <button type="button" class="btn-share" data-bs-toggle="modal" data-bs-target="#shareModal">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/>
          <path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98"/>
        </svg>
        Share
      </button>
    </div>
  </div>

  {{-- ══ Hero Images ═════════════════════════════════════════════════ --}}
  <div class="hero-grid">
    <div class="hero-main">
      @if ($travelPackage->image_1 != "")
        <img src="{{ asset('image/uploads/travelPackage/'.$travelPackage->image_1) }}" alt="image 1">
      @else
        <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="no image">
      @endif
    </div>
    <div class="hero-side">
      @if ($travelPackage->image_2 != "")
        <img src="{{ asset('image/uploads/travelPackage/'.$travelPackage->image_2) }}" alt="image 2">
      @else
        <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="no image">
      @endif
    </div>
    <div class="hero-side">
      @if ($travelPackage->image_3 != "")
        <img src="{{ asset('image/uploads/travelPackage/'.$travelPackage->image_3) }}" alt="image 3">
      @else
        <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="no image">
      @endif
    </div>
  </div>

  {{-- ══ Tour Snapshot ═══════════════════════════════════════════════ --}}
  <div class="sec-label">Tour at a glance</div>
  <div class="snap-strip">
    <div class="snap-item">
      <div class="d-flex align-items-center gap-2 mb-1">
        <img src="{{ asset('image/help-tools/clock.svg') }}" width="16" alt="clock">
        <span class="snap-key" style="margin:0">Duration</span>
      </div>
      <div class="snap-val">{{ $travelPackage->duration }} Days</div>
    </div>
    <div class="snap-item">
      <div class="d-flex align-items-center gap-2 mb-1">
        <img src="{{ asset('image/help-tools/group.svg') }}" width="16" alt="group">
        <span class="snap-key" style="margin:0">Tour Type</span>
      </div>
      <div class="snap-val">{{ $travelPackage->tour_type }}</div>
    </div>
    <div class="snap-item">
      <div class="d-flex align-items-center gap-2 mb-1">
        <img src="{{ asset('image/help-tools/doller.svg') }}" width="16" alt="price">
        <span class="snap-key" style="margin:0">Starting Price</span>
      </div>
      <div class="snap-val">${{ $travelPackage->price_start_from }}</div>
    </div>
  </div>

  <hr class="thin-hr">

  {{-- ══ Overview ════════════════════════════════════════════════════ --}}
  <div class="row g-5 mb-2">
    <div class="col-lg-6">
      <div class="sec-label">Overview</div>
      <p class="overview-text">{{ $travelPackage->overview }}</p>
    </div>

    {{-- ══ Price Includes ══════════════════════════════════════════ --}}
    <div class="col-lg-6">
      <div class="sec-label">Price Includes</div>
      <div class="inc-box">
        {!! $travelPackage->included_things !!}
      </div>
    </div>
  </div>

  <hr class="thin-hr">

  {{-- ══ Important Notice ════════════════════════════════════════════ --}}
  <div class="notice-box mb-5">
    <strong>Good to know before booking</strong>
    <ul>
      <li>If you have additional requests (change of accommodation, mode of transport, etc.), you can specify them during the booking process.</li>
      <li>Once the booking is complete, an invoice will be sent including all prices.</li>
      <li>After reviewing the invoice, you can proceed with payment for your reservation.</li>
    </ul>
  </div>

  {{-- hidden SVG symbols (kept for Bootstrap icon compatibility) --}}
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="info-fill" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="check-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>

  {{-- ══ Tour Plan ═══════════════════════════════════════════════════ --}}
  <div class="row g-4 mb-5">
    <div class="col-lg-7">
      <div class="sec-label">Tour Plan</div>
      <div class="plan-box">
        {!! $travelPackage->tour_plane_description !!}
      </div>

      {{-- WhatsApp CTA --}}
      <div class="wa-cta">
        <div>
          <div class="wa-cta-t">Personalize Your Tour Itinerary</div>
          <div class="wa-cta-s">Connect with our team on WhatsApp</div>
        </div>
        <img src="{{ asset('image/help-tools/whatsapp.svg') }}" width="30" alt="WhatsApp">
      </div>
    </div>
    <div class="col-lg-5">
      {{-- reserved for future images/content --}}
    </div>
  </div>

  <hr class="thin-hr">

  {{-- ══ Auth Warning ════════════════════════════════════════════════ --}}
  @auth
  @else
    <div class="auth-alert">
      Please <a href="{{ route('login') }}">log in to your account</a> before booking your travel package.
    </div>
  @endauth

  {{-- ══ Booking Form ════════════════════════════════════════════════ --}}
  <div class="book-card">
    <div class="book-header">
      <span class="book-title">Reserve Your Spot</span>
      <span class="book-sub">Payment only after you review your invoice &nbsp;·&nbsp; Free cancellation within 24 h</span>
    </div>
    <div class="book-body">
      <form action="{{ route('user.booking.store') }}" method="post">
        @csrf
        <input type="hidden" name="package_id" value="{{ $travelPackage->id }}">

        <div class="row g-4">

          {{-- Left: dates & pricing ── --}}
          <div class="col-md-6">

            {{-- Arrival Date --}}
            <div class="mb-3">
              <label class="f-label">Arrival Date *</label>
              <input type="date" name="date" class="f-control" required>
            </div>

            {{-- Adults --}}
            <div class="mb-3">
              <label class="f-label">
                Adults (Age 18+)
                <span style="font-weight:400;text-transform:none;letter-spacing:0;color:#374151"> — ${{ $travelPackage->per_adult_fee }} / person</span>
              </label>
              <input type="number" id="adults" name="number_of_adult" min="0" value=""
                     oninput="updateTotalPrice()" class="f-control" placeholder="0" required>
            </div>

            {{-- Children --}}
            <div class="mb-4">
              <label class="f-label">
                Children (Age 6–12)
                <span style="font-weight:400;text-transform:none;letter-spacing:0;color:#374151"> — ${{ $travelPackage->per_child_fee }} / person</span>
              </label>
              <input type="number" id="children" name="number_of_child" min="0" value=""
                     oninput="updateTotalPrice()" class="f-control" placeholder="0" required>
            </div>

            {{-- Price rows --}}
            <div class="price-row base">
              <span>Base Price</span>
              <span>${{ $travelPackage->price_start_from }}</span>
            </div>
            <div class="price-row total">
              <span>Total (USD)</span>
              <input type="number" id="totalPrice" name="total_fee" value="{{ $travelPackage->price_start_from }}" readonly>
            </div>
          </div>

          {{-- Right: pickup & notes ── --}}
          <div class="col-md-6">

            <div class="mb-3">
              <label class="f-label">Where do you meet to start the tour?</label>
              <select name="pick_up_location" class="f-control">
                <option selected>From Hotel</option>
                <option>From Airport</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="f-label">Hotel / Airport Details</label>
              <textarea name="pick_up_location_details" class="f-control" rows="6"
                        placeholder="Enter your hotel name, address, or airport terminal…"></textarea>
            </div>

            <div class="notice-box" style="font-size:.78rem;">
              The booking can be paid after viewing the invoice.
            </div>
          </div>
        </div>

        {{-- CTA ── --}}
        <div class="mt-4" style="max-width:320px; margin-left:auto;">
          @auth
            <button type="submit" class="btn-book">Book Now</button>
          @else
            <a href="{{ route('login') }}" class="btn-login">Log In to Book</a>
          @endauth
          <p class="cancel-note">Not sure? You can cancel this reservation up to 24 hours.<br>Paying back &nbsp;·&nbsp; Contact us.</p>
        </div>

      </form>
    </div>
  </div>

</div>{{-- /container --}}

{{-- ══ Share Modal ════════════════════════════════════════════════════ --}}
<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width:400px">
    <div class="modal-content">
      <div class="modal-header border-0 pb-1">
        <h6 class="modal-title fw-semibold" style="font-size:.9rem;">Share this Package</h6>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-1 pb-4">
        <p style="font-size:.78rem;color:var(--muted);margin-bottom:10px">Copy the link below to share:</p>
        <div class="share-input-wrap">
          <input type="text" id="shareUrl" value="{{ url()->current() }}" readonly>
          <button class="share-copy-btn" onclick="copyShareUrl()">Copy</button>
        </div>
        <p id="copyMsg" class="d-none mt-2" style="font-size:.75rem;color:#16a34a;">✓ Copied to clipboard</p>
      </div>
    </div>
  </div>
</div>

{{-- ══ Scripts ═════════════════════════════════════════════════════════ --}}
<script>
  const startFee    = {{ $travelPackage->price_start_from }};
  const perAdultFee = {{ $travelPackage->per_adult_fee }};
  const perChildFee = {{ $travelPackage->per_child_fee }};

  function updateTotalPrice() {
    const adults   = parseInt(document.getElementById('adults').value)   || 0;
    const children = parseInt(document.getElementById('children').value) || 0;
    const total    = startFee + (adults * perAdultFee) + (children * perChildFee);
    document.getElementById('totalPrice').value = total.toFixed(2);
  }

  function copyShareUrl() {
    const el = document.getElementById('shareUrl');
    el.select();
    navigator.clipboard.writeText(el.value).then(() => {
      const msg = document.getElementById('copyMsg');
      msg.classList.remove('d-none');
      setTimeout(() => msg.classList.add('d-none'), 2500);
    });
  }
</script>

@endsection
