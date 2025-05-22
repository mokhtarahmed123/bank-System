<?php
require_once '../Model/database.php';
require_once '../Model/db_config.php';
require_once '../Model/Notification.php';
require_once '../Model/Transfer.php'; 
require_once '../Model/SendMoney.php';
require_once '../Model/BillPayment.php';

$error = [];
$values = [];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_type = $_POST['payment_type'] ?? 'transfer';
    $amount = trim($_POST['amount'] ?? '');
    
    switch ($payment_type) {
        case 'transfer':
            $from = trim($_POST['from_account'] ?? '');
            $to = trim($_POST['to_account'] ?? '');
            
            if (empty($amount)) $error[] = "Amount is required";
            if (empty($from)) $error[] = "From account is required";
            if (empty($to)) $error[] = "To account is required";
            
            if (!empty($amount)) {
                if (!is_numeric($amount)) {
                    $error[] = "Amount must be a valid number";
                } elseif ($amount <= 0) {
                    $error[] = "Amount must be greater than zero";
                }
            }
            
            if (empty($error)) {
                $transfer = new Transfer();
                $result = $transfer->TransferMoney($amount, $from, $to);
                
                if ($result['success']) {
                    $message = "<h3 style='color: green;'>" . htmlspecialchars($result['message']) . "</h3>";
                } else {
                    $message = "<h3 style='color: red;'>" . htmlspecialchars($result['message']) . "</h3>";
                }
            }
            break;
            
        case 'send_money':
            $from = trim($_POST['from_account_send'] ?? '');
            $to = trim($_POST['recipient_info'] ?? '');
            $visa = trim($_POST['visa_number'] ?? '');
            
            if (empty($amount)) $error[] = "Amount is required";
            if (empty($from)) $error[] = "From account is required";
            if (empty($to)) $error[] = "Recipient information is required";
            if (empty($visa)) $error[] = "Visa number is required";
            
            if (!empty($amount)) {
                if (!is_numeric($amount)) {
                    $error[] = "Amount must be a valid number";
                } elseif ($amount <= 0) {
                    $error[] = "Amount must be greater than zero";
                }
            }
            
            if (empty($error)) {
                $sendMoney = new SendMoney();
                $result = $sendMoney->insertData($amount, $from, $to);
                
                if ($result['success']) {
                    $message = "<h3 style='color: green;'>" . htmlspecialchars($result['message']) . "</h3>";
                } else {
                    $message = "<h3 style='color: red;'>" . htmlspecialchars($result['message']) . "</h3>";
                }
            }
            break;
            
        case 'bill_payment':
            $from = trim($_POST['from_account_bill'] ?? '');
            $payee = trim($_POST['payee'] ?? '');
            
            if (empty($amount)) $error[] = "Amount is required";
            if (empty($from)) $error[] = "From account is required";
            if (empty($payee)) $error[] = "Payee is required";
            
            if (!empty($amount)) {
                if (!is_numeric($amount)) {
                    $error[] = "Amount must be a valid number";
                } elseif ($amount <= 0) {
                    $error[] = "Amount must be greater than zero";
                }
            }
            
            if (empty($error)) {
                $billPayment = new BillPayment();
                $result = $billPayment->insertData($amount, $from);
                
                if ($result['success']) {
                    $message = "<h3 style='color: green;'>" . htmlspecialchars($result['message']) . "</h3>";
                } else {
                    $message = "<h3 style='color: red;'>" . htmlspecialchars($result['message']) . "</h3>";
                }
            }
            break;
    }
    
    if (!empty($error)) {
        $message = "<ul style='color: red;'>";
        foreach ($error as $err) {
            $message .= "<li>" . htmlspecialchars($err) . "</li>";
        }
        $message .= "</ul>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Payment - SMD Bank</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/css/main.css">
    <link rel="stylesheet" href="../View/css/payment.css">
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../View/service.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../View/payment.php">Payments</a></li>
                    <li class="nav-item"><a class="nav-link" href="../View/about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="../View/contact_us.php">Contact</a></li>
                    <li><a href="../View/profile.PHP" >Profile</a></li>
                    <li class="nav-item"><a class="nav-link btn-login" href="../View/login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn-signup" href="../View/sign.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Make a Payment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Payment Options -->
    <section class="payment-options">
        <div class="container">
            <div class="section-header text-center">
                <h2>Choose Your Payment Method</h2>
                <p>Fast, secure, and convenient ways to make payments</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="option-card">
                        <div class="option-icon"><i class="fas fa-exchange-alt"></i></div>
                        <h3>Account Transfer</h3>
                        <p>Transfer funds between your accounts with no fees.</p>
                        <a href="#payment-form" class="btn btn-primary" data-payment-type="transfer">Select</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="option-card">
                        <div class="option-icon"><i class="fas fa-paper-plane"></i></div>
                        <h3>Send Money</h3>
                        <p>Send money to friends or family with email or phone number.</p>
                        <a href="#payment-form" class="btn btn-primary" data-payment-type="send">Select</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="option-card">
                        <div class="option-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                        <h3>Bill Payment</h3>
                        <p>Pay your bills on time with scheduled payments.</p>
                        <a href="#payment-form" class="btn btn-primary" data-payment-type="bill">Select</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Form -->
    <section id="payment-form" class="payment-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-container">
                        <div class="form-header">
                            <h3>Payment Details</h3>
                            <div class="payment-tabs">
                                <div class="payment-tab active" id="transfer-tab">Transfer</div>
                                <div class="payment-tab" id="send-tab">Send Money</div>
                                <div class="payment-tab" id="bill-tab">Bill Payment</div>
                            </div>
                        </div>
                        
                        <!-- Transfer Form -->

                        <div class="form-body active" id="transfer-form">
                         

                            <form action="../index.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fromAccount" class="form-label" >From Account</label>
                                        <input type="text" class="form-label fromAccount" id="fromAccount"  name="from_account" placeholder="Enter account name">
                                    </div>
                                   <div class="col-md-6 mb-3">
                                        <label for="to_account"  class="form-label">To Account</label>
                                        <input type="text" class="form-label fromAccount" id="to_account"  placeholder="Enter account name" name='to_account'>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="transferAmount" class="form-label" >Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="transferAmount" name="amount" placeholder="0.00"  required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Complete Transfer</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Send Money Form -->
                        <div class="form-body form-body-send-money" id="send-form">
                            <form>
                                <div class="mb-3 send_money">
                                    <label for="fromAccountSend" class="form-label form_account form1">From Account</label>
                                     <input type="text" class="form-label fromAccount_send" id="fromAccount" placeholder="Enter account name">
                                </div>
                                <div class="mb-3 send_money">
                                    <label for="visaAccount" class="form-label form_account form2">Visa number</label>
                                     <input type="text" class="form-label fromAccount_send" id="visaAccount" placeholder="Enter number of credit card">
                                </div>
                                <div class="mb-3">
                                    <label for="recipientInfo" class="form-label">Recipient Email or Phone</label>
                                    <input type="text" class="form-control" id="recipientInfo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sendAmount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="sendAmount" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Send Money</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Bill Payment Form -->
                        <div class="form-body" id="bill-form">
                            <form>
                                <div class="mb-3">
                                    <label for="fromAccountBill" class="form-label form-account-bill">From Account</label>
                                    <input type="text" class="form-label fromAccount" id="fromAccount" name="'fromAccount'" placeholder="Enter account name">
                                </div>
                                <div class="mb-3">
                                    <label for="payee" class="form-label">Payee</label>
                                    <select class="form-select" id="payee" required>
                                        <option value="">Select Payee</option>
                                        <option>Banks</option>
                                        <option>Internet Service Provider</option>
                                        <option>Phone Company</option>
                                        <option>Add New Payee</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="billAmount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="billAmount" name="'amount" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Pay Bill</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Banner -->
    <section class="security-banner">
        <div class="container text-center">
            <i class="fas fa-shield-alt"></i>
            <h3>Your Security is Our Priority</h3>
            <p>All payments are protected by 256-bit SSL encryption and 24/7 fraud monitoring.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-about">
                        <a href="../index.html" class="footer-logo">
                            <div class="logo-container">
                                <div class="logo-icon">SMD</div>
                                <div class="logo-text">Bank</div>
                            </div>
                        </a>
                        <p>Secure, Modern, and Dependable banking solutions since 2010.</p>
                        <div class="social-links">
                            <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
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
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="../View/about.php">About Us</a></li>
                            <li><a href="../View/service.php">Services</a></li>
                            <li><a href="../View/contact_us.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h4>Banking Services</h4>
                        <ul>
                            <li><a href="../View/service.php">Business Banking</a></li>
                            <li><a href="../View/service.php">Loans & Mortgages</a></li>
                            <li><a href="../View/service.php">Personal Banking</a></li>
                            <li><a href="../View/service.php">Investments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-contact">
                        <h4>Contact Us</h4>
                        <p><i class="fas fa-map-marker-alt"></i> EL Maadi</p>
                        <p><i class="fas fa-phone-alt"></i> +20 1015522463</p>
                        <p><i class="fas fa-envelope"></i> SMD@smdbank.com</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p> 2025 SMD Bank. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <ul class="footer-legal">
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple tab switching
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.payment-tab');
            const forms = document.querySelectorAll('.form-body');
          
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    forms.forEach(f => f.classList.remove('active'));
                    
                    this.classList.add('active');
                    document.getElementById(this.id.replace('-tab', '-form')).classList.add('active');
                });
            });
            
            document.querySelectorAll('[data-payment-type]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = this.getAttribute('data-payment-type');
                    
                    document.getElementById('payment-form').scrollIntoView({behavior: 'smooth'});
                    document.querySelectorAll('.payment-tab').forEach(t => t.classList.remove('active'));
                    document.getElementById(type + '-tab').classList.add('active');
                    
                    document.querySelectorAll('.form-body').forEach(f => f.classList.remove('active'));
                    document.getElementById(type + '-form').classList.add('active');
                });
            });
        });
    </script>
</body>
</html>