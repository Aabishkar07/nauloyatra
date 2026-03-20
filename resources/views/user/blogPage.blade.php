{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts/mainStructure')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user_css/blog.css') }}">
@endsection

@section('content')
<!-- Breadcrumb -->
<div class="blog-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="breadcrumb-item active">{{ $blog->title }}</li>
            </ol> -->
        </nav>
    </div>
</div>

<!-- Article Header -->
<section class="article-header">
    <div class="container">
        <div class="article-meta mt-3">
            <span class="article-date">
                <i class="bi bi-calendar3"></i>
                {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
            </span>
            <span class="article-category">
                <i class="bi bi-tag"></i>
                Travel Story
            </span>
            <span class="read-time">
                <i class="bi bi-clock"></i>
                5 min read
            </span>
        </div>
        <h1 class="article-title">{{ $blog->title }}</h1>
        <p class="article-subtitle">A journey through the wonders of Sri Lanka</p>
    </div>
</section>

<!-- Article Content -->
<article class="article-content">
    <div class="container">
        <div class="article-layout">
            <!-- Main Content -->
            <div class="article-main">
                <!-- Featured Image -->
                <div class="article-image">
                    @if ($blog->image != "")
                        <img src="{{ asset('image/uploads/blog/'.$blog->image) }}" alt="{{ $blog->title }}">
                    @else
                        <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $blog->title }}">
                    @endif
                </div>

                <!-- Article Body -->
                <div class="article-body">
                    <div class="article-text">
                        {!! $blog->discription !!}
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="article-footer">
                    <div class="article-tags">
                        <span class="tag-title">Tags:</span>
                        <a href="#" class="tag">Sri Lanka</a>
                        <a href="#" class="tag">Travel</a>
                        <a href="#" class="tag">Adventure</a>
                        <a href="#" class="tag">Culture</a>
                    </div>
                    
                    <div class="article-share">
                        <span class="share-title">Share this story:</span>
                        <div class="share-buttons">
                            <a href="#" class="share-btn facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="share-btn twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="share-btn whatsapp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="#" class="share-btn linkedin">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="article-sidebar">
                <!-- Author Info -->
                <div class="sidebar-card author-card">
                    <div class="author-avatar">
                        <img src="{{ asset('image/uploads/blog/author-avatar.png') }}" alt="Author">
                    </div>
                    <div class="author-info">
                        <h4>Travel Expert</h4>
                        <p>Sharing stories and insights from the beautiful island of Sri Lanka</p>
                    </div>
                </div>

                <!-- Recent Posts -->
                <div class="sidebar-card recent-posts">
                    <h3>Recent Stories</h3>
                    <div class="recent-post-list">
                        @if (isset($recentBlogs) && $recentBlogs->isNotEmpty())
                            @foreach ($recentBlogs->take(3) as $recent)
                                <a href="{{ route('blog.page', $recent->id) }}" class="recent-post-item">
                                    <div class="recent-post-image">
                                        @if ($recent->image != "")
                                            <img src="{{ asset('image/uploads/blog/'.$recent->image) }}" alt="{{ $recent->title }}">
                                        @else
                                            <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $recent->title }}">
                                        @endif
                                    </div>
                                    <div class="recent-post-content">
                                        <h4>{{ $recent->title }}</h4>
                                        <span class="recent-post-date">{{ \Carbon\Carbon::parse($recent->created_at)->format('d M, Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Categories -->
                <div class="sidebar-card categories">
                    <h3>Categories</h3>
                    <ul class="category-list">
                        <li><a href="#">Travel Stories <span>(12)</span></a></li>
                        <li><a href="#">Culture & Heritage <span>(8)</span></a></li>
                        <li><a href="#">Adventure <span>(15)</span></a></li>
                        <li><a href="#">Food & Cuisine <span>(6)</span></a></li>
                        <li><a href="#">Beaches <span>(9)</span></a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</article>

<!-- Related Posts -->
<section class="related-posts">
    <div class="container">
        <h2 class="section-title">More Stories You Might Like</h2>
        <div class="related-grid">
            @if (isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
                @foreach ($relatedBlogs->take(3) as $related)
                    <div class="related-card">
                        <div class="related-image">
                            @if ($related->image != "")
                                <img src="{{ asset('image/uploads/blog/'.$related->image) }}" alt="{{ $related->title }}">
                            @else
                                <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $related->title }}">
                            @endif
                        </div>
                        <div class="related-content">
                            <h4>{{ $related->title }}</h4>
                            <p>{{ \Carbon\Carbon::parse($related->created_at)->format('d M, Y') }}</p>
                            <a href="{{ route('blog.page', $related->id) }}" class="related-link">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Back to Blog -->
<div class="back-to-blog">
    <div class="container">
        <a href="{{ route('blog') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to All Stories
        </a>
    </div>
</div>
@endsection