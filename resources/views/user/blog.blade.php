{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/blog.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="modern-hero">
    <div class="container">
        <div class="hero-content text-center">
            <div class="user-badge mb-3">Travel Stories</div>
            <h1 class="hero-title-premium">Stories & Inspiration</h1>
            <p class="hero-subtitle-premium mx-auto">Discover captivating stories, local wisdom, and travel inspiration from the pearl of the Indian Ocean</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">{{ $blogs->count() }}</span>
                    <span class="stat-label">Stories</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number">12+</span>
                    <span class="stat-label">Destinations</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Readers</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="blog-posts">
    <div class="container">
        <!-- Featured Post -->
        @if ($blogs->isNotEmpty())
            <div class="featured-post mb-5">
                @php
                    $featured = $blogs->first();
                @endphp
                <div class="modern-card position-relative p-0 border-0 shadow-lg" style="display: flex; flex-wrap: wrap;">
                    <div class="featured-image img-zoom-container" style="flex: 1; min-width: 300px; height: 400px;">
                        @if ($featured->image != "")
                            <img src="{{ asset('image/uploads/blog/'.$featured->image) }}" alt="{{ $featured->title }}" class="w-100 h-100 object-fit-cover">
                        @else
                            <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $featured->title }}" class="w-100 h-100 object-fit-cover">
                        @endif
                        <div class="featured-badge" style="position: absolute; top: 20px; left: 20px; background: var(--user-primary); color: white; padding: 5px 15px; border-radius: 50px; font-weight: 600;">Featured Story</div>
                    </div>
                    <div class="featured-content p-5" style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                        <div class="post-meta mb-3">
                            <span class="user-badge">{{ \Carbon\Carbon::parse($featured->created_at)->format('d M, Y') }}</span>
                            <span class="ms-3 text-muted"><i class="bi bi-clock me-1"></i> 5 min read</span>
                        </div>
                        <h2 class="featured-title fw-bold mb-3" style="font-size: 2.5rem; letter-spacing: -0.02em;">{{ $featured->title }}</h2>
                        <p class="featured-excerpt text-muted mb-4" style="font-size: 1.1rem;">{{ Str::limit(strip_tags($featured->discription), 200) }}</p>
                        <a href="{{ route('blog.page', $featured->id) }}" class="btn-premium btn-premium-primary stretched-link">
                            Read Full Story <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Blog Grid -->
        <div class="blog-grid">
            @if ($blogs->isNotEmpty())
                @foreach ($blogs as $blogPost)
                    @if ($loop->first)
                        @continue
                    @endif
                    <div class="modern-card position-relative">
                        <div class="blog-image img-zoom-container" style="height: 240px;">
                            @if ($blogPost->image != "")
                                <img src="{{ asset('image/uploads/blog/'.$blogPost->image) }}" alt="{{ $blogPost->title }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $blogPost->title }}" class="w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                        <div class="blog-content p-4">
                            <div class="post-meta mb-3">
                                <span class="text-primary fw-600" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">{{ \Carbon\Carbon::parse($blogPost->created_at)->format('d M, Y') }}</span>
                                <span class="mx-2 text-muted">•</span>
                                <span class="text-muted" style="font-size: 0.85rem;">Travel</span>
                            </div>
                            <h3 class="blog-title fw-bold mb-3" style="font-size: 1.25rem;">{{ $blogPost->title }}</h3>
                            <p class="blog-excerpt text-muted mb-4">{{ Str::limit(strip_tags($blogPost->discription), 120) }}</p>
                            <a href="{{ route('blog.page', $blogPost->id) }}" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2 stretched-link" style="font-size: 0.9rem;">
                                Read More <i class="bi bi-arrow-right text-primary"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-posts">
                    <i class="bi bi-journal-text"></i>
                    <h3>No blog posts yet</h3>
                    <p>Stay tuned for amazing travel stories and tips!</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection