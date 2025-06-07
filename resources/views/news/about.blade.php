@extends('base.base')

@section('title', 'About Us')

@section('content')
<style>
    .about-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 0;
        margin-top: 80px;
        padding-top: 80px;
    }
    
    .team-section {
        padding: 80px 0;
    }
    
    .flip-card {
        background-color: transparent;
        width: 100%;
        height: 400px;
        perspective: 1000px;
        margin-bottom: 30px;
    }
    
    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
        cursor: pointer;
    }
    
    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }
    
    .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }
    
    .flip-card-front {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: #333;
    }
    
    .flip-card-back {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: rotateY(180deg);
    }
    
    .team-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .team-name {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    .team-role {
        font-size: 1rem;
        opacity: 0.8;
        margin-bottom: 15px;
    }
    
    .social-links {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }
    
    .social-links a {
        color: white;
        font-size: 1.5rem;
        transition: transform 0.3s ease;
    }
    
    .social-links a:hover {
        transform: scale(1.2);
        color: #ffc107;
    }
    
    .stats-section {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 60px 0;
    }
    
    .stat-card {
        text-align: center;
        padding: 30px;
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    .mission-vision {
        padding: 80px 0;
        background-color: #f8f9fa;
    }
    
    .mission-card, .vision-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: 100%;
        transition: transform 0.3s ease;
    }
    
    .mission-card:hover, .vision-card:hover {
        transform: translateY(-10px);
    }
    
    .section-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        color: #667eea;
    }
    
    @media (max-width: 768px) {
        .flip-card {
            height: 350px;
        }
        
        .about-hero {
            padding: 60px 0;
            padding-top: 150px;
        }
        
        .team-section, .mission-vision {
            padding: 60px 0;
        }
    }

    /* For 5 cards in a row - responsive grid */
    @media (min-width: 1200px) {
        .team-member {
            flex: 0 0 20%;
            max-width: 20%;
        }
    }
    
    @media (max-width: 1199px) and (min-width: 992px) {
        .team-member {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
    }
    
    @media (max-width: 991px) {
        .team-member {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    
    @media (max-width: 576px) {
        .team-member {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    .campus-heading {
        display: none !important;
    }
</style>

<!-- Hero Section -->
<div class="about-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">About Petra News</h1>
                <p class="lead mb-4">We are a dedicated team of students passionate about keeping the Petra Christian University community informed and connected through quality broadcasting journalism and storytelling.</p>
                <div class="d-flex justify-content-center gap-3">
                    <span class="badge bg-warning text-dark px-3 py-2">Student-Led</span>
                    <span class="badge bg-warning text-dark px-3 py-2">Community-Focused</span>
                    <span class="badge bg-warning text-dark px-3 py-2">Quality Broadcasting Journalism</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="team-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold mb-3">Meet Our Team</h2>
                <p class="text-muted">The passionate individuals behind Petra News</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <!-- Team Member 1 -->
            <div class="col team-member mb-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="{{ asset('storage/news_images/img_assets/team1.jpg') }}" alt="Team Member" class="team-avatar">
                            <div class="team-name">Jason R</div>
                            <div class="team-role">Project Manager, Frontend & Backend Developer</div>
                        </div>
                        <div class="flip-card-back">
                            <div class="team-name">Jason R</div>
                            <div class="team-role mb-3">Project Manager, Frontend & Backend Developer</div>
                            <p class="small mb-3">Informatika PCU'22</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col team-member mb-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="{{ asset('storage/news_images/img_assets/team2.jpg') }}" alt="Team Member" class="team-avatar">
                            <div class="team-name">Robert</div>
                            <div class="team-role">Frontend & Backend Developer</div>
                        </div>
                        <div class="flip-card-back">
                            <div class="team-name">Robert</div>
                            <div class="team-role mb-3">Frontend & Backend Developer</div>
                            <p class="small mb-3">Informatika PCU'22</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="col team-member mb-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="{{ asset('storage/news_images/img_assets/team3.jpg') }}" alt="Team Member" class="team-avatar">
                            <div class="team-name">Merry</div>
                            <div class="team-role">Secretary, Frontend & Backend Developer</div>
                        </div>
                        <div class="flip-card-back">
                            <div class="team-name">Merry</div>
                            <div class="team-role mb-3">Secretary, Frontend & Backend Developer</div>
                            <p class="small mb-3">SIB PCU'22</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 4 -->
            <div class="col team-member mb-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="{{ asset('storage/news_images/img_assets/team4.jpg') }}" alt="Team Member" class="team-avatar">
                            <div class="team-name">Leonard</div>
                            <div class="team-role">Negotiator & Frontend Developer</div>
                        </div>
                        <div class="flip-card-back">
                            <div class="team-name">Leonard</div>
                            <div class="team-role mb-3">Negotiator & Frontend Developer</div>
                            <p class="small mb-3">SIB PCU'22</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-flickr"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 5 -->
            <div class="col team-member mb-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="{{ asset('storage/news_images/img_assets/team5.jpg') }}" alt="Team Member" class="team-avatar">
                            <div class="team-name">Arnold</div>
                            <div class="team-role">Frontend Developer</div>
                        </div>
                        <div class="flip-card-back">
                            <div class="team-name">Arnold</div>
                            <div class="team-role mb-3">Frontend Developer</div>
                            <p class="small mb-3">Informatika PCU'22</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="fw-bold mb-4">Get In Touch</h3>
                <p class="text-muted mb-4">Have a story to share or want to join our team? We'd love to hear from you!</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="mailto:news@petra.ac.id" class="btn btn-primary">
                        <i class="fas fa-envelope me-2"></i>Email Us
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="fas fa-users me-2"></i>Join Our Team
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click functionality for mobile devices
        const flipCards = document.querySelectorAll('.flip-card');
        
        flipCards.forEach(card => {
            card.addEventListener('click', function() {
                // Toggle flip on mobile
                if (window.innerWidth <= 768) {
                    const inner = this.querySelector('.flip-card-inner');
                    inner.style.transform = inner.style.transform === 'rotateY(180deg)' ? 'rotateY(0deg)' : 'rotateY(180deg)';
                }
            });
        });
        
        // Counter animation
        const observerOptions = {
            threshold: 0.5,
            triggerOnce: true
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        const target = parseInt(counter.textContent.replace(/\D/g, ''));
                        const suffix = counter.textContent.replace(/[0-9]/g, '');
                        animateCounter(counter, target, suffix);
                    });
                }
            });
        }, observerOptions);
        
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
        
        function animateCounter(element, target, suffix) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + suffix;
            }, 30);
        }
    });
</script>
@endsection