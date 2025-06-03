<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: transparent !important;
            box-shadow: none;
            padding: 1.2rem 1.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
            color: #212529 !important;
            transition: all 0.3s ease;
            display: flex;
            align-items: center; 
        }
        
        .nav-link {
        color: #212529 !important; 
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .navbar.scrolled .nav-link {
            color: var(--text-light) !important; 
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        .navbar.scrolled .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1); 
        }

        .navbar.scrolled {
            background-color: rgba(33, 37, 41, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 0.5rem 1.5rem; 
        }

        .navbar.scrolled ~ main {
            padding-top: 80px; 
        }

        .navbar-brand img {
            transition: all 0.3s ease;
            max-width: 100px !important; 
            height: auto;
            margin-right: 10px;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--text-light) !important; 
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        .navbar.scrolled .navbar-brand img {
            max-width: 75px !important;
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
            flex: 1; 
            padding-top: 110px;
        }

        footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #212529; 
        }
        
        @media (max-width: 767.98px) {
            .navbar-collapse {
                background-color: rgba(52, 58, 64, 0.95);
                backdrop-filter: blur(10px);
                padding: 1rem;
                border-radius: 8px;
                margin-top: 10px;
            }
            
            .navbar {
                padding: 1rem 1rem; 
            }
            
            .navbar.scrolled {
                padding: 0.5rem 1rem;
            }
            
            .navbar-brand img {
                max-width: 80px !important; 
            }
            
            .navbar.scrolled .navbar-brand img {
                max-width: 60px !important;
            }
            
            .navbar-brand {
                font-size: 1.3rem; 
            }
            
            main {
                padding-top: 90px; 
            }
            
            .hero-section {
                padding-top: 90px;
            }
            
            .campus-heading {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{ route('news.index') }}" class="navbar-brand">
                <img src="{{ asset('storage\news_images\img_assets\logo_lama.png') }}" alt="Logo_Lama" style="z-index: 99; position: relative; margin-right: 10px;">
                <img src="{{ asset('storage\news_images\img_assets\logo_baru.png') }}" alt="Logo_Baru" style="z-index: 99; position: relative; margin-right: 10px;">
                <span style="margin-left: 10px;">Petra News</span>            
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex ms-auto me-auto my-2 my-lg-0" style="max-width: 400px;" method="GET" action="{{ route('news.index') }}">
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Search news..." aria-label="Search" value="{{ request('search') }}">
                        <select class="form-select" name="category" aria-label="Filter by category">
                            <option value="" selected>Select Category</option>
                            <option class="level-1" value="314">&nbsp;&nbsp;&nbsp;&nbsp;Koperasi Mahasiswa&nbsp;&nbsp;</option>
                            <option class="level-1" value="232">&nbsp;&nbsp;&nbsp;&nbsp;Pelayanan Mahasiswa&nbsp;&nbsp;</option>
                            <option class="level-2" value="231">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelayanan Gereja&nbsp;&nbsp;</option>
                            <option class="level-1" value="612">&nbsp;&nbsp;&nbsp;&nbsp;Tim Petra Sinergy&nbsp;&nbsp;</option>
                            <option class="level-0" value="22">Majalah Genta&nbsp;&nbsp;</option>
                            <option class="level-0" value="1594">Media Partnership&nbsp;&nbsp;</option>
                            <option class="level-0" value="158">Open House&nbsp;&nbsp;</option>
                            <option class="level-0" value="689">Pemilu Raya&nbsp;&nbsp;</option>
                            <option class="level-0" value="1590">Persekutuan(PERSKI)&nbsp;&nbsp;</option>
                            <option class="level-1" value="1591">&nbsp;&nbsp;&nbsp;&nbsp;GMTK&nbsp;&nbsp;</option>
                            <option class="level-1" value="1613">&nbsp;&nbsp;&nbsp;&nbsp;HPMT Genta&nbsp;&nbsp;</option>
                            <option class="level-0" value="1616">Petra Career Center&nbsp;&nbsp;</option>
                            <option class="level-0" value="741">Upcoming Events&nbsp;&nbsp;</option>
                            <option class="level-0" value="1576">Wisuda&nbsp;&nbsp;</option>
                            <option class="level-0" value="1569">Fakultas Bisnis dan Ekonomi&nbsp;&nbsp;</option>
                            <option class="level-1" value="1571">&nbsp;&nbsp;&nbsp;&nbsp;Prodi Akuntansi&nbsp;&nbsp;</option>
                            <option class="level-2" value="1596">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Akuntansi Bisnis&nbsp;&nbsp;</option>
                            <option class="level-2" value="1572">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Accounting (IBAC)&nbsp;&nbsp;</option>
                            <option class="level-1" value="1570">&nbsp;&nbsp;&nbsp;&nbsp;Prodi Akuntansi Pajak&nbsp;&nbsp;</option>
                            <option class="level-2" value="1583">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Akuntansi Pajak Program International Business Engineering&nbsp;&nbsp;</option>
                            <option class="level-1" value="1586">&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Management (IBM)&nbsp;&nbsp;</option>
                            <option class="level-1" value="1580">&nbsp;&nbsp;&nbsp;&nbsp;Program Manajemen Keuangan&nbsp;&nbsp;</option>
                            <option class="level-1" value="1576">&nbsp;&nbsp;&nbsp;&nbsp;Program Manajemen Perhotelan&nbsp;&nbsp;</option>
                            <option class="level-0" value="1603">Fakultas Humaniora dan Industri Kreatif&nbsp;&nbsp;</option>
                            <option class="level-1" value="1609">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Sastra Inggris&nbsp;&nbsp;</option>
                            <option class="level-2" value="1610">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petra English Theatre&nbsp;&nbsp;</option>
                            <option class="level-0" value="1573">Fakultas Ilmu Komunikasi&nbsp;&nbsp;</option>
                            <option class="level-0" value="1602">Fakultas Keguruan dan Ilmu Pendidikan&nbsp;&nbsp;</option>
                            <option class="level-0" value="560">Fakultas Sastra&nbsp;&nbsp;</option>
                            <option class="level-1" value="1587">&nbsp;&nbsp;&nbsp;&nbsp;Prodi Bahasa Mandarin&nbsp;&nbsp;</option>
                            <option class="level-0" value="190">Fakultas Seni dan Desain&nbsp;&nbsp;</option>
                            <option class="level-1" value="1605">&nbsp;&nbsp;&nbsp;&nbsp;Desain Fashion dan Tekstil&nbsp;&nbsp;</option>
                            <option class="level-1" value="205">&nbsp;&nbsp;&nbsp;&nbsp;Desain Interior&nbsp;&nbsp;</option>
                            <option class="level-1" value="191">&nbsp;&nbsp;&nbsp;&nbsp;Desain Komunikasi Visual&nbsp;&nbsp;</option>
                            <option class="level-2" value="192">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adiwarna&nbsp;&nbsp;</option>
                            <option class="level-0" value="1566">Fakultas Teknik Industri&nbsp;&nbsp;</option>
                            <option class="level-1" value="1567">&nbsp;&nbsp;&nbsp;&nbsp;Informatika&nbsp;&nbsp;</option>
                            <option class="level-2" value="1568">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistem Informasi Bisnis (SIB)&nbsp;&nbsp;</option>
                            <option class="level-0" value="1574">Fakultas Teknik Sipil dan Perencanaan&nbsp;&nbsp;</option>
                            <option class="level-1" value="1575">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Sipil&nbsp;&nbsp;</option>
                            <option class="level-0" value="358">Fakultas Teknologi Industri&nbsp;&nbsp;</option>
                            <option class="level-1" value="1584">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Industri&nbsp;&nbsp;</option>
                            <option class="level-2" value="1585">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Engineering (IBE)&nbsp;&nbsp;</option>
                            <option class="level-1" value="359">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Mesin&nbsp;&nbsp;</option>
                            <option class="level-0" value="771">King Sejong Institute&nbsp;&nbsp;</option>
                            <option class="level-0" value="11">Lembaga Kemahasiswaan&nbsp;&nbsp;</option>
                            <option class="level-1" value="234">&nbsp;&nbsp;&nbsp;&nbsp;Himpunan Mahasiswa&nbsp;&nbsp;</option>
                            <option class="level-2" value="399">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himahottra&nbsp;&nbsp;</option>
                            <option class="level-2" value="1607">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaintra&nbsp;&nbsp;</option>
                            <option class="level-2" value="283">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himainfra&nbsp;&nbsp;</option>
                            <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himajaktra&nbsp;&nbsp;</option>
                            <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaketra&nbsp;&nbsp;</option>
                            <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himamesra&nbsp;&nbsp;</option>
                            <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatitra&nbsp;&nbsp;</option>
                            <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himabamatra&nbsp;&nbsp;</option>
                            <option class="level-2" value="1601">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasaintra&nbsp;&nbsp;</option>
                            <option class="level-2" value="235">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himamatra&nbsp;&nbsp;</option>
                            <option class="level-2" value="1598">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatantra&nbsp;&nbsp;</option>
                            <option class="level-2" value="1582">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatektra&nbsp;&nbsp;</option>
                            <option class="level-2" value="298">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatitra&nbsp;&nbsp;</option>
                            <option class="level-2" value="329">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himavistra&nbsp;&nbsp;</option>
                            <option class="level-2" value="1593">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasitra&nbsp;&nbsp;</option>
                            <option class="level-2" value="336">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaartra&nbsp;&nbsp;</option>
                            <option class="level-2" value="287">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasintra&nbsp;&nbsp;</option>
                            <option class="level-2" value="904">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himakomtra&nbsp;&nbsp;</option>
                            <option class="level-0" value="76">Achievement&nbsp;&nbsp;</option>
                            <option class="level-0" value="201">Badan Eksekutif Mahasiswa&nbsp;&nbsp;</option>
                            <option class="level-1" value="631">&nbsp;&nbsp;&nbsp;&nbsp;LKM-ID&nbsp;&nbsp;</option>
                            <option class="level-1" value="202">&nbsp;&nbsp;&nbsp;&nbsp;LKM-TR&nbsp;&nbsp;</option>
                            <option class="level-1" value="1615">&nbsp;&nbsp;&nbsp;&nbsp;Servant Leadership Training&nbsp;&nbsp;</option>
                            <option class="level-1" value="263">&nbsp;&nbsp;&nbsp;&nbsp;UKM&nbsp;&nbsp;</option>
                            <option class="level-2" value="303">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BSO&nbsp;&nbsp;</option>
                            <option class="level-2" value="1619">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EFM&nbsp;&nbsp;</option>
                            <option class="level-2" value="273">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KSR&nbsp;&nbsp;</option>
                            <option class="level-2" value="1617">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matranak&nbsp;&nbsp;</option>
                            <option class="level-2" value="1618">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mena&nbsp;&nbsp;</option>
                            <option class="level-2" value="1595">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Paduan Suara&nbsp;&nbsp;</option>
                            <option class="level-2" value="1612">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Selam&nbsp;&nbsp;</option>
                            <option class="level-2" value="264">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Teater Rumpun Padi&nbsp;&nbsp;</option>
                            <option class="level-0" value="265">Bank Panitia&nbsp;&nbsp;</option>
                            <option class="level-0" value="76">BIG Events&nbsp;&nbsp;</option>
                            <option class="level-1" value="147">&nbsp;&nbsp;&nbsp;&nbsp;Community Outreach Program (COP)&nbsp;&nbsp;</option>
                            <option class="level-1" value="1577">&nbsp;&nbsp;&nbsp;&nbsp;Dies Natalis&nbsp;&nbsp;</option>
                            <option class="level-1" value="388">&nbsp;&nbsp;&nbsp;&nbsp;LKMM-TD&nbsp;&nbsp;</option>
                            <option class="level-1" value="129">&nbsp;&nbsp;&nbsp;&nbsp;Welcome Grateful Generation&nbsp;&nbsp;</option>
                            <option class="level-2" value="159">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open House&nbsp;&nbsp;</option>
                            <option class="level-0" value="75">Events&nbsp;&nbsp;</option>
                            <option class="level-1" value="611">&nbsp;&nbsp;&nbsp;&nbsp;Eksternal&nbsp;&nbsp;</option>
                            <option class="level-1" value="1604">&nbsp;&nbsp;&nbsp;&nbsp;Office of Institutional Advance&nbsp;&nbsp;</option>
                            <option class="level-1" value="309">&nbsp;&nbsp;&nbsp;&nbsp;Pelantikan LK-TR&nbsp;&nbsp;</option>
                            <option class="level-1" value="549">&nbsp;&nbsp;&nbsp;&nbsp;Pengabdian Masyarakat&nbsp;&nbsp;</option>
                            <option class="level-1" value="128">&nbsp;&nbsp;&nbsp;&nbsp;Pusat Karir&nbsp;&nbsp;</option>
                            <option class="level-2" value="218">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre-Graduation Day Events&nbsp;&nbsp;</option>
                            <option class="level-1" value="221">&nbsp;&nbsp;&nbsp;&nbsp;Upacara Bendera&nbsp;&nbsp;</option>
                        </select>
                        <button class="btn btn-outline-warning" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('news.index') }}" class="nav-link">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('news.create') }}?new=true" class="nav-link add-news-btn btn btn-warning btn-sm text-light">
                            <i class="fas fa-plus-circle me-1"></i> Add News
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.drafts') }}">
                            <i class="fas fa-save"></i> My Drafts
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('news.history') }}" class="nav-link fw-bold">History News</a>
                    </li>
                    
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

    <main>
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

        <div class="container my-5">
            <h2 class="text-center campus-heading mb-4">@yield('title', 'All News')</h2>
            
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

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Petra News</h5>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('.navbar');
        const body = document.body;
        const main = document.querySelector('main');
        
        // Add home-page class if on home page
        if (window.location.pathname === '/' || window.location.pathname === '') {
            body.classList.add('home-page');
        }
        
        // Scroll event listener
        let ticking = false;
        
        function updateNavbar() {
            const scrolled = window.scrollY > 50;
            
            if (scrolled) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick);
        
        // Initial check
        updateNavbar();
    });
    </script>
    @stack('scripts')
</body>
</html>