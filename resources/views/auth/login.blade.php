@extends('layout.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <!-- Decorative elements -->
    <div class="position-absolute top-0 start-0 bg-dark opacity-10" style="width: 300px; height: 300px; border-radius: 50%; z-index: -1;"></div>
    <div class="position-absolute bottom-0 end-0 bg-warning opacity-10" style="width: 400px; height: 400px; border-radius: 50%; z-index: -1;"></div>
    
    <div class="card border-0 p-4 shadow-lg" style="width: 400px; border-radius: 10px;">
        <!-- Card Header with Logo -->
        <div class="text-center mb-4">
            <div class="bg-dark text-warning d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px;">
                <i class="fas fa-newspaper" style="font-size: 2rem;"></i>
            </div>
            <h2 class="fw-bold">Login</h2>
            <p class="text-muted small">Sign in to access Campus News Portal</p>
        </div>
        
        <!-- Error Messages -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <!-- Login Form - Keeping all original form elements -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label fw-medium">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-envelope text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0" 
                           placeholder="Enter your email" required autofocus>
                </div>
            </div>
            
            <!-- Password Input -->
            <div class="mb-4">
                <label class="form-label fw-medium">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" name="password" id="password" class="form-control border-start-0" 
                           placeholder="Enter your password" required>
                    <button type="button" id="togglePassword" class="btn btn-light border-start-0">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-dark py-2 fw-medium">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </button>
            </div>
            
            <!-- Register Link -->
            <p class="text-center mb-0">
                Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-medium">Register</a>
            </p>
        </form>
    </div>
</div>

<script>
    // Function to toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function () {
        const password = document.getElementById('password');
        const icon = this.querySelector('i');
        
        // Toggle password visibility
        if (password.type === 'password') {
            password.type = 'text'; // Show password
            icon.classList.remove('fa-eye'); // Change icon to eye-slash
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password'; // Hide password
            icon.classList.remove('fa-eye-slash'); // Change icon to eye
            icon.classList.add('fa-eye');
        }
    });
</script>
@endsection