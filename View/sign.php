<?php
require_once '../Model/user.php';
$error = [];
$values = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (['fname','lname','email','password','confirmpassword','cardnum','phone','id','bankname','checkbox'] as $key) {
        $values[$key] = $_POST[$key] ?? '';
    }

    if (empty($_POST['fname'])) $error[] = "fname";
    if (empty($_POST['lname'])) $error[] = "lname";
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error[] = "email";
    if (empty($_POST['password']) || strlen($_POST['password']) < 7) $error[] = "password";
    if (empty($_POST['confirmpassword']) || $_POST['confirmpassword'] !== $_POST['password']) $error[] = "confirmpassword";
    if (empty($_POST['id']) || strlen($_POST['id']) < 10) $error[] = "id";
    if (empty($_POST['cardnum']) || strlen($_POST['cardnum']) !== 16) $error[] = "cardnum";
    if (empty($_POST['bankname'])) $error[] = "bankname";
    if (empty($_POST['phone']) || strlen($_POST['phone']) !== 11) $error[] = "phone";
    if (empty($_POST['checkbox'])) $error[] = "checkbox";

    if (!$error) {
        $name = $values['fname'] . ' ' . $values['lname'];
            $user=new user();
            if( $user->add_user($name, $values['phone'], $values['id'], $values['bankname'], $values['cardnum'], $values['email'], $values['password'])){
                echo "<div class='alert alert-success'>All data valid.</div>";
                 header("location:../View/profile.PHP");
                 exit;
             }

        
    }
     
}

 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../View/css/sign.css">
</head>
<body>
    <div class="signup-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="signup-form-container">
                        <div class="signup-header">
                            <div class="signup-logo-mobile d-block d-lg-none">
                                <div class="logo-container">
                                    <div class="logo-icon">SMD</div>
                                    <div class="logo-text">Bank</div>
                                </div>
                            </div>
                            <h1>Create Account</h1>
                            <p>Join SMD Bank and experience modern banking</p>
                        </div>
                        <form class="signup-form" method="post">
                            <div class="row"  >
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Enter first name" name="fname">
                                    <?php if (in_array('fname', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter your first name</div>
                                <?php } ?>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Enter last name" name="lname">
                                    <?php if (in_array('lname', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter your last name</div>
                                <?php } ?>
                                </div>
                            </div>
                          
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                                    <?php if (in_array('email', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter your email</div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="phone">
                                    <?php if (in_array('phone', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter valid phone </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nationalId" class="form-label">National ID</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="text" class="form-control" id="nationalId" placeholder="Enter your national ID" name="id">
                                    <?php if (in_array('id', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter valid national ID"</div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Enter your card number" name="cardnum">
                                    <?php if (in_array('cardnum', $error)) { ?>
                                         <div class="alert alert-danger">*Please enter valid card num</div>
                                     <?php } ?>

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bankSelect" class="form-label">Select Your Bank</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    <select class="form-select" id="bankSelect" name="bankname">
                                        <option selected disabled>Choose your bank</option>
                                        <option value="masr">Masr</option>
                                        <option value="National Bank of Egypt">National Bank of Egypt</option>
                                        <option value="Alexandria">Alexandria</option>
                                        <option value="cairo">Cairo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Create Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Create a password" name="password">
                                    <span class="input-group-text password-toggle"><i class="fas fa-eye"></i></span>
                                    <?php if (in_array('password', $error)) { ?>
                                            <br><div class="alert alert-danger">* not true</div>
                                                    <?php } ?>

                                </div>
                                <div class="password-strength">
                                    <div class="strength-meter">
                                        <div class="strength-segment"></div>
                                        <div class="strength-segment"></div>
                                        <div class="strength-segment"></div>
                                        <div class="strength-segment"></div>
                                    </div>
                                    <div class="strength-text">Password strength</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password" name=confirmpassword>
                                    <?php if (in_array('confirmpassword', $error)) { ?>
                                                            <div class="alert alert-danger">*confirm not true</div>
                                                <?php } ?>

                                </div>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="checkbox">
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                                </label>
                                <?php if (in_array('checkbox', $error)) { ?>
                                        <div class="alert alert-danger">*Please enter on I agree</div>
                                <?php } ?>

                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create Account</button>
                            
                            <div class="divider">
                                <span>or sign up with</span>
                            </div>
                            
                            <div class="social-signup">
                                <button type="button" class="btn btn-outline-secondary social-btn">
                                    <i class="fab fa-google"></i>
                                    <span>Google</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary social-btn">
                                    <i class="fab fa-apple"></i>
                                    <span>Apple</span>
                                </button>
                            </div>
                        </form>
                        
                        <div class="signup-footer">
                            <p>Already have an account? <a href="../View/login.php">Log in</a></p>
                            <div class="help-links">
                                <a href="#">Help</a>
                                <span>•</span>
                                <a href="#">Privacy Policy</a>
                                <span>•</span>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="signup-banner">
                        <div class="signup-banner-overlay"></div>
                        <div class="signup-banner-content">
                            <div class="signup-logo">
                                <div class="logo-container">
                                    <div class="logo-icon">SMD</div>
                                    <div class="logo-text">Bank</div>
                                </div>
                            </div>
                            <h2>Join SMD Bank</h2>
                            <p>Create your account and enjoy secure, modern, and dependable banking services.</p>
                            
                            <div class="benefits-list">
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="benefit-text">
                                        <h4>Free Account</h4>
                                        <p>No hidden fees or minimum balance requirements</p>
                                    </div>
                                </div>
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="benefit-text">
                                        <h4>Instant Transfers</h4>
                                        <p>Send money to anyone, anywhere, instantly</p>
                                    </div>
                                </div>
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="benefit-text">
                                        <h4>Premium Support</h4>
                                        <p>24/7 customer support for all your banking needs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>