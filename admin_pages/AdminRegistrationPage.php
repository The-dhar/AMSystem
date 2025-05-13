<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - AMS</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="container registration-page">

        <div class="header">
            <div class="header-item active" >AMS</div>
            <div class="separator">|</div>
            <div class="header-item">Registration</div>
        </div>

        <div class="color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>
        

        <div class="main-content">
            <h1 class="title">Create Account</h1>
            <p class="subtitle">Fill in your details to create an Admin account</p>
            
        <form id="registrationForm" method="POST">
            <div class="registration-form">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Enter your full name">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email address">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Create a password">
                </div>
                
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-input" placeholder="Confirm your password">
                </div>
                
                <button type="submit" class="signup-button">SIGN UP</button>
                
                <p class="login-link">Already have an account? <a href="AdminLogin.html">Log In</a></p>
            </div>
        </form>
        

        <div class="bottom-color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>
    </div>

    <script src="../admin_functions/adminRegistration.js"></script>
</body>
</html>