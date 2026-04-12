@extends('layouts/admin-layouts/main-structure')

@section('admincontent')
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h2 class="h3 mb-0 fw-bold text-dark">Blog Posts</h2>
                <p class="text-muted small mb-0 mt-1">Manage and publish your blog content</p>
            </div>
            <a href="{{ route('admin.addBlog.create') }}" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-plus-lg"></i> Create Blog Post
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

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Blog Posts Table / Grid --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-journal-text text-primary"></i>
                    <span>All Blog Posts</span>
                </div>
                <span class="badge bg-primary rounded-pill px-3">{{ $blogs->count() }} Total</span>
            </div>

            @if ($blogs->isNotEmpty())
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">#</th>
                                    <th style="width: 80px;">Image</th>
                                    <th>Title</th>
                                    <th>Published</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $index => $blogPost)
                                    <tr>
                                        <td class="text-muted fw-medium">{{ $index + 1 }}</td>
                                        <td>
                                            @if($blogPost->image != "")
                                                <img src="{{ asset('image/uploads/blog/' . $blogPost->image) }}" alt="Blog Image"
                                                    class="rounded-2" style="width: 52px; height: 40px; object-fit: cover;">
                                            @else
                                                <div class="rounded-2 bg-light d-flex align-items-center justify-content-center"
                                                    style="width: 52px; height: 40px;">
                                                    <i class="bi bi-image text-muted small"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-medium text-dark">{{ $blogPost->title }}</span>
                                        </td>
                                        <td>
                                            <span class="badge-soft-secondary">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                {{ \Carbon\Carbon::parse($blogPost->created_at)->format('M d, Y') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">
                                                <a href="{{ route('admin.editBlog', $blogPost->id) }}"
                                                    class="btn btn-modern btn-modern-primary btn-sm" title="Edit">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <a href="{{ route('blog.page', $blogPost->id) }}"
                                                    class="btn btn-sm btn-outline-secondary rounded-2" target="_blank" title="View">
                                                    <i class="bi bi-box-arrow-up-right"></i>
                                                </a>
                                                <button onclick="deleteBlogPost({{ $blogPost->id }});"
                                                    class="btn btn-sm btn-outline-danger rounded-2" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <form id="delete-blog-from-{{ $blogPost->id }}"
                                                    action="{{ route('admin.destroyBlog', $blogPost->id) }}" method="post"
                                                    class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="admin-card-body text-center py-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3"
                        style="width: 72px; height: 72px;">
                        <i class="bi bi-journal-x text-secondary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-semibold text-dark mb-1">No Blog Posts Yet</h5>
                    <p class="text-muted small mb-0">Click "Create Blog Post" to publish your first article.</p>
                </div>
            @endif
        </div>

    </div>

    <script>
        function deleteBlogPost(id) {
            if (confirm("Are you sure you want to permanently delete this blog post? This action cannot be undone.")) {
                document.getElementById('delete-blog-from-' + id).submit();
            }
        }
    </script>
@endsection