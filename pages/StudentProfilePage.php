<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - AMS</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container profile-page">   
        <div class="sidebar">
            <div class="logo-container" >
                <div class="logo">
                    <img src="../styles/AMS2.png" class="logo-image" alt="AMS Logo">
                </div>
            </div>

            <div class="sidebar-menu">
                <a href="StudentHomePage.php" class="menu-item">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="StudentAttendancePage.php" class="menu-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>Attendance</span>
                </a>
                <a href="StudentSchedulePage.php" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Schedule</span>
                </a>
                <a href="StudentTeacherPage.php" class="menu-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Teacher</span>
                </a>
            </div>
        </div>

        
        <div class="main-area">
            
            <div class="top-nav">
                <div class="page-title">STUDENT ACCOUNT | My Profile</div> 
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-profile" id="profileButton">
                    <i class="fas fa-user-circle"></i>
                </div>

                
                <div class="profile-dropdown" id="profileDropdown">
                    <div class="dropdown-item" onclick="window.location.href='ProfilePage.html';">Profile</div>
                    <div class="dropdown-item">Settings</div>
                    <div class="dropdown-item" id="logoutButton">Logout</div>
                </div>
            </div>

            
            <div class="content-area">

                <div class="profile-header">
                    <h2>Profile Information</h2>
                </div>

                <div class="profile-content-grid">

                    
                    <div class="profile-card">
                        <div class="profile-avatar-section">
                            <div class="profile-avatar">
                                
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <button class="btn-upload-avatar">
                                <i class="fas fa-camera"></i> Change Photo
                            </button>
                        </div>
                        <div class="profile-card-info">
                            <h3>Barbie B. Batumbakal</h3>
                            <p class="student-id">Student ID: 2023-1001</p> 
                            <p class="grade-level">Grade 11</p>
                        </div>
                    </div>

                    
                    <div class="profile-details-card">
                        <h4>Personal Details</h4>
                        <dl class="details-list">
                            <dt>Full Name:</dt>
                            <dd>Barbie B. Batumbakal</dd>

                            <dt>Email Address:</dt>
                            <dd>barbie.b@example.com</dd> 

                            <dt>Date of Birth:</dt>
                            <dd>01 / January / 2007</dd> 

                        </dl>
                        <div class="profile-actions">
                             <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>

                     
                     <div class="profile-settings-card">
                        <h4>Account Settings</h4>
                         <dl class="details-list">
                            <dt>Password:</dt>
                            <dd>******** <button class="btn-link" id="changePasswordButton">Change Password</button></dd>
                         </dl>
                         <p class="help-text">Manage your account security settings.</p>
                    </div>

                </div> 

            </div> 
        </div> 
    </div> 

    <div id="editProfileModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close-button" id="closeModal">&times;</span>
            <h3>Edit Profile</h3>
            <form id="editProfileForm">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

    <div id="changePasswordModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close-button" id="closeChangePasswordModal">&times;</span>
            <h3>Change Password</h3>
            <form id="changePasswordForm">
                <label for="currentPassword">Current Password:</label>
                <input type="password" id="currentPassword" name="currentPassword" required>

                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required>

                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>


    <script src="../student_functions/student_Profile.js"></script>
</body>
</html>