<?php
require_once '../Model/Wallet.php';


// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit;
// }

// $userId = $_SESSION['user_id'];
// $wallet = new Wallet($userId);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['deposit'])) {
//         $amount = floatval($_POST['amount']);
//         try {
//             $wallet->deposit($amount);
//             $success = "deposit success";
//         } catch (Exception $e) {
//             $error = $e->getMessage();
//         }
//     } elseif (isset($_POST['withdraw'])) {
//         $amount = floatval($_POST['amount']);
//         try {
//             $wallet->withdraw($amount);
//             $success = "withdraw";
//         } catch (Exception $e) {
//             $error = $e->getMessage();
//         }
//     }
// }

// $balance = $wallet->getFormattedBalance();
// $cards = $wallet->getCards();
// $transactions = $wallet->getRecentTransactions(5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - My Wallet</title>
    <link rel="stylesheet" href="../View/css/wallet.css">
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
                <li><a href="../View/profile.PHP">My Profile</a></li>
                <li><a href="../View/wallet.php" class="active">My Wallet</a></li>
                <li><a href="../View/contact_us.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Wallet Section -->
    <div class="wallet-container">
        <h1>My Wallet</h1>
        
        <div class="wallet-content">
            <!-- Account Summary -->
            <div class="account-summary">
                <h2>Account Summary</h2>
                <div class="balance-card">
                    <div class="balance-info">
                        <div class="balance-label">Total Balance</div>
                        <div class="balance-amount">$12,345.67</div>
                    </div>
                    <div class="balance-actions">
                        <button class="btn btn-primary">Deposit</button>
                        <button class="btn btn-secondary">Withdraw</button>
                    </div>
                </div>
            </div>
            
            <!-- Account Cards -->
            <div class="account-cards">
                <h2>My Cards</h2>
                <div class="cards-grid">
                    <div class="card">
                        <div class="card-type">Debit Card</div>
                        <div class="card-number">**** **** **** 5678</div>
                        <div class="card-details">
                            <div class="card-holder"></div>
                            <div class="card-expiry">Exp: 05/28</div>
                        </div>
                    </div>
                    
                    <div class="card credit-card">
                        <div class="card-type">Credit Card</div>
                        <div class="card-number">**** **** **** 9012</div>
                        <div class="card-details">
                            <div class="card-holder">Mohamed Hussein</div>
                            <div class="card-expiry">Exp: 09/27</div>
                        </div>
                    </div>
                    
                    <div class="add-card">
                        <div class="add-card-icon">+</div>
                        <div class="add-card-text">Add New Card</div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Transactions -->
            <div class="transactions">
                <h2>Recent Transactions</h2>
                <div class="transaction-list">
                    <div class="transaction">
                        <div class="transaction-info">
                            <div class="transaction-title">Grocery Store</div>
                            <div class="transaction-date">May 8, 2025</div>
                        </div>
                        <div class="transaction-amount expense">-$85.42</div>
                    </div>
                    
                    <div class="transaction">
                        <div class="transaction-info">
                            <div class="transaction-title">Salary Deposit</div>
                            <div class="transaction-date">May 5, 2025</div>
                        </div>
                        <div class="transaction-amount income">+$3,250.00</div>
                    </div>
                    
                    <div class="transaction">
                        <div class="transaction-info">
                            <div class="transaction-title">Electric Bill</div>
                            <div class="transaction-date">May 3, 2025</div>
                        </div>
                        <div class="transaction-amount expense">-$124.30</div>
                    </div>
                    
                    <div class="transaction">
                        <div class="transaction-info">
                            <div class="transaction-title">Restaurant</div>
                            <div class="transaction-date">May 2, 2025</div>
                        </div>
                        <div class="transaction-amount expense">-$56.80</div>
                    </div>
                    
                    <div class="transaction">
                        <div class="transaction-info">
                            <div class="transaction-title">Online Shopping</div>
                            <div class="transaction-date">May 1, 2025</div>
                        </div>
                        <div class="transaction-amount expense">-$129.99</div>
                    </div>
                </div>
                
                <div class="view-all">
                    <a href="#">View All Transactions</a>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2>Quick Actions</h2>
                <div class="actions-grid">
                    <div class="action-item">
                        <div class="action-icon">💸</div>
                        <div class="action-text"><a class="wallet_payment send_money" href="payment.html">Send Money</a></div>
                    </div>
                    <div class="action-item">
                        <div class="action-icon">📱</div>
                        <div class="action-text">Mobile Recharge</div>
                    </div>
                    <div class="action-item">
                        <div class="action-icon">💳</div>
                        <div class="action-text"><a class="wallet_payment Pay_Bills" href="payment.html">Pay Bills</a></div>
                    </div>
                    <div class="action-item">
                        <div class="action-icon">🔄</div>
                        <div class="action-text"><a class="wallet_payment Recurring_Payments" href="payment.html">Recurring Payments</a></div>
                    </div>
                </div>
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