<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance - AMS</title>
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container home-page">

        <div class="sidebar">
            <div class="logo-container">
                <div class="logo">
                    <img src="AMS2.png" class="logo-image">
                </div>
            </div>

            <div class="sidebar-menu">
                <a href="StudentHomePage.php" class="menu-item">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="StudentAttendancePage.html" class="menu-item active">
                    <i class="fas fa-calendar-check"></i>
                    <span>Attendance</span>
                </a>
                <a href="StudentSchedule.html" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Schedule</span>
                </a>
                <a href="StudentTeacher.html" class="menu-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Teacher</span>
                </a>
            </div>
        </div>


        <div class="main-area">

            <div class="top-nav">
                <div class="page-title">STUDENT ACCOUNT | Attendance Summary</div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-profile" id="profileButton">
                    <i class="fas fa-user-circle"></i>
                </div>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="ProfilePage.html" class="dropdown-item">Profile</a>
                    <div class="dropdown-item">Settings</div>
                    <div class="dropdown-item">Logout</div>
                </div>
            </div>


            <div class="content-area">
                <div class="subject-grid-container">
                    <div class="subject-grid">
                        <div class="subject-box" data-subject="genMath">Gen Mathematics</div>
                        <div class="subject-box" data-subject="preCalculus">Pre-calculus</div>
                        <div class="subject-box" data-subject="earthScience">Earth Science</div>
                        <div class="subject-box" data-subject="physicalEd">Physical Education</div>
                        <div class="subject-box" data-subject="genPhysics">General Physics</div>
                        <div class="subject-box active" data-subject="statistics">Statistics</div>
                    </div>
                </div>

                <div class="attendance-summary-section">
                    <h2 id="summaryTitle">Attendance Summary - Statistics</h2>
                    <table class="attendance-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Excused</th>
                                <th>Total Classes</th>
                                <th>Attendance Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="genMathRow" data-subject="genMath">
                                <td>Gen Mathematics</td>
                                <td id="genMathPresent">20</td>
                                <td id="genMathAbsent">3</td>
                                <td id="genMathExcused">0</td>
                                <td id="genMathTotal">23</td>
                                <td id="genMathPercentage">86.96%</td>
                            </tr>
                            <tr id="preCalculusRow" data-subject="preCalculus">
                                <td>Pre-calculus</td>
                                <td id="preCalculusPresent">18</td>
                                <td id="preCalculusAbsent">1</td>
                                <td id="preCalculusExcused">2</td>
                                <td id="preCalculusTotal">21</td>
                                <td id="preCalculusPercentage">85.71%</td>
                            </tr>
                            <tr id="earthScienceRow" data-subject="earthScience">
                                <td>Earth Science</td>
                                <td id="earthSciencePresent">19</td>
                                <td id="earthScienceAbsent">2</td>
                                <td id="earthScienceExcused">1</td>
                                <td id="earthScienceTotal">22</td>
                                <td id="earthSciencePercentage">86.36%</td>
                            </tr>
                            <tr id="physicalEdRow" data-subject="physicalEd">
                                <td>Physical Education</td>
                                <td id="physicalEdPresent">20</td>
                                <td id="physicalEdAbsent">0</td>
                                <td id="physicalEdExcused">0</td>
                                <td id="physicalEdTotal">20</td>
                                <td id="physicalEdPercentage">100.00%</td>
                            </tr>
                            <tr id="genPhysicsRow" data-subject="genPhysics">
                                <td>General Physics</td>
                                <td id="genPhysicsPresent">17</td>
                                <td id="genPhysicsAbsent">4</td>
                                <td id="genPhysicsExcused">0</td>
                                <td id="genPhysicsTotal">21</td>
                                <td id="genPhysicsPercentage">80.95%</td>
                            </tr>
                            <tr id="statisticsRow" data-subject="statistics" class="highlight">
                                <td>Statistics</td>
                                <td id="statisticsPresent">22</td>
                                <td id="statisticsAbsent">1</td>
                                <td id="statisticsExcused">0</td>
                                <td id="statisticsTotal">23</td>
                                <td id="statisticsPercentage">95.65%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="add-button" id="joinClassButton">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <div class="modal" id="joinClassModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Join Class</h2>
            </div>
            <div class="modal-body">
                <div class="class-code-section">
                    <div class="class-code-header">
                        <h3>Class code</h3>
                        <p>Ask your teacher for the class code, then enter it here.</p>
                    </div>
                    <input type="text" placeholder="Class code" class="class-code-input">
                </div>
                <div class="instructions">
                    <p>To sign in with a class code</p>
                    <ul>
                        <li>Use an authorized account</li>
                        <li>Use a class code with 5-7 letters or numbers, and no spaces or symbols</li>
                    </ul>
                </div>
                <div class="modal-actions">
                    <button class="cancel-button">Cancel</button>
                    <button class="join-button">Join</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/attendance.js"></script>
</body>
</html>