{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/package.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="modern-hero">
    <div class="container">
        <div class="hero-content text-center">
            <div class="user-badge mb-3">Explore Nepal</div>
            <h1 class="hero-title-premium">Discover Your Next Adventure</h1>
            <p class="hero-subtitle-premium mx-auto">Explore our curated travel packages and experience the roof of the world</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">{{ $travelPackage->count() }}</span>
                    <span class="stat-label">Packages</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number">25+</span>
                    <span class="stat-label">Destinations</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number">5000+</span>
                    <span class="stat-label">Travelers</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="search-section">
    <div class="container">
        <div class="search-layout">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <div class="glass-sidebar">
                    <h3 class="filter-title">
                        <i class="bi bi-funnel text-primary"></i>
                        Filter Tours
                    </h3>
                    
                    <form action="{{ route('user.travelPackage.show') }}" method="get" class="filter-form">
                        @csrf
                        
                        <!-- Price Sort -->
                        <div class="filter-group">
                            <label class="filter-label">
                                <i class="bi bi-currency-dollar"></i>
                                Sort by Price
                            </label>
                            <select name="price" id="price" class="filter-select">
                                <option value="low_to_high">Low to High</option>
                                <option value="high_to_low">High to Low</option>
                            </select>
                        </div>

                        <!-- Date Filter -->
                        <div class="filter-group">
                            <label class="filter-label">
                                <i class="bi bi-calendar3"></i>
                                Travel Dates
                            </label>
                            <input type="date" name="date" id="date" class="filter-input" placeholder="Select date">
                        </div>

                        <!-- Tour Categories -->
                        <div class="filter-group">
                            <label class="filter-label">
                                <i class="bi bi-tag"></i>
                                Tour Categories
                            </label>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" value="Adventure Tour" id="checkbox1">
                                    <span class="checkmark"></span>
                                    Adventure Tour
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" value="Beach Holiday Tour" id="checkbox2">
                                    <span class="checkmark"></span>
                                    Beach Holiday
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" value="Cultural Tour" id="checkbox3">
                                    <span class="checkmark"></span>
                                    Cultural Tour
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" value="Business Trip Tour" id="checkbox4">
                                    <span class="checkmark"></span>
                                    Business Trip
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" value="Wildlife Safaris" id="checkbox5">
                                    <span class="checkmark"></span>
                                    Wildlife Safaris
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn-premium btn-premium-primary w-100 mt-4">
                            <i class="bi bi-search"></i>
                            Search Packages
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Packages Grid -->
            <main class="packages-main">
                <div class="packages-header">
                    <div class="header-left">
                        <h2 class="packages-title">All Packages</h2>
                        <p class="packages-subtitle">Find your perfect adventure</p>
                    </div>
                    <div class="header-actions">
                        <button type="button" id="shareBtn" class="share-btn">
                            <i class="bi bi-share"></i>
                            
                        </button>
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid">
                                <i class="bi bi-grid-3x3-gap"></i>
                            </button>
                            <button class="view-btn" data-view="list">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Packages Grid -->
                <div class="packages-grid" id="packagesGrid">
                    @if ($travelPackage->isNotEmpty())
                        @foreach ($travelPackage as $package)
                            <div class="modern-card">
                                <div class="package-image img-zoom-container">
                                    @if ($package->image_1 != "")
                                        <img src="{{ asset('image/uploads/travelPackage/'.$package->image_1) }}" alt="{{ $package->package_name }}" class="w-100">
                                    @else
                                        <img src="{{ asset('image/uploads/travelPackage/empty-image.png') }}" alt="{{ $package->package_name }}" class="w-100">
                                    @endif
                                    <div class="package-badge">{{ $package->tour_type }}</div>
                                    <div class="package-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>4.5</span>
                                    </div>
                                </div>
                                
                                <div class="package-content">
                                    <div class="package-header-info">
                                        <div class="package-meta">
                                            <span class="duration">
                                                <i class="bi bi-clock"></i>
                                                {{ $package->duration }} Days
                                            </span>
                                            <span class="difficulty">
                                                <i class="bi bi-geo-alt"></i>
                                                Nepal
                                            </span>
                                            <span class="group-size">
                                                <i class="bi bi-people"></i>
                                                2-12 People
                                            </span>
                                        </div>
                                        
                                        <h3 class="package-title">{{ $package->package_name }}</h3>
                                    </div>
                                    
                                    <div class="package-description">
                                        <p>{{ Str::limit(strip_tags($package->overview), 120) }}</p>
                                    </div>
                                    
                                    <div class="package-highlights">
                                        @php
                                            $includedItems = collect(explode("\n", $package->included_things))
                                                ->map(function($item) {
                                                    $item = trim($item);
                                                    $item = preg_replace('/<[^>]*>/', '', $item); // Remove HTML tags
                                                    return $item;
                                                })
                                                ->filter(function($item) {
                                                    return !empty($item) && strlen($item) < 50; // Filter out empty and long items
                                                })
                                                ->take(4); // Take first 4 items
                                        @endphp
                                        
                                        @if($includedItems->count() > 0)
                                            @foreach($includedItems as $item)
                                                <div class="highlight-item">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    <span>{{ Str::limit($item, 25) }}</span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="highlight-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Guided Tours</span>
                                            </div>
                                            <div class="highlight-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Hotel Included</span>
                                            </div>
                                            <div class="highlight-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Transport</span>
                                            </div>
                                            <div class="highlight-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Meals</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="package-footer">
                                        <div class="package-price">
                                            <span class="price-label">From</span>
                                            <div class="price-amount">${{ $package->price_start_from }}</div>
                                            <span class="price-note">per person</span>
                                        </div>
                                        <div class="package-actions">
                                            <a href="{{ route('user.packagePage', $package->id) }}" class="btn-premium btn-premium-primary py-2 px-3">
                                                Details
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                            <button class="wishlist-btn">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-packages">
                            <i class="bi bi-compass"></i>
                            <h3>No packages found</h3>
                            <p>Try adjusting your filters or check back later for new packages.</p>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                @if (method_exists($travelPackage, 'links'))
                    <div class="packages-pagination">
                        {{ $travelPackage->links() }}
                    </div>
                @endif
            </main>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <h3>Get Exclusive Travel Deals</h3>
            <p>Subscribe to our newsletter and receive special offers and travel inspiration</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email" class="newsletter-input">
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Packages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Copy the link below to share our amazing packages:</p>
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
// Copy share URL function
function copyShareUrl() {
    const input = document.getElementById('shareUrl');
    input.select();
    navigator.clipboard.writeText(input.value).then(() => {
        const msg = document.getElementById('copyMsg');
        msg.style.display = 'block';
        setTimeout(() => msg.style.display = 'none', 2000);
    });
}

// View toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.view-btn');
    const packagesGrid = document.getElementById('packagesGrid');
    
    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            viewButtons.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Toggle grid/list view (you can implement this further)
            const view = this.dataset.view;
            if (view === 'list') {
                packagesGrid.style.gridTemplateColumns = '1fr';
            } else {
                packagesGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(320px, 1fr))';
            }
        });
    });
    
    // Share button functionality
    const shareBtn = document.getElementById('shareBtn');
    if (shareBtn) {
        shareBtn.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('shareModal'));
            modal.show();
        });
    }
});
</script>
@endsection
