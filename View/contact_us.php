<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMD Bank - Contact Us</title>
    <link rel="stylesheet" href="../View/css/contact_us.css">
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
                <li><a href="../View/contact_us.php" class="active">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contact Section -->
    <div class="contact-container">
        <h1>Contact Us</h1>
        
        <div class="contact-info">
            <div class="info-item">
                <h3>Address:</h3>
                <p>123 Financial Street, New York, NY 10001</p>
            </div>
            
            <div class="info-item">
                <h3>Phone:</h3>
                <p>Customer Service: (800) 123-4567</p>
            </div>
            
            <div class="info-item">
                <h3>Email:</h3>
                <p>info@smdbank.com</p>
            </div>
            
            <div class="info-item">
                <h3>Hours:</h3>
                <p>Monday-Friday: 9:00 AM - 5:00 PM</p>
                <p>Saturday: 10:00 AM - 2:00 PM</p>
            </div>
        </div>
        
        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
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