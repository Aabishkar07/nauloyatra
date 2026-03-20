{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/blog.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title">Tours & Travel Blog</h1>
            <p class="hero-subtitle">Discover captivating stories, local wisdom, and travel inspiration from the pearl of the Indian Ocean</p>
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
                    <span class="stat-label">Travelers</span>
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
                <div class="featured-card">
                    <div class="featured-image">
                        @if ($featured->image != "")
                            <img src="{{ asset('image/uploads/blog/'.$featured->image) }}" alt="{{ $featured->title }}">
                        @else
                            <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $featured->title }}">
                        @endif
                        <div class="featured-badge">Featured</div>
                    </div>
                    <div class="featured-content">
                        <div class="post-meta">
                            <span class="post-date">{{ \Carbon\Carbon::parse($featured->created_at)->format('d M, Y') }}</span>
                            <span class="read-time">5 min read</span>
                        </div>
                        <h2 class="featured-title">{{ $featured->title }}</h2>
                        <p class="featured-excerpt">{{ Str::limit(strip_tags($featured->discription), 150) }}</p>
                        <a href="{{ route('blog.page', $featured->id) }}" class="featured-link">Read Story <i class="bi bi-arrow-right"></i></a>
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
                    <div class="blog-card">
                        <div class="blog-image">
                            @if ($blogPost->image != "")
                                <img src="{{ asset('image/uploads/blog/'.$blogPost->image) }}" alt="{{ $blogPost->title }}">
                            @else
                                <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $blogPost->title }}">
                            @endif
                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <span class="post-date">{{ \Carbon\Carbon::parse($blogPost->created_at)->format('d M, Y') }}</span>
                                <span class="post-category">Travel</span>
                            </div>
                            <h3 class="blog-title">{{ $blogPost->title }}</h3>
                            <p class="blog-excerpt">{{ Str::limit(strip_tags($blogPost->discription), 100) }}</p>
                            <a href="{{ route('blog.page', $blogPost->id) }}" class="blog-link">Read More <i class="bi bi-arrow-right"></i></a>
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