<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home - AMS</title>
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container home-page">

        <div class="sidebar">
            <div class="logo-container">
                <div class="logo">
                    <img src="AMS2.png" class="logo-image" alt="AMS Logo">
                </div>
            </div>

            <div class="sidebar-menu">
                <a href="StudentHomePage.php" class="menu-item active">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="StudentAttendancePage.php" class="menu-item">
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
                <div class="page-title">STUDENT ACCOUNT | Home Page</div>
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
                <div class="schedule-container">
                    <fieldset class="schedule-fieldset">
                        <legend>Today's Schedule</legend>
                        <div class="schedule-content">
                             <div class="schedule-item">
                                <div class="schedule-time">07:30 - 08:30</div> 
                                <div class="schedule-details">
                                    <div class="schedule-subject">Pre-Calculus</div> 
                                    <div class="schedule-room">Room 301</div>
                                    <div class="schedule-teacher">Mrs. Santos</div>
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">08:30 - 09:30</div> 
                                <div class="schedule-details">
                                    <div class="schedule-subject">Earth Science</div> 
                                    <div class="schedule-room">Room 205</div>
                                    <div class="schedule-teacher">Mr. Reyes</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>


                <div class="content-section attendance-section">
                    <h2>Attendance Summary</h2>
                    <div class="attendance-content">


                        <div class="attendance-item">
                            <div class="subject-name">Gen Mathematics</div>
                            <div class="attendance-bar-container">

                                <div class="attendance-bar gen-mathematics" style="width: 86.96%"></div>
                            </div>
                            <div class="attendance-percentage">87%</div> 
                        </div>


                         <div class="attendance-item">
                            <div class="subject-name">Pre-Calculus</div>
                            <div class="attendance-bar-container">

                                <div class="attendance-bar pre-calculus" style="width: 85.71%"></div>
                            </div>
                            <div class="attendance-percentage">86%</div> 
                        </div>


                        <div class="attendance-item">
                            <div class="subject-name">Earth Science</div>
                            <div class="attendance-bar-container">

                                <div class="attendance-bar earth-science" style="width: 86.36%"></div>
                            </div>
                            <div class="attendance-percentage">86%</div> 
                        </div>


                        <div class="attendance-item">
                            <div class="subject-name">Physical Education</div>
                            <div class="attendance-bar-container">
                                <div class="attendance-bar physical-education" style="width: 100%"></div>
                            </div>
                            <div class="attendance-percentage">100%</div>
                        </div>


                        <div class="attendance-item">
                            <div class="subject-name">General Physics</div>
                            <div class="attendance-bar-container">

                                <div class="attendance-bar gen-physics" style="width: 80.95%"></div>
                            </div>
                            <div class="attendance-percentage">81%</div> 
                        </div>


                        <div class="attendance-item">
                            <div class="subject-name">Statistics</div>
                            <div class="attendance-bar-container">

                                <div class="attendance-bar statistics" style="width: 95.65%"></div>
                            </div>
                            <div class="attendance-percentage">96%</div> 
                        </div>



                        <div class="add-button" id="joinClassButton">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
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

    <script>
        // Keep existing JS for dropdown and modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Profile dropdown toggle
            const profileButton = document.getElementById('profileButton');
            const profileDropdown = document.getElementById('profileDropdown');

           if (profileButton && profileDropdown) { // Add null check
                profileButton.addEventListener('click', function(event) { // Add event parameter
                    profileDropdown.classList.toggle('show');
                    event.stopPropagation(); // Prevent click from immediately closing dropdown
                });

                // Close the dropdown when clicking outside
                 window.addEventListener('click', function(event) {
                    // Check if the click is outside the button AND outside the dropdown
                    if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                        if (profileDropdown.classList.contains('show')) {
                            profileDropdown.classList.remove('show');
                        }
                    }
                });
            } else {
                console.error("Profile button or dropdown not found.");
            }

            // Join Class modal functionality
            const joinClassButton = document.getElementById('joinClassButton');
            const joinClassModal = document.getElementById('joinClassModal');
            const cancelButton = document.querySelector('#joinClassModal .cancel-button'); // More specific selector

            if(joinClassButton && joinClassModal && cancelButton) { // Add null checks
                joinClassButton.addEventListener('click', function() {
                    joinClassModal.classList.add('show');
                });

                cancelButton.addEventListener('click', function() {
                    joinClassModal.classList.remove('show');
                });

                 // Close modal when clicking outside the modal content
                joinClassModal.addEventListener('click', function(event) { // Listen on the modal background
                    if (event.target === joinClassModal) { // Only if click is on the background itself
                        joinClassModal.classList.remove('show');
                    }
                });
            } else {
                 console.error("Join class button, modal, or cancel button not found.");
            }
        });
    </script>
</body>
</html>