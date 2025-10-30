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
                    <h4 class="mb-0">Welcome Back!</h4>
                    <p class="text-muted small">Sign in to your account</p>
                </div>

                <div class="card-body px-5 pb-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">
                                <i class="bi bi-envelope"></i> Email Address
                            </label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Enter your email"
                                   required 
                                   autocomplete="email" 
                                   autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">
                                <i class="bi bi-lock"></i> Password
                            </label>
                            <input id="password" 
                                   type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" 
                                   placeholder="Enter your password"
                                   required 
                                   autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                        </div>

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    <small>Forgot Your Password?</small>
                                </a>
                            </div>
                        @endif

                        <!-- Register Link -->
                        @if (Route::has('register'))
                            <div class="text-center mt-3">
                                <small class="text-muted">Don't have an account?</small>
                                <a href="{{ route('register') }}" class="text-decoration-none fw-bold">
                                    <small>Sign Up</small>
                                </a>
                            </div>
                        @endif

                    </form>
                </div>
            </div>

            {{-- <!-- Demo Accounts Info -->
            <div class="card mt-3 bg-light border-0">
                <div class="card-body text-center">
                    <small class="text-muted">
                        <strong>Demo Accounts:</strong><br>
                        Admin: admin@argahomes.com / admin123<br>
                        User: user@test.com / user123
                    </small>
                </div>
            </div> --}}
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