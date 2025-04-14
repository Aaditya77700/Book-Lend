<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('content')
<div class="row auth-card g-0">
    <!-- Left side - Book illustration -->
    <div class="col-md-5 auth-sidebar">
        <div class="text-center mb-5">
            <i class="fas fa-book fa-4x mb-4"></i>
            <h2 class="fw-bold">BookLend</h2>
            <p class="lead">Your Digital Library Portal</p>
        </div>
        
        <div class="quote-box">
            <p class="fst-italic mb-2">"A reader lives a thousand lives before he dies. The man who never reads lives only one."</p>
            <p class="text-end mb-0">— George R.R. Martin</p>
        </div>
        
        <div class="text-center mt-auto">
            <p class="mb-2">Don't have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-light px-4">Register Now</a>
        </div>
    </div>
    
    <!-- Right side - Login form -->
    <div class="col-md-7 auth-content">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-primary">Welcome Back</h1>
            <p class="text-muted">Sign in to access your account</p>
        </div>
        
        <form id="loginForm" method="POST" action="{{ route('web.login') }}" novalidate>
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-envelope text-primary"></i>
                    </span>
                    <input type="email" id="email" name="email" class="form-control border-start-0" 
                           placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none small text-primary">
                        Forgot Password?
                    </a>
                    @endif
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-lock text-primary"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-control border-start-0" 
                           placeholder="Enter your password" required>
                    <span class="input-group-text bg-light border-start-0 cursor-pointer" id="togglePassword">
                        <i class="fas fa-eye text-muted"></i>
                    </span>
                </div>
            </div>
            
            <div class="mb-4 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Keep me signed in
                </label>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                    Sign In <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </form>
        
        <div class="mt-4 pt-3 border-top">
            <p class="text-center text-muted">
                <small>© {{ date('Y') }} BookLend Library System. All rights reserved.</small>
            </p>
        </div>
    </div>
</div>
@endsection