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
<section class="article-header py-5" style="background: var(--user-gray-soft); margin-top: 100px;">
    <div class="container">
        <div class="user-badge mb-3">Travel Journal</div>
        <h1 class="display-3 fw-bold mb-4" style="letter-spacing: -0.04em; color: var(--user-dark); line-height: 1.1;">{{ $blog->title }}</h1>
        <div class="article-meta d-flex align-items-center gap-4 text-muted border-top pt-4">
            <span><i class="bi bi-calendar3 me-2 text-primary"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</span>
            <span><i class="bi bi-clock me-2 text-primary"></i> 5 min read</span>
            <span class="ms-auto"><i class="bi bi-tag me-2 text-primary"></i> Travel Story</span>
        </div>
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
                        <a href="#" class="tag">Nepal</a>
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
                <div class="modern-card p-4 author-card shadow-sm">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="author-avatar" style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden;">
                            <img src="{{ asset('image/uploads/blog/author-avatar.png') }}" alt="Author" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div>
                            <h4 class="h6 fw-bold mb-1">Travel Expert</h4>
                            <p class="small text-muted mb-0">NauloYatra Guide</p>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">Sharing stories and insights from the breathtaking mountains of Nepal.</p>
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
                <div class="modern-card p-4 categories shadow-sm mt-4">
                    <h3 class="h6 fw-bold mb-3 text-uppercase" style="letter-spacing: 0.05em;">Categories</h3>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 pb-2 border-bottom"><a href="#" class="text-decoration-none text-muted d-flex justify-content-between small">Travel Stories <span>(12)</span></a></li>
                        <li class="mb-2 pb-2 border-bottom"><a href="#" class="text-decoration-none text-muted d-flex justify-content-between small">Culture <span>(8)</span></a></li>
                        <li class="mb-0"><a href="#" class="text-decoration-none text-muted d-flex justify-content-between small">Adventure <span>(15)</span></a></li>
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
        <div class="related-grid row g-4">
            @if (isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
                @foreach ($relatedBlogs->take(3) as $related)
                    <div class="col-md-4">
                        <div class="modern-card">
                            <div class="related-image img-zoom-container" style="height: 200px;">
                                @if ($related->image != "")
                                    <img src="{{ asset('image/uploads/blog/'.$related->image) }}" alt="{{ $related->title }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <img src="{{ asset('image/uploads/blog/empty-image.png') }}" alt="{{ $related->title }}" class="w-100 h-100 object-fit-cover">
                                @endif
                            </div>
                            <div class="related-content p-4">
                                <h4 class="h6 fw-bold mb-2">{{ $related->title }}</h4>
                                <p class="small text-muted mb-3">{{ \Carbon\Carbon::parse($related->created_at)->format('d M, Y') }}</p>
                                <a href="{{ route('blog.page', $related->id) }}" class="text-decoration-none small fw-bold text-primary">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
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