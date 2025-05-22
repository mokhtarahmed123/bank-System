<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Profile</title>
    <link rel="stylesheet" href="../View/css/profile.css">
   
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <div class="logo-container">
                    <div class="logo-icon">SMD</div>
                    <div class="logo-text">Bank</div>
                </div>
            </a>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../View/about.php">About Us</a></li>
                <li><a href="../View/profile.PHP" class="active">My Profile</a></li>
                <li><a href="../View/wallet.php">My Wallet</a></li>
                <li><a href="../View/contact_us.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Profile Section -->
    <div class="profile-container">
        <h1>My Profile</h1>
        
        <div class="profile-content">
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="profile-title">
                    <h2>YOUSSEF SAYED</h2>
                    <p>Premium Account Holder</p>
                </div>
            </div>
            
            <div class="profile-details">
                <div class="detail-section">
                    <h3>Personal Information</h3>
                    <div class="detail-item">
                        <span class="detail-label">Full Name</span>
                        <span class="detail-value">youssef sayed</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email</span>
                        <span class="detail-value">youseefs272@gmail.com</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Phone</span>
                        <span class="detail-value">+20 1015522463</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Address</span>
                        <span class="detail-value">123 Banking Street, New York, NY 10001</span>
                    </div>
                </div>

                <div class="detail-section">
                    <h3>Account Information</h3>
                    <div class="detail-item">
                        <span class="detail-label">Account Type</span>
                        <span class="detail-value">Premium Savings</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Account Number</span>
                        <span class="detail-value">****-****-****-5678</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Current Balance</span>
                        <span class="detail-value balance">$24,750.89</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Account Status</span>
                        <span class="detail-value status active">Active</span>
                    </div>
                </div>

                <div class="detail-section">
                    <h3>Card Information</h3>
                    <div class="card-preview">
                        <div class="card-front">
                            <div class="card-chip"></div>
                            <div class="card-details">
                                <div class="card-number">**** **** **** 4321</div>
                                <div class="card-expiry">
                                    <span>Valid Thru</span>
                                    <span>05/28</span>
                                </div>
                                <div class="card-name">youseef sayed</div>
                            </div>
                            <div class="card-type">
                                <span>VISA</span>
                            </div>
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Card Type</span>
                        <span class="detail-value">Visa Premium</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Card Number</span>
                        <span class="detail-value">**** **** **** 4321</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Card Holder</span>
                        <span class="detail-value">youseef sayed</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Expiration Date</span>
                        <span class="detail-value">05/28</span>
                    </div>
                </div>
            </div>
            
            <div class="profile-actions">
                <a href="edit-profile.html" class="btn btn-primary">Edit Profile</a>
                <a href="../css/forget-page2.html" class="btn btn-secondary">Change Password</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 SMD Bank. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>