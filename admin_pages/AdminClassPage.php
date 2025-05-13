<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/AdminClassStyle.css">
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
            <a href="AdminHomePage.php" class="nav-item">
                <span>🏠</span>
                Home
            </a>
            <a href="AdminSchedulePage.php" class="nav-item">
                <span>📅</span>
                Schedule
            </a>
            <a href="AdminClassPage.php" class="nav-item active">
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
        
        <div class="content">
            <div class="attendance-header">Class Attendance</div>
            
            <div class="controls">
                <select class="class-select" id="classSelect">
                    <option value="GRADE 10-Galileo">Grade 10-Galileo (English)</option>
                    <option value="GRADE 11-Da Vinci">Grade 11-Da Vinci (English)</option>
                    <option value="GRADE 12-Franklin">Grade 12-Franklin (English)</option>
                </select>
                
                <div class="date-container">
                    <input type="date" class="date-select" id="date-select">
                </div>
            </div>
            
            <div class="summary-cards">
                <div class="card">
                    <div class="card-title">Present</div>
                    <div class="card-value present" id="present-count">0</div>
                </div>
                
                <div class="card">
                    <div class="card-title">Absent</div>
                    <div class="card-value absent" id="absent-count">0</div>
                </div>
                
                <div class="card">
                    <div class="card-title">Excused</div>
                    <div class="card-value excused" id="excused-count">0</div>
                </div>
                
                <div class="card">
                    <div class="card-title">Total Students</div>
                    <div class="card-value" id="total-count">5</div>
                </div>
            </div>
            
            <div class="attendance-table">
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="attendance-TableBody">
                        <!-- Rows will be populated dynamically with JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="add-button">+</div>


    <!-- Modal Structure -->
    <div class="modal" id="attendanceModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Record Attendance</h2>
            <form id="attendanceForm">
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id" required>
                </div>
                <div class="form-group">
                    <label for="schedule_id">Schedule ID:</label>
                    <input type="text" id="schedule_id" name="schedule_id" required>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="../admin_functions/adminClass.js"></script>
 
</body>
</html>