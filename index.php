
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Modern Banking Solutions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="View/css/main.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <div class="logo-container">
                    <div class="logo-icon">SMD</div>
                    <div class="logo-text">Bank</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/feedback.php">Feedback</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="View/service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/payment.php">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/contact_us.php">Contact</a>
                    </li>
                               <li class="nav-item">
                        <a class="nav-link" href="./View/wallet.php">Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./View/profile.PHP">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-login" href="View/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-signup" href="View/sign.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="bank_h1">Banking Made Simple</h1>
                    <p class="hero-text">Experience hassle-free digital banking with SMD Bank. Secure, Modern, and Dependable.</p>
                    <div class="hero-btns">
                        <a href="View/sign.php" class="btn btn-primary btn-lg">Get Started</a>
                        <a href="View/about.php" class="btn btn-outline-light btn-lg">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header text-center">
                <h2>Why Choose SMD Bank?</h2>
                <p>We offer cutting-edge banking solutions designed for your convenience</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Secure Transactions</h3>
                        <p>State-of-the-art security protocols to keep your financial data safe.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Instant Transfers</h3>
                        <p>Send and receive money in seconds, not days. Fast and reliable.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Banking</h3>
                        <p>Manage your finances on the go with our intuitive mobile platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="services-overview">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our Banking Services</h2>
                <p>Comprehensive financial solutions tailored to your needs</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h4>Personal Banking</h4>
                        <p>Savings accounts, credit cards, and personal loans with competitive rates.</p>
                        <a href="View/service.php" class="btn-service">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4>Business Banking</h4>
                        <p>Dedicated solutions for businesses of all sizes to manage finances effectively.</p>
                        <a href="View/service.php" class="btn-service">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Investments</h4>
                        <p>Grow your wealth with our expert-guided investment opportunities.</p>
                        <a href="View/service.php" class="btn-service">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Mortgages</h4>
                        <p>Flexible mortgage options to help you find your dream home.</p>
                        <a href="View/service.php" class="btn-service">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- App Promotion -->
    <section class="app-promo">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="app-content">
                        <h2>Banking at Your Fingertips</h2>
                        <p>Download our mobile app for a seamless banking experience. Access your accounts, make payments, and transfer funds anytime, anywhere.</p>
                        <div class="app-buttons">
                            <a href="https://www.apple.com/eg-ar/app-store/" class="btn-app">
                                <i class="fab fa-apple"></i> App Store
                            </a>
                            <a href="https://play.google.com/store/games?device=windows&pli=1" class="btn-app">
                                <i class="fab fa-google-play"></i> Google Play
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header text-center">
                <h2>What Our Customers Say</h2>
                <p>Trusted by thousands of satisfied users</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>"SMD Bank has transformed how I manage my finances. Their mobile app is intuitive and their customer service is exceptional."</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h5>Michael Johnson</h5>
                                <span>Personal Banking Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>"As a small business owner, I appreciate the dedicated business services offered by SMD Bank. They truly understand our unique needs."</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h5>Sarah Williams</h5>
                                <span>Business Account Holder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>"The instant transfer feature is a game-changer. I can send money to family abroad within seconds. Highly recommend SMD Bank!"</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h5>David Chen</h5>
                                <span>Premium Account Member</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2>Ready to Experience Modern Banking?</h2>
                    <p>Join thousands of satisfied customers who have made the switch to SMD Bank.</p>
                    <a href="View/sign.php" class="btn btn-primary btn-lg">Open an Account Today</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-about">
                        <a href="index.html" class="footer-logo">
                            <div class="logo-container">
                                <div class="logo-icon">SMD</div>
                                <div class="logo-text">Bank</div>
                            </div>
                        </a>
                        <p>Secure, Modern, and Dependable banking solutions for individuals and businesses. Your trusted financial partner since 2010.</p>
                        <div class="social-links">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/login/ar"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="View/about.php">About Us</a></li>
                            <li><a href="View/service.php">Services</a></li>
                            <li><a href="View/contact_us.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h4>Banking Services</h4>
                        <ul>
                            <li><a href="View/service.php">Personal Banking</a></li>
                            <li><a href="View/service.php">Business Banking</a></li>
                            <li><a href="View/service.php">Loans & Mortgages</a></li>
                            <li><a href="View/service.php">Investments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-contact">
                        <h4>Contact Us</h4>
                        <p><i class="fas fa-map-marker-alt"></i> EL Maadi </p>
                        <p><i class="fas fa-phone-alt"></i> +20 1015522463</p>
                        <p><i class="fas fa-envelope"></i> SMD@smdbank.com</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2025 SMD Bank. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <ul class="footer-legal">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>