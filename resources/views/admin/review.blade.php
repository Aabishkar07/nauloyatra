@extends('layouts/admin-layouts/main-structure')

@section('admincontent')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h2 class="h3 mb-0 fw-bold text-dark">Reviews</h2>
            <p class="text-muted small mb-0 mt-1">Customer reviews and ratings</p>
        </div>
    </div>

    {{-- Alerts --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Reviews Table --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-star text-primary"></i>
                <span>All Reviews</span>
            </div>
            <span class="badge bg-primary rounded-pill px-3">{{ $reviews->count() }} Total</span>
        </div>

        @if ($reviews->isNotEmpty())
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Customer</th>
                                <th>Country</th>
                                <th>Review</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $index => $review)
                                <tr>
                                    <td class="text-muted fw-medium">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                                                style="width: 36px; height: 36px;">
                                                <i class="bi bi-person-fill text-primary small"></i>
                                            </div>
                                            <span class="fw-medium text-dark">{{ $review->user_name ?? '—' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if($review->user_counrty)
                                            <span class="badge-soft-secondary">
                                                <i class="bi bi-geo-alt me-1"></i>{{ $review->user_counrty }}
                                            </span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-0 text-dark small" style="max-width: 380px;">
                                            {{ \Str::limit($review->user_discription, 120) }}
                                        </p>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <button onclick="deleteReview({{ $review->id }});"
                                                class="btn btn-sm btn-outline-danger rounded-2" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <form id="delete-review-{{ $review->id }}"
                                                action="{{ route('admin.review.delete', $review->id) }}"
                                                method="post" class="d-none">
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
                    <i class="bi bi-star text-secondary" style="font-size: 2rem;"></i>
                </div>
                <h5 class="fw-semibold text-dark mb-1">No Reviews Yet</h5>
                <p class="text-muted small mb-0">Customer reviews will appear here once submitted.</p>
            </div>
        @endif
    </div>

</div>

<script>
function deleteReview(id) {
    if (confirm("Are you sure you want to delete this review? This action cannot be undone.")) {
        document.getElementById('delete-review-' + id).submit();
    }
}
</script>
@endsection