<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - AMS</title>
    <link rel="stylesheet" href="../styles/logins.css">
</head>

<body>
    <div class="container login-page">

        <div class="header">
            <div class="header-item active" >AMS</div>
            <div class="separator">|</div>
            <div class="header-item">Student</div>
        </div>

        <div class="color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>

        <div class="main-content">
            <h1 class="title">Student Login</h1>
            <p class="subtitle">Please enter your credentials to access your account</p>

            <form id="loginForm" method="POST">
                <div class="login-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email address" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" >
                    </div>

                    <button type="submit" class="login-button">LOG IN</button>
                </div>
            </form>

            <p class="signup-link">New user? <a href="StudentRegistrationPage.php">Create an account</a></p>
        </div>

        <div class="bottom-color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>
    </div>

    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modalMessage">Error message will appear here.</p>
        </div>
    </div>

    <script src="../student_functions/student_Login.js"></script>
</body>

</html>