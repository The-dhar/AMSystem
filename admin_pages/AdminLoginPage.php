<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - AMS</title>
    <link rel="stylesheet" href="../styles/teacher.css">
</head>

<body>
    <div class="container login-page">

        <div class="header">
            <div class="header-item active">AMS</div>
            <div class="separator">|</div>
            <div class="header-item">Admin</div>
        </div>


        <div class="color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>


        <div class="main-content">
            <h1 class="title">Admin Login</h1>
            <p class="subtitle">Please enter your credentials to access your account</p>

            <form id="AdminloginForm" method="POST">
                <div class="login-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input name="email" type="email" id="email" class="form-input" placeholder="Enter your email address" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" id="password" class="form-input" placeholder="Enter your password">
                    </div>

                        <button type="submit" href="AMS1.html" class="login-button">LOG IN</button>


                    <p class="signup-link">New user? <a href="AdminRegistrationPage.php">Create an account</a></p>
                </div>
            </form>
        </div>


        <div class="bottom-color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>
    </div>

    <script src="../admin_functions/adminLogin.js" defer></script>
</body>

</html>