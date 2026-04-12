@if ($travelPackage->isNotEmpty())  
    @foreach ($travelPackage as $package)  
    <div class="col-lg-4 col-xl-3">
        <div class="package-card">
            <div class="position-relative overflow-hidden" style="height: 200px;">
                @if ($package->image_1 != "")
                    <img src="{{ asset('image/uploads/travelPackage/'.$package->image_1) }}" class="package-image w-100 h-100" alt="Package Image">
                @else
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                        <i class="bi bi-image text-secondary" style="font-size: 3rem;"></i>
                    </div>
                @endif
                <div class="package-badge price-badge">
                    <i class="bi bi-currency-dollar me-1"></i>{{ $package->price_start_from }}
                </div>
                <div class="package-badge type-badge" style="top: 50px;">
                    <i class="bi bi-geo-alt me-1"></i>{{ $package->tour_type }}
                </div>
            </div>
            <div class="card-body p-4">
                <p class="text-muted small mb-2">
                    <i class="bi bi-calendar3 me-1"></i>Created: {{ \Carbon\Carbon::parse($package->created_at)->format('M d, Y') }}
                </p>
                <h5 class="card-title fw-bold mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 3rem;">
                    {{ $package->package_name }}
                </h5>
                
                <div class="action-buttons">
                    <a href="{{route('admin.editTravelPackage',$package->id)}}" class="btn btn-outline-primary flex-grow-1">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{route('user.packagePage', $package->id)}}" class="btn btn-outline-primary" target="_blank" title="View Details">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                    <button onclick="deleteTravelPackage({{ $package->id}});" class="btn btn-outline-danger" title="Delete Package">
                        <i class="bi bi-trash"></i>
                    </button>
                    <form id="delete-travelPackage-from-{{ $package->id }}" action="{{route('admin.deleteTravelPackage', $package->id)}}" method="post" class="d-none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="col-12">
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-luggage"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">No Travel Packages Found</h4>
            <p class="text-muted mb-0">It looks like you haven't created any travel packages yet. Click "Create Travel Package" above to get started.</p>
        </div>
    </div>
@endif
