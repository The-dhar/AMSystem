<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Teachers - AMS</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container teachers-page">
        <div class="sidebar">
            <div class="logo-container">
                <div class="logo">
                    <a href="StudentHomePage.php" class="logo-link">
                        <img src="../styles/AMS2.png" class="logo-image" alt="AMS Logo">
                    </a>     
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
                <a href="StudentTeacherPage.php" class="menu-item active">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Teacher</span>
                </a>
            </div>
        </div>

        <div class="main-area">
            <div class="top-nav">
                <div class="page-title">STUDENT ACCOUNT | Teacher Page</div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-profile" id="profileButton">
                    <i class="fas fa-user-circle"></i>
                </div>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="StudentProfilePage.php" class="dropdown-item">Profile</a>
                    <div class="dropdown-item">Settings</div>
                    <div class="dropdown-item" id="logoutButton">Logout</div>
                </div>
            </div>

            <div class="content-area">
                <div class="section-title">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h2>My Teachers</h2>
                </div>

                <div class="teachers-list">

                     <div class="teacher-card gen-mathematics"> 
                        <div class="teacher-avatar">
                            <i class="fas fa-user-tie"></i> 
                        </div>
                        <div class="teacher-info">
                            <div class="teacher-name">Mr. Garcia</div>
                            <div class="teacher-subject">Gen Mathematics</div>
                        </div>
                        <div class="teacher-actions">
                            <button class="contact-btn">
                                <i class="fas fa-envelope"></i>
                                Contact
                            </button>
                        </div>
                    </div>


                    <div class="teacher-card pre-calculus"> 
                        <div class="teacher-avatar">
                             <i class="fas fa-user-tie"></i> 
                        </div>
                        <div class="teacher-info">
                            <div class="teacher-name">Mrs. Santos</div>
                            <div class="teacher-subject">Pre-Calculus</div>
                        </div>
                        <div class="teacher-actions">
                            <button class="contact-btn">
                                <i class="fas fa-envelope"></i>
                                Contact
                            </button>
                        </div>
                    </div>


                    <div class="teacher-card earth-science">
                        <div class="teacher-avatar">
                             <i class="fas fa-user-tie"></i> 
                        </div>
                        <div class="teacher-info">
                            <div class="teacher-name">Mr. Reyes</div>
                            <div class="teacher-subject">Earth Science</div>
                        </div>
                        <div class="teacher-actions">
                            <button class="contact-btn">
                                <i class="fas fa-envelope"></i>
                                Contact
                            </button>
                        </div>
                    </div>


                    <div class="teacher-card physical-education">
                        <div class="teacher-avatar">
                            <i class="fas fa-user-alt"></i> 
                        </div>
                        <div class="teacher-info">
                            <div class="teacher-name">Coach Diaz</div>
                            <div class="teacher-subject">Physical Education</div>
                        </div>
                        <div class="teacher-actions">
                            <button class="contact-btn">
                                <i class="fas fa-envelope"></i>
                                Contact
                            </button>
                        </div>
                    </div>


                    <div class="teacher-card gen-physics">
                        <div class="teacher-avatar">
                             <i class="fas fa-user-tie"></i> 
                        </div>
                        <div class="teacher-info">
                            <div class="teacher-name">Mr. Cruz</div>
                            <div class="teacher-subject">General Physics</div>
                        </div>
                        <div class="teacher-actions">
                            <button class="contact-btn">
                                <i class="fas fa-envelope"></i>
                                Contact
                            </button>
                        </div>
                    </div>


                    <div class="teacher-card statistics">
                        <div class="teacher-avatar">
                            <i class="fas fa-user-tie"></i> 
                        </div>
                        <div class="teacher-info">
                            <div class="teacher-name">Ms. Lee</div>
                            <div class="teacher-subject">Statistics</div>
                        </div>
                        <div class="teacher-actions">
                            <button class="contact-btn">
                                <i class="fas fa-envelope"></i>
                                Contact
                            </button>
                        </div>
                    </div>

                </div>


                <div class="info-section">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="info-content">
                            <h3>Need Help?</h3>
                            <p>If you have any questions or need assistance regarding your teachers or classes, please contact the school administration office.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../student_functions/student_Teacher.js"></script>
</body>
</html>