<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Account Recovery Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../View/css/forget.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
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
                        <a class="nav-link" href="../index.php">Home</a>
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
                        <a class="nav-link" href="View/contact.php">Contact</a>
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

    <!-- Account Recovery Header -->
    <section class="auth-header">
        <div class="container">
            <h1>Verify Your Identity</h1>
            <p>Please provide your personal details to recover your account</p>
        </div>
    </section>

    <!-- Account Recovery Details Section -->
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="auth-card">
                        <div class="auth-card-header">
                            <i class="fas fa-shield-alt auth-icon"></i>
                            <h3>Account Recovery</h3>
                            <p>Enter your details below</p>
                        </div>

                        <form id="recoveryForm" action="process-recovery.php" method="post">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter your registered phone number">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nationalId" class="form-label">National ID</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="text" class="form-control" id="nationalId" name="nationalId" placeholder="Enter your national ID number">
                                </div>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="confirmDetails" name="confirmDetails" required>
                                <label class="form-check-label" for="confirmDetails">
                                    I confirm that the information provided is correct
                                </label>
                            </div>
                           <div class="d-grid">
                          <button type="submit" class="btn btn-primary"><a class="verify_btn" href="../View/success.php">Verify Identity</a></button>
                          </div>
                            <div class="text-center mt-3">
                                <a href="../View/login.php" class="btn-back">
                                    <i class="fas fa-arrow-left"></i> Back to Recovery Options
                                </a>
                            </div>
                        </form>

                        <div class="auth-footer">
                            <div class="security-notice">
                                <i class="fas fa-lock"></i>
                                <p>Your information is securely encrypted and will only be used for verification purposes.</p>
                            </div>
                        </div>
                    </div>

                    <div class="help-section">
                        <h5>Need additional help?</h5>
                        <p>Contact our customer support at <strong>+20 1015522463</strong> or email us at <strong>SMD@smdbank.com</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>