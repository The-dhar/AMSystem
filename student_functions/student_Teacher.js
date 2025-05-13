// Keep existing JS for dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    // Profile dropdown toggle
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');
    const logoutButton = document.getElementById('logoutButton');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', function(event) {
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

    if (logoutButton) {
        logoutButton.addEventListener('click', function () {
            fetch('../api/studentLogout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = data.redirect;
                } else {
                    alert("Logout failed. Please try again.");
                }
            })
            .catch(error => {
                console.error("Logout error:", error);
            });
        });
    }
});