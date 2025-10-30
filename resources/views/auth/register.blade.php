@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <!-- Logo Section -->
                <div class="card-header bg-white border-0 text-center pt-5 pb-3">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <svg width="80" height="80" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="mb-3">
                            <!-- Logo Arga Homes -->
                            <path d="M50 10 L90 85 L70 85 L50 50 L30 85 L10 85 Z" fill="#000"/>
                            <path d="M50 35 L65 60 L50 60 Z" fill="#fff"/>
                        </svg>
                    </a>
                    <div class="mb-3">
                        <span style="font-weight: 800; font-size: 2rem; line-height: 1; letter-spacing: -0.5px;">ARGA</span><br>
                        <span style="font-weight: 400; font-size: 1rem; line-height: 1; letter-spacing: 2px; color: #666;">HOMES</span>
                    </div>
                    <h4 class="mb-0">Create Account</h4>
                    <p class="text-muted small">Sign up to book your appointment</p>
                </div>

                <div class="card-body px-5 pb-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">
                                <i class="bi bi-person"></i> Full Name
                            </label>
                            <input id="name" 
                                   type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Enter your full name"
                                   required 
                                   autocomplete="name" 
                                   autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">
                                <i class="bi bi-envelope"></i> Email Address
                            </label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Enter your email"
                                   required 
                                   autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">
                                <i class="bi bi-lock"></i> Password
                            </label>
                            <input id="password" 
                                   type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" 
                                   placeholder="Enter your password"
                                   required 
                                   autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-bold">
                                <i class="bi bi-lock-fill"></i> Confirm Password
                            </label>
                            <input id="password-confirm" 
                                   type="password" 
                                   class="form-control" 
                                   name="password_confirmation" 
                                   placeholder="Re-enter your password"
                                   required 
                                   autocomplete="new-password">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                <i class="bi bi-person-plus"></i> Register
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <small class="text-muted">Already have an account?</small>
                            <a href="{{ route('login') }}" class="text-decoration-none fw-bold">
                                <small>Sign In</small>
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        transition: all 0.3s;
    }
</style>
@endsection