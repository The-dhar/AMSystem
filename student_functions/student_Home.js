// Keep existing JS for dropdown and modal functionality
document.addEventListener('DOMContentLoaded', function() {

    const logoutButton = document.getElementById('logoutButton');

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

    /*
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
    */
});