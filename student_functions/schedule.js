        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileButton && profileDropdown) {
            profileButton.addEventListener('click', function(event) {
                profileDropdown.classList.toggle('show');
                event.stopPropagation(); 
            });

            // Close the dropdown when clicking outside
            window.addEventListener('click', function(event) {
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