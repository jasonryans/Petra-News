<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Font Awesome for better icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #212529;
            --secondary-dark: #343a40;
            --accent-color: #ffc107;
            --text-light: #f8f9fa;
            --text-muted: #adb5bd;
        }
        
        body {
            background-color: #f2f2f2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .add-news-btn {
            border-radius: 30px;
            padding: 0.5rem 1.2rem;
            font-weight: 600;
        }
        
        .news-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .news-date {
            font-size: 0.85rem;
            color: var(--text-muted);
        }
        
        .campus-heading {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .campus-heading:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .btn-detail {
            border-radius: 4px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .page-section {
            padding: 3rem 0;
        }
        
        /* For the dark mode toggler */
        .theme-toggle {
            cursor: pointer;
            padding: 0 10px;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1; /* Ensures the main content takes up available space */
        }

        footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #212529; /* Matches the footer's background color */
        }
        
        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .navbar-collapse {
                background-color: var(--secondary-dark);
                padding: 1rem;
                border-radius: 8px;
                margin-top: 10px;
            }
            
            .campus-heading {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar with improved design -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo with icon -->
            <a href="{{ route('news.index') }}" class="navbar-brand">
                <i class="fas fa-newspaper me-2"></i>Campus News
            </a>
            
            <!-- Responsive toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Search form -->
                <form class="d-flex ms-auto me-auto my-2 my-lg-0" style="max-width: 400px;">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search news..." aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                
                <ul class="navbar-nav ms-auto">
                    <!-- Home -->
                    <li class="nav-item">
                        <a href="{{ route('news.index') }}" class="nav-link">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    
                    <!-- Categories dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-list-alt me-1"></i> Categories
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="#">Academic</a></li>
                            <li><a class="dropdown-item" href="#">Events</a></li>
                            <li><a class="dropdown-item" href="#">Sports</a></li>
                            <li><a class="dropdown-item" href="#">Student Life</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">All Categories</a></li>
                        </ul>
                    </li>
                    
                    <!-- Link to Add News -->
                    <li class="nav-item">
                        <a href="{{ route('news.create') }}" class="nav-link add-news-btn btn btn-warning btn-sm text-light">
                            <i class="fas fa-plus-circle me-1"></i> Add News
                        </a>
                    </li>
                    
                    <!-- Link to History (News List) -->
                    <li class="nav-item">
                        <a href="{{ route('news.history') }}" class="nav-link fw-bold">History News</a>
                    </li>
                    
                    <!-- User dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main>
        <!-- Hero Section for Homepage -->
        @if(Request::is('/'))
        <div class="bg-dark text-white py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1 class="display-4 fw-bold mb-3">Campus News & Events</h1>
                        <p class="lead mb-4">Stay updated with the latest happenings, events, and announcements from across the campus</p>
                        <div class="d-flex justify-content-center">
                            <a href="#featured" class="btn btn-warning px-4 py-2">Latest News</a>
                            <a href="{{ route('news.create') }}" class="btn btn-outline-light ms-3 px-4 py-2">Submit News</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Page Content -->
        <div class="container my-5">
            <h2 class="text-center campus-heading mb-4">@yield('title', 'All News')</h2>
            
            <!-- Alert Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Campus News</h5>
                    <p class="text-white">Your source for the latest campus events, announcements, and stories from around the university.</p>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Latest News</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Events Calendar</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Categories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Academic</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Sports</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Events</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-white">Student Life</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fw-bold mb-3">Follow Us</h5>
                    <div class="d-flex">
                        <a href="#" class="text-warning me-2" style="font-size: 1.2rem;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-warning me-2" style="font-size: 1.2rem;"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-warning me-2" style="font-size: 1.2rem;"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-warning" style="font-size: 1.2rem;"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-white mb-0">&copy; 2025 Campus News Portal. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small text-white mb-0">Designed with <i class="fas fa-heart text-danger"></i> for our University</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>