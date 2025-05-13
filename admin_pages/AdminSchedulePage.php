<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/AdminScheduleStyle.css">
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
            <a href="AdminSchedulePage.php" class="nav-item active">
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

        <div class="content">
            <div class="schedule-section">
                <h2 class="schedule-title">Class Schedule</h2>
                <div class="table-container">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="scheduleTableBody">
                            <!-- Table content will be added dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Add Schedule Modal -->
        <div id="addScheduleModal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeAddSchedule()">&times;</span>
                <h2>Add Schedule</h2>
                <form id="scheduleForm" onsubmit="event.preventDefault(); submitSchedule();">
                    <label for="class_id">Class:</label>
                    <select id="class_id" required>
                        <!-- Options to be filled dynamically or statically -->
                        <option value="">-- Select Class --</option>
                    </select>

                    <label for="subject_id">Subject:</label>
                    <select id="subject_id" required>
                        <option value="">-- Select Subject --</option>
                    </select>

                    <label for="day">Day:</label>
                    <select id="day" required>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>

                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" required>

                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" required>

                    <label for="room">Room:</label>
                    <input type="text" id="room" required>

                    <label for="status">Status:</label>
                    <select id="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>

                    <button type="submit" class="button">Submit</button>
                </form>
            </div>
        </div>


        <div class="add-button" onclick="openAddSchedule()">+</div>

    </div>
    
    <script src="../admin_functions/adminSchedule.js"></script>
</body>
</html>