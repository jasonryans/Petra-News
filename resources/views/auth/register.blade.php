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
                <i class="fas fa-user-plus" style="font-size: 2rem;"></i>
            </div>
            <h2 class="fw-bold">Register</h2>
            <p class="text-muted small">Create your Campus News Portal account</p>
        </div>
        
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Name Input -->
            <div class="mb-3">
                <label class="form-label fw-medium">Nama</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-user text-muted"></i>
                    </span>
                    <input type="text" name="name" class="form-control border-start-0" 
                           placeholder="Enter your name" value="{{ old('name') }}" required autofocus>
                </div>
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label fw-medium">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-envelope text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0" 
                           placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label fw-medium">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" name="password" id="password" class="form-control border-start-0 border-end-0" 
                           placeholder="Enter your password" required>
                    <span class="input-group-text bg-white border-start-0">
                        <button type="button" id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')" 
                                class="btn btn-sm p-0 border-0 bg-transparent">
                            <i class="far fa-eye text-muted"></i>
                        </button>
                    </span>
                </div>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Confirm Password Input -->
            <div class="mb-4">
                <label class="form-label fw-medium">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="form-control border-start-0 border-end-0" placeholder="Confirm your password" required>
                    <span class="input-group-text bg-white border-start-0">
                        <button type="button" id="toggleConfirmPassword" 
                                onclick="togglePasswordVisibility('password_confirmation', 'toggleConfirmPassword')" 
                                class="btn btn-sm p-0 border-0 bg-transparent">
                            <i class="far fa-eye text-muted"></i>
                        </button>
                    </span>
                </div>
                @error('password_confirmation')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-dark py-2 fw-medium">
                    <i class="fas fa-user-plus me-2"></i>Register
                </button>
            </div>
            
            <!-- Login Link -->
            <p class="text-center mb-0">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-medium">Login</a>
            </p>
        </form>
    </div>
</div>

<!-- Password Toggle Script -->
<script>
    function togglePasswordVisibility(inputId, toggleBtnId) {
        const passwordInput = document.getElementById(inputId);
        const toggleBtn = document.getElementById(toggleBtnId);
        const icon = toggleBtn.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
