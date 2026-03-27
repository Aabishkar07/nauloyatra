@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h2 class="h3 mb-0 fw-bold text-dark">Messages</h2>
            <p class="text-muted small mb-0 mt-1">Manage customer inquiries and messages</p>
        </div>
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

    {{-- Messages Table --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-inbox text-primary"></i>
                <span>Inbox</span>
            </div>
            <span class="badge bg-primary rounded-pill px-3">{{ $user_massages->count() }} Messages</span>
        </div>

        @if ($user_massages->isNotEmpty())
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Sender</th>
                                <th>Subject</th>
                                <th>Email</th>
                                <th>Received</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_massages as $key => $massage)
                                <tr>
                                    <td class="text-muted fw-medium">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                                                 style="width: 36px; height: 36px;">
                                                <i class="bi bi-person-fill text-primary small"></i>
                                            </div>
                                            <span class="fw-medium text-dark">{{ $massage->user_name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-link p-0 text-start text-dark fw-medium text-decoration-none small"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#message-body-{{ $key }}"
                                                style="max-width: 260px;">
                                            <span class="d-block text-truncate">{{ $massage->subject }}</span>
                                            <small class="text-muted fw-normal">Click to read</small>
                                        </button>
                                        {{-- Inline message preview --}}
                                        <div id="message-body-{{ $key }}" class="collapse mt-2">
                                            <div class="rounded-3 border bg-light p-3 small text-dark" style="white-space: pre-wrap; max-width: 420px;">{{ $massage->discription }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $massage->email }}" class="text-decoration-none text-muted small">
                                            <i class="bi bi-envelope me-1"></i>{{ $massage->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text-muted small">
                                            {{ \Carbon\Carbon::parse($massage->created_at)->format('M d, Y') }}<br>
                                            <span class="text-muted" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($massage->created_at)->format('g:i A') }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-end">
                                            <a href="mailto:{{ $massage->email }}?subject=Re: {{ $massage->subject }}"
                                               class="btn btn-modern btn-modern-primary btn-sm" title="Reply">
                                                <i class="bi bi-reply-fill"></i> Reply
                                            </a>
                                            <button onclick="deleteUserMassage({{ $massage->id }});"
                                                    class="btn btn-sm btn-outline-danger rounded-2" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <form id="massage-id-{{ $massage->id }}"
                                                  action="{{ route('admin.massage.delete', $massage->id) }}"
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
                <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3" style="width: 72px; height: 72px;">
                    <i class="bi bi-inbox text-secondary" style="font-size: 2rem;"></i>
                </div>
                <h5 class="fw-semibold text-dark mb-1">No Messages</h5>
                <p class="text-muted small mb-0">You do not have any customer messages at the moment.</p>
            </div>
        @endif
    </div>

</div>

<script>
function deleteUserMassage(id) {
    if (confirm("Are you sure you want to permanently delete this message?")) {
        document.getElementById('massage-id-' + id).submit();
    }
}
</script>
@endsection
