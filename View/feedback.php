<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Customer Feedback</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../View/css/feedback.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <div class="logo-container">
                    <div class="logo-icon">SMD</div>
                    <div class="logo-text">Bank</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../View/feedback.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/payment.php">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/contact_us.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-login" href="../View/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-signup" href="../View/sign.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Feedback Header -->
    <section class="feedback-header">
        <div class="container">
            <h1>We Value Your Feedback</h1>
            <p>Your opinions help us improve our services and create a better banking experience for everyone.</p>
        </div>
    </section>

    <!-- Feedback Form Section -->
    <section class="feedback-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="feedback-card">
                        <h3>Share Your Experience</h3>
                        <p class="mb-4">Please fill out the form below to let us know about your experience with SMD Bank.</p>
                        
                        <form id="feedbackForm" action="submit_feedback.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
                            </div>
                            
                            <div class="form-group">
                                <label for="phoneNumber" class="form-label">Phone Number (Optional)</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">How would you rate your overall experience?</label>
                                <div class="rating-simple">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5">5 - Excellent</label><br>
                                    
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4">4 - Very Good</label><br>
                                    
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3">3 - Good</label><br>
                                    
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2">2 - Fair</label><br>
                                    
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1">1 - Poor</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">What type of feedback would you like to share?</label>
                                <div class="feedback-type-simple">
                                    <input type="radio" id="type-compliment" name="feedbackType" value="compliment">
                                    <label for="type-compliment">Compliment</label><br>
                                    
                                    <input type="radio" id="type-suggestion" name="feedbackType" value="suggestion">
                                    <label for="type-suggestion">Suggestion</label><br>
                                    
                                    <input type="radio" id="type-issue" name="feedbackType" value="issue">
                                    <label for="type-issue">Issue</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="serviceType" class="form-label">Which service are you providing feedback about?</label>
                                <select class="form-control" id="serviceType" name="serviceType">
                                    <option value="" selected disabled>Select a service</option>
                                    <option value="personal-banking">Personal Banking</option>
                                    <option value="business-banking">Business Banking</option>
                                    <option value="online-banking">Online Banking</option>
                                    <option value="mobile-app">Mobile App</option>
                                    <option value="customer-service">Customer Service</option>
                                    <option value="loans">Loans & Mortgages</option>
                                    <option value="investments">Investments</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="feedbackDetails" class="form-label">Please share the details of your feedback</label>
                                <textarea class="form-control" id="feedbackDetails" name="feedbackDetails" rows="5" placeholder="Tell us more about your experience..."></textarea>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="contactConsent" name="contactConsent">
                                <label class="form-check-label" for="contactConsent">
                                    I consent to be contacted regarding my feedback
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit Feedback</button>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="feedback-sidebar">
                        <div class="contact-card">
                            <h4>Other Ways to Reach Us</h4>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-info">
                                    <h5>Call Us</h5>
                                    <p>+20 1015522463</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-info">
                                    <h5>Email Us</h5>
                                    <p>SMD@smdbank.com</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="contact-info">
                                    <h5>Live Chat</h5>
                                    <p>Available 24/7</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="faq-card">
                            <h4>Frequently Asked Questions</h4>
                            
                            <div class="faq-item">
                                <p class="faq-question">How long will it take to address my feedback?</p>
                                <p class="faq-answer">We typically respond to feedback within 2 business days. Complex issues may require additional time for investigation.</p>
                            </div>
                            
                            <div class="faq-item">
                                <p class="faq-question">Will I be notified when my feedback is addressed?</p>
                                <p class="faq-answer">Yes, if you've provided your contact information and consented to be contacted, we'll update you on any actions taken.</p>
                            </div>
                            
                            <div class="faq-item">
                                <p class="faq-question">Can I submit anonymous feedback?</p>
                                <p class="faq-answer">Yes, personal information is optional. However, providing contact details allows us to follow up if needed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>