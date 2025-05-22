<?php
 require_once '../Model/user.php';
        $error = [];
        $values = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ([ 'email','password', 'id', 'check'] as $key) {
                $values[$key] = $_POST[$key] ?? '';
            }
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error[] = "email";
            if (empty($_POST['password']) || strlen($_POST['password']) < 7) $error[] = "password";
            if (empty($_POST['id']) || strlen($_POST['id']) < 10) $error[] = "id";

        }
        if(!$error){
            $user=new user();
        if( isset($_POST['id'])&&$user->checkuser($values['id'])){ // bloean
            $users=$user->get_user_id($values['id']);
            if($values['email']==$users['username']&&$values['password']==$users['PASWORD']){
                   header("location:../View/profile.PHP");
            exit;
            }
            else{
                
                if($values['email']!==$users['username'])
                $error[]='email';
            if( $values['password']!==$users['PASWORD'])
            $error[]='password';
            } 
        }
        else{
            $error[]='id';
        }
       

        }




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../View/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="login-banner">
                        <div class="login-banner-overlay"></div>
                        <div class="login-banner-content">
                            <div class="login-logo">
                                <div class="logo-container">
                                    <div class="logo-icon">SMD</div>
                                    <div class="logo-text">Bank</div>
                                </div>
                            </div>
                            <h2>Welcome Back</h2>
                            <p>Access your account to manage your finances with ease and security.</p>
                            <div class="banner-features">
                                <div class="feature">
                                    <i class="fas fa-lock"></i>
                                    <span>Bank-grade security</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-bolt"></i>
                                    <span>Lightning-fast transactions</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>Access anywhere, anytime</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-form-container">
                        <div class="login-header">
                            <div class="login-logo-mobile d-block d-lg-none">
                                <div class="logo-container">
                                    <div class="logo-icon">SMD</div>
                                    <div class="logo-text">Bank</div>
                                </div>
                            </div>
                            <h1>Log in</h1>
                            <p>Enter your credentials to access your account</p>
                        </div>
                        <form class="login-form" method="post">
                            <div class="mb-4">
                                <label for="username" class="form-label">Username or Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" placeholder="Enter your username or email" name="email">
                                    <?php if (in_array('email', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter correct email</div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label">Password</label>
                                    <a href="forget-page.html" class="forgot-password">Forgot Password?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                                    <span class="input-group-text password-toggle"><i class="fas fa-eye"></i></span>
                                    <?php if (in_array('password', $error)) { ?>
                                    <div class="alert alert-danger">*Please enter correct password</div>
                                <?php } ?>
                                </div>
                                  <div class="mb-4">
                                <label for="nationalId" class="form-control hs">National ID</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="text" class="form-control" id="nationalId" placeholder="enter your national ID" name="id">
                                    <?php if (in_array('id', $error)) { ?>
                                    <div class="alert alert-danger">*Warning: enter correct id</div>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="check" value="1">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                            
                            <div class="divider">
                                <span>or continue with</span>
                            </div>
                            
                            <div class="social-login">
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
                        
                        <div class="login-footer">
                            <p>Don't have an account? <a href="../View/sign.php">Sign Up</a></p>
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
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>