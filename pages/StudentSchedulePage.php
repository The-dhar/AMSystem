<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Schedule - AMS</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container schedule-page">

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
                <a href="StudentSchedulePage.php" class="menu-item active">
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
                <div class="page-title">STUDENT ACCOUNT | Schedule Page</div>
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

                <div class="week-selector">
                    <button class="week-nav-btn"><i class="fas fa-chevron-left"></i></button>
                    <div class="current-week">March 18 - 22, 2025</div>
                    <button class="week-nav-btn"><i class="fas fa-chevron-right"></i></button>
                </div>

                <div class="schedule-grid">


                    <div class="time-column">
                        <div class="time-header">Time</div>
                        <div class="time-slot">7:30 - 8:30</div>   
                        <div class="time-slot">8:30 - 9:30</div>   
                        <div class="time-slot">9:30 - 9:45</div>   
                        <div class="time-slot">9:45 - 10:45</div> 
                        <div class="time-slot">10:45 - 11:45</div> 
                        <div class="time-slot">11:45 - 12:45</div> 
                        <div class="time-slot">12:45 - 1:45</div>  
                        <div class="time-slot">1:45 - 2:45</div>  
                        <div class="time-slot">2:45 - 3:00</div>   
                        <div class="time-slot">3:00 - 4:00</div>   
                    </div>


                    <div class="day-column">
                        <div class="day-header">Monday</div>
                        <div class="subject-block pre-calculus" style="grid-row: 2;">
                            <div class="subject-name">Pre-Calculus</div>
                            <div class="subject-room">Room 301</div>
                            <div class="subject-teacher">Mrs. Santos</div>
                        </div>
                        <div class="subject-block earth-science" style="grid-row: 3;">
                            <div class="subject-name">Earth Science</div>
                            <div class="subject-room">Room 205</div>
                            <div class="subject-teacher">Mr. Reyes</div>
                        </div>
                        <div class="break-block" style="grid-row: 4;">Morning Break</div>
                         <div class="subject-block statistics" style="grid-row: 5;">
                            <div class="subject-name">Statistics</div>
                            <div class="subject-room">Room 305</div>
                            <div class="subject-teacher">Ms. Lee</div>
                        </div>
                         <div class="subject-block gen-physics" style="grid-row: 6;">
                            <div class="subject-name">General Physics</div>
                            <div class="subject-room">Room 210 Lab</div>
                            <div class="subject-teacher">Mr. Cruz</div>
                        </div>

                         <div class="subject-block physical-education" style="grid-row: 9;">
                             <div class="subject-name">Physical Education</div>
                             <div class="subject-room">Gymnasium</div>
                             <div class="subject-teacher">Coach Diaz</div>
                         </div>
                        <div class="break-block" style="grid-row: 10;">Afternoon Break</div>

                    </div>


                    <div class="day-column">
                        <div class="day-header">Tuesday</div>
                        <div class="subject-block gen-mathematics" style="grid-row: 2;">
                            <div class="subject-name">Gen Mathematics</div>
                            <div class="subject-room">Room 302</div>
                            <div class="subject-teacher">Mr. Garcia</div>
                        </div>
                         <div class="subject-block pre-calculus" style="grid-row: 3;">
                            <div class="subject-name">Pre-Calculus</div>
                            <div class="subject-room">Room 301</div>
                            <div class="subject-teacher">Mrs. Santos</div>
                        </div>
                        <div class="break-block" style="grid-row: 4;">Morning Break</div>
                        <div class="subject-block gen-physics" style="grid-row: 5;">
                            <div class="subject-name">General Physics</div>
                            <div class="subject-room">Room 210 Lab</div>
                            <div class="subject-teacher">Mr. Cruz</div>
                        </div>
                         <div class="subject-block earth-science" style="grid-row: 6;">
                            <div class="subject-name">Earth Science</div>
                            <div class="subject-room">Room 205</div>
                            <div class="subject-teacher">Mr. Reyes</div>
                        </div>

                         <div class="subject-block statistics" style="grid-row: 8;">
                            <div class="subject-name">Statistics</div>
                            <div class="subject-room">Room 305</div>
                            <div class="subject-teacher">Ms. Lee</div>
                        </div>
                        <div class="break-block" style="grid-row: 10;">Afternoon Break</div>

                    </div>


                    <div class="day-column">
                        <div class="day-header">Wednesday</div>
                         <div class="subject-block pre-calculus" style="grid-row: 2;">
                            <div class="subject-name">Pre-Calculus</div>
                            <div class="subject-room">Room 301</div>
                            <div class="subject-teacher">Mrs. Santos</div>
                        </div>
                        <div class="subject-block earth-science" style="grid-row: 3;">
                            <div class="subject-name">Earth Science</div>
                            <div class="subject-room">Room 205</div>
                            <div class="subject-teacher">Mr. Reyes</div>
                        </div>
                        <div class="break-block" style="grid-row: 4;">Morning Break</div>
                         <div class="subject-block statistics" style="grid-row: 5;">
                            <div class="subject-name">Statistics</div>
                            <div class="subject-room">Room 305</div>
                            <div class="subject-teacher">Ms. Lee</div>
                        </div>
                         <div class="subject-block gen-physics" style="grid-row: 6;">
                            <div class="subject-name">General Physics</div>
                            <div class="subject-room">Room 210 Lab</div>
                            <div class="subject-teacher">Mr. Cruz</div>
                        </div>
                         <div class="subject-block physical-education" style="grid-row: 9;">
                             <div class="subject-name">Physical Education</div>
                             <div class="subject-room">Gymnasium</div>
                             <div class="subject-teacher">Coach Diaz</div>
                         </div>
                        <div class="break-block" style="grid-row: 10;">Afternoon Break</div>

                    </div>

                    <div class="day-column">
                        <div class="day-header">Thursday</div>
                         <div class="subject-block gen-mathematics" style="grid-row: 2;">
                            <div class="subject-name">Gen Mathematics</div>
                            <div class="subject-room">Room 302</div>
                            <div class="subject-teacher">Mr. Garcia</div>
                        </div>
                         <div class="subject-block pre-calculus" style="grid-row: 3;">
                            <div class="subject-name">Pre-Calculus</div>
                            <div class="subject-room">Room 301</div>
                            <div class="subject-teacher">Mrs. Santos</div>
                        </div>
                        <div class="break-block" style="grid-row: 4;">Morning Break</div>
                        <div class="subject-block gen-physics" style="grid-row: 5;">
                            <div class="subject-name">General Physics</div>
                            <div class="subject-room">Room 210 Lab</div>
                            <div class="subject-teacher">Mr. Cruz</div>
                        </div>
                         <div class="subject-block earth-science" style="grid-row: 6;">
                            <div class="subject-name">Earth Science</div>
                            <div class="subject-room">Room 205</div>
                            <div class="subject-teacher">Mr. Reyes</div>
                        </div>
                         <div class="subject-block statistics" style="grid-row: 8;">
                            <div class="subject-name">Statistics</div>
                            <div class="subject-room">Room 305</div>
                            <div class="subject-teacher">Ms. Lee</div>
                        </div>
                        <div class="break-block" style="grid-row: 10;">Afternoon Break</div>
                    </div>

                    <div class="day-column">
                        <div class="day-header">Friday</div>
                        <div class="subject-block gen-mathematics" style="grid-row: 2;">
                            <div class="subject-name">Gen Mathematics</div>
                            <div class="subject-room">Room 302</div>
                            <div class="subject-teacher">Mr. Garcia</div>
                        </div>
                         <div class="subject-block statistics" style="grid-row: 3;">
                            <div class="subject-name">Statistics</div>
                            <div class="subject-room">Room 305</div>
                            <div class="subject-teacher">Ms. Lee</div>
                        </div>
                        <div class="break-block" style="grid-row: 4;">Morning Break</div>
                         <div class="subject-block earth-science" style="grid-row: 5;">
                            <div class="subject-name">Earth Science</div>
                            <div class="subject-room">Room 205</div>
                            <div class="subject-teacher">Mr. Reyes</div>
                        </div>
                         <div class="subject-block pre-calculus" style="grid-row: 6;">
                            <div class="subject-name">Pre-Calculus</div>
                            <div class="subject-room">Room 301</div>
                            <div class="subject-teacher">Mrs. Santos</div>
                        </div>
                        <div class="subject-block gen-physics" style="grid-row: 8;">
                            <div class="subject-name">General Physics</div>
                            <div class="subject-room">Room 210 Lab</div>
                            <div class="subject-teacher">Mr. Cruz</div>
                        </div>
                         <div class="subject-block physical-education" style="grid-row: 9;">
                             <div class="subject-name">Physical Education</div>
                             <div class="subject-room">Gymnasium</div>
                             <div class="subject-teacher">Coach Diaz</div>
                         </div>
                        <div class="break-block" style="grid-row: 10;">Afternoon Break</div>
                    </div>
                </div>

                <div class="schedule-legend">
                    <div class="legend-title">Legend:</div>
                    <div class="legend-items">
                        <div class="legend-item">
                            <div class="legend-color gen-mathematics"></div>
                            <div class="legend-label">Gen Mathematics</div>
                        </div>
                         <div class="legend-item">
                            <div class="legend-color pre-calculus"></div>
                            <div class="legend-label">Pre-Calculus</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color earth-science"></div>
                            <div class="legend-label">Earth Science</div>
                        </div>
                         <div class="legend-item">
                            <div class="legend-color physical-education"></div>
                            <div class="legend-label">Physical Education</div>
                        </div>
                         <div class="legend-item">
                            <div class="legend-color gen-physics"></div>
                            <div class="legend-label">General Physics</div>
                        </div>
                         <div class="legend-item">
                            <div class="legend-color statistics"></div>
                            <div class="legend-label">Statistics</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../student_functions/schedule.js"></script>
</body>
</html>