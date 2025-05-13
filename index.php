<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User Type</title>
    <link rel="stylesheet" href="styles/user_type_selection_style.css">
</head>
<body>
    <div class="container user-selection-page">
        
        <div class="header">
            <div class="header-item active">AMS</div>
            <div class="separator">|</div>
            <div class="header-item">Select User</div>
        </div>
        

        <div class="color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>
        
        <div class="main-content">
            <h1 class="title">Select User Type</h1>
            <p class="subtitle">You can change your account at any time</p>
            
            <div class="user-types">
                <div class="user-type-card" id="admin-card">
                    <div class="icon admin-icon"></div>
                    <h2>ADMIN</h2>
                    <p>Manage the system and attendance records.</p>
                </div>
                
                <div class="user-type-card" id="students-card">
                    <div class="icon students-icon"></div>
                    <h2>STUDENTS</h2>
                    <p>View your attendance records and reports.</p>
                </div>
            </div>
            
            <button class="next-button" disabled>NEXT</button>
        </div>
        
        <div class="bottom-color-bar">
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
            <div class="color-segment"></div>
        </div>
    </div>

    <script src="function.js"></script>
</body>
</html>