@extends('layouts.admin-layouts.main-structure')

@section('admincontent')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <h2 class="h3 mb-0 fw-bold text-dark">Settings</h2>
    </div>

    <!-- Status Messages -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm border-0" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Update Profile Details -->
        <div class="col-12 col-xl-6 mb-4">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-badge fs-5 me-2 text-primary"></i>
                        <span>Update Admin Details</span>
                    </div>
                </div>
                <div class="admin-card-body">
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                    
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" value="{{ old('name', $user->name) }}" class="form-control-modern w-100" id="name" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control-modern w-100" id="email" >
                            
                            <!-- input validation -->
                            @if ($errors->get('email'))
                                <div class="text-danger small mt-2">
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>
                            @endif
                    
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-3">
                                    <p class="text-sm text-warning d-flex align-items-center mb-2">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ __('Your email address is unverified.') }}
                                    </p>
                                    <button form="send-verification" class="btn btn-link p-0 text-decoration-none text-sm">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm text-success fw-medium">
                                            <i class="bi bi-check me-1"></i> {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn-modern btn-modern-primary">
                                <i class="bi bi-check2"></i> {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-12 col-xl-6 mb-4">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-shield-lock fs-5 me-2 text-warning"></i>
                        <span>Update Password</span>
                    </div>
                </div>
                <div class="admin-card-body">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                
                        <div class="mb-4">
                            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control-modern w-100" autocomplete="current-password" />
                            @if($errors->updatePassword->get('current_password'))
                                <div class="text-danger small mt-2">
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" />
                                </div>
                            @endif
                        </div>
                
                        <div class="mb-4">
                            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                            <input id="update_password_password" name="password" type="password" class="form-control-modern w-100" autocomplete="new-password" />
                            @if($errors->updatePassword->get('password'))
                                <div class="text-danger small mt-2">
                                    <x-input-error :messages="$errors->updatePassword->get('password')" />
                                </div>
                            @endif
                        </div>
                
                        <div class="mb-4">
                            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control-modern w-100" autocomplete="new-password" />
                            @if($errors->updatePassword->get('password_confirmation'))
                                <div class="text-danger small mt-2">
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
                                </div>
                            @endif
                        </div>
                
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn-modern btn-modern-primary">
                                <i class="bi bi-key"></i> {{ __('Update Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
