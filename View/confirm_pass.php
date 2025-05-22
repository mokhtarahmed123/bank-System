<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Confirm Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../View/css/confirm_pass.css">
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
        </div>
    </nav>

    <!-- Password Confirmation Section -->
    <section class="confirm-password-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="form-card">
                        <div class="form-header">
                            <h2>Confirm Password</h2>
                            <p>Please create and confirm your password</p>
                        </div>
                        <form id="password-form" action="../View/success.php" method="get">
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password"><i class="fas fa-lock"></i> Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm password" required>
                            </div>
                            <div class="form-action">
                                <button type="submit" class="btn btn-primary btn-block">Confirm & Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2025 SMD Bank. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>