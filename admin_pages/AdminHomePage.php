<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/AdminHomeStyle.css">
    <title>Attendance Management System</title>
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="toast" id="toast"></div>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="../styles/AMS2.png" alt="AMS Logo">
        </div>
        <div class="nav-items">
            <a href="AdminHomePage.php" class="nav-item active">
                <span>🏠</span>
                Home
            </a>
            <a href="AdminSchedulePage.php" class="nav-item ">
                <span>📅</span>
                Schedule
            </a>
            <a href="AdminClassPage.php" class="nav-item">
                <span>📚</span>
                Class
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <div style="display: flex; align-items: center;">
                <div class="menu-toggle" id="menu-toggle">☰</div>
                <div class="admin-info">ADMIN ACCOUNT | Dashboard</div>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <div class="user-profile-container">
                    <div class="user-profile" style="cursor: pointer" id="profileButton">
                        <i class ="fas fa-user-circle"></i>
                    </div>
                    <div class="profile-dropdown" id="profileDropdown">
                        <div class="dropdown-item">Profile</div>
                        <div class="dropdown-item">Settings</div>
                        <div class="dropdown-item" id="logoutButton">Logout</div>
                    </div>
                </div>
            </div>
            <!--<script src="../stundent_functions/button.js"></script>-->
        </div>

        <div class="container">
            <h1>Attendance Overview</h1>
            
            <div class="filters">
                <div class="filter-group">
                    <label for="schoolYear">School Year:</label>
                    <div class="school-year-container">
                        <select id="schoolYear">
                            <option value="2020-2021">2020-2021</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                        </select>
                        <button id="addSchoolYearBtn" class="button">+</button>
                    </div>
                </div>
                
                <div class="filter-group">
                    <label for="gradeLevel">Grade Level:</label>
                    <select id="gradeLevel">
                        <option value="Grade 10">Grade 10</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="semester">Semester:</label>
                    <select id="semester">
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                    </select>
                </div>
            </div>
            
            <div class="chart-container">
                <canvas id="attendanceChart"></canvas>
                
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color high"></div>
                        <span>High Attendance (≥90%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color moderate"></div>
                        <span>Moderate Attendance (70-89%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color low"></div>
                        <span>Low Attendance (<70%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="../admin_functions/adminHome.js"></script>
</body>
</html>