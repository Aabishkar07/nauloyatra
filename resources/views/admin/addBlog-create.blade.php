@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
<div class="container-fluid">
    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h2 class="h3 mb-0 fw-bold text-dark">Create Blog Post</h2>
            <p class="text-muted small mb-0 mt-1">Write and publish a new article</p>
        </div>
        <a href="{{ route('admin.addBlog') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Blog Posts
        </a>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-exclamation-triangle-fill fs-5 mt-1"></i>
                <div>
                    <strong class="d-block mb-1">Please fix the following errors:</strong>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.add.blog') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="row g-4">
            <div class="col-xl-8">
                <!-- Blog Content Card -->
                <div class="admin-card">
                    <div class="admin-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square text-primary"></i>
                            <span>Blog Content</span>
                        </div>
                    </div>
                    <div class="admin-card-body">
                        <div class="mb-4">
                            <label for="blogTitle" class="form-label fw-bold">Post Title <span class="text-danger">*</span></label>
                            <input type="text" name="blogTitle" value="{{ old('blogTitle') }}" 
                                   class="form-control-modern" id="blogTitle" 
                                   placeholder="Enter an engaging title for your post">
                        </div>
                        
                        <div class="mb-0">
                            <label for="blogDescription" class="form-label fw-bold">Description / Content <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control-modern" id="blogDescription" rows="15" 
                                      placeholder="Write your blog content here...">{{ old('description') }}</textarea>
                            <div class="mt-2 small text-info">
                                <i class="bi bi-info-circle me-1"></i> Press <code>Windows + .</code> to add emojis inside the editor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4">
                <!-- Media Card -->
                <div class="admin-card mb-4 mt-xl-0">
                    <div class="admin-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-image text-primary"></i>
                            <span>Cover Image</span>
                        </div>
                    </div>
                    <div class="admin-card-body">
                        <div class="mb-3">
                            <label for="blogImage" class="form-label fw-bold small text-muted">Feature Image</label>
                            <input type="file" name="blogImage" class="form-control-modern" id="blogImage">
                            <div class="mt-2 text-muted small">
                                Recommended size: 1200x630px. Max size: 10MB.
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Actions Card -->
                <div class="admin-card sticky-top" style="top: 2rem; z-index: 10;">
                    <div class="admin-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-send text-primary"></i>
                            <span>Publishing</span>
                        </div>
                    </div>
                    <div class="admin-card-body d-grid gap-3">
                        <button type="submit" class="btn btn-modern btn-modern-primary btn-lg">
                            <i class="bi bi-cloud-arrow-up-fill me-2"></i> Publish Post
                        </button>
                        <a href="{{ route('admin.addBlog') }}" class="btn btn-outline-secondary btn-modern">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
