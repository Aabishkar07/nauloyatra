@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
    <main class="ms-sm-auto px-md-4 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
            <div>
                <h2 class="h3 mb-0 text-gray-800">Add New Travel Package</h2>
            </div>
            <div>
                <a href="{{route('admin.travelPackage.show')}}" class="btn btn-outline-secondary shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>

        {{-- To display validation errors or success messages --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                    <div>
                        <strong class="d-block mb-1">Please fix the following errors:</strong>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container-fluid px-0">
            <form action="{{route('admin.addPackage.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-xl-8">
                        <!-- Basic Information Card -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2 text-primary"></i>Basic
                                    Information</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <label for="package_name" class="form-label fw-bold text-dark">Package Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="package_name" value="{{old('package_name')}}"
                                        class="form-control form-control-lg bg-light" id="package_name"
                                        placeholder="e.g. 5 Days Alpine Adventure">
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label for="tour_type" class="form-label fw-bold text-dark">Tour Type <span
                                                class="text-danger">*</span></label>
                                        <select id="tour_type" name="tour_type" class="form-select bg-light">
                                            <option value="" disabled selected>Select Tour Type</option>
                                            <option value="Adventure Tour" {{ old('tour_type') == 'Adventure Tour' ? 'selected' : '' }}>Adventure Tour</option>
                                            <option value="Beach Holiday Tour" {{ old('tour_type') == 'Beach Holiday Tour' ? 'selected' : '' }}>Beach Holiday Tour</option>
                                            <option value="Cultural Tour" {{ old('tour_type') == 'Cultural Tour' ? 'selected' : '' }}>Cultural Tour</option>
                                            <option value="Business Trip Tour" {{ old('tour_type') == 'Business Trip Tour' ? 'selected' : '' }}>Business Trip Tour</option>
                                            <option value="Wildlife Safaris" {{ old('tour_type') == 'Wildlife Safaris' ? 'selected' : '' }}>Wildlife Safaris</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="duration" class="form-label fw-bold text-dark">Duration (Days) <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="duration" value="{{old('duration')}}"
                                                class="form-control bg-light" id="duration" placeholder="e.g. 5">
                                            <span class="input-group-text bg-white">Days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Setup Card -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-tag me-2 text-primary"></i>Pricing Setup</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-4 mb-4">
                                    <div class="col-12">
                                        <label for="price_start_from" class="form-label fw-bold text-dark">Starting Price
                                            (Base Rate) <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white">$</span>
                                            <input type="text" name="price_start_from" value="{{old('price_start_from')}}"
                                                class="form-control bg-light" id="price_start_from" placeholder="0.00">
                                        </div>
                                        <small class="text-muted mt-1 d-block">This is the highlighted introductory price
                                            that users see first.</small>
                                    </div>
                                </div>
                                <div class="row g-4 border-top pt-2">
                                    <div class="col-md-6">
                                        <label for="per_adult_fee" class="form-label fw-bold text-dark">Per Adult
                                            Fee</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">$</span>
                                            <input type="number" step="0.01" name="per_adult_fee"
                                                value="{{old('per_adult_fee')}}" class="form-control bg-light"
                                                id="per_adult_fee" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="per_child_fee" class="form-label fw-bold text-dark">Per Child
                                            Fee</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">$</span>
                                            <input type="number" step="0.01" name="per_child_fee"
                                                value="{{old('per_child_fee')}}" class="form-control bg-light"
                                                id="per_child_fee" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Itinerary & Details Card -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-journal-text me-2 text-primary"></i>Itinerary &
                                    Details</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <label for="overview" class="form-label fw-bold text-dark">Package Overview <span
                                            class="text-danger">*</span></label>
                                    <textarea name="overview" class="form-control bg-light" id="overview" rows="6"
                                        placeholder="Describe what makes this travel package special...">{{old('overview')}}</textarea>
                                </div>

                                <div class="row g-4 mb-4">
                                    <div class="col-md-6">
                                        <label for="includeThings" class="form-label fw-bold text-dark"><i
                                                class="bi bi-check-circle text-success me-1"></i>Included Things</label>
                                        <textarea name="included_things"
                                            class="form-control bg-light border-success border-opacity-25"
                                            id="includeThings" rows="5"
                                            placeholder="- Breakfast&#10;- Transport">{{old('included_things')}}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="excludeThings" class="form-label fw-bold text-dark"><i
                                                class="bi bi-x-circle text-danger me-1"></i>Excluded Things</label>
                                        <textarea name="Excludes_things"
                                            class="form-control bg-light border-danger border-opacity-25" id="excludeThings"
                                            rows="5"
                                            placeholder="- Personal expenses&#10;- Visa fees">{{old('Excludes_things')}}</textarea>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="tourPlaneDescription" class="form-label fw-bold text-dark">Tour Plan
                                        Description (Day by Day)</label>
                                    <textarea name="tour_plane_description" class="form-control bg-light"
                                        id="tourPlaneDescription" rows="8"
                                        placeholder="Day 1: Arrival & Check-in...&#10;Day 2: City Tour...">{{old('tour_plane_description')}}</textarea>
                                </div>
                                <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Press
                                    <code>Windows + .</code> to add emojis inside the text editors</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <!-- Media Gallery Card -->
                        <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 100px; z-index: 1;">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-images me-2 text-primary"></i>Media Gallery</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <label for="image_1" class="form-label fw-bold text-dark">Primary Image (Thumbnail)
                                        <span class="text-danger">*</span></label>
                                    <input type="file" name="image_1" class="form-control bg-light" id="image_1">
                                </div>
                                <div class="mb-4 pt-3 border-top">
                                    <label for="image_2" class="form-label fw-bold text-dark text-muted">Secondary Image
                                        (Optional)</label>
                                    <input type="file" name="image_2" class="form-control bg-light text-muted" id="image_2">
                                </div>
                                <div class="mb-4 pt-3 border-top">
                                    <label for="image_3" class="form-label fw-bold text-dark text-muted">Tertiary Image
                                        (Optional)</label>
                                    <input type="file" name="image_3" class="form-control bg-light text-muted" id="image_3">
                                </div>
                            </div>
                        </div>

                        <!-- Publish Actions Card -->
                        <div class="card border-0 shadow-sm sticky-top" style="top: 480px; z-index: 1;">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-send me-2 text-primary"></i>Publish Package</h5>
                            </div>
                            <div class="card-body p-4 d-grid gap-3">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm fw-bold"><i
                                        class="bi bi-cloud-arrow-up-fill me-2"></i>Create Package</button>
                                <a href="{{route('admin.travelPackage.show')}}"
                                    class="btn btn-light border shadow-sm">Cancel changes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection