// Keep existing JS for dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    // Profile dropdown toggle
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', function(event) {
            profileDropdown.classList.toggle('show');
            event.stopPropagation(); // Prevent click from immediately closing dropdown
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

    //***************************************************************************** 

    fetch('../api/studentProfile.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const student = data.data;
                document.querySelector('.profile-card-info h3').textContent = student.fullname;
                document.querySelector('.student-id').textContent = 'Student ID: ' + student.studentid;
                document.querySelector('.grade-level').textContent = student.gradelevel;

                const details = document.querySelector('.details-list');
                details.querySelector('dd:nth-of-type(1)').textContent = student.fullname;
                details.querySelector('dd:nth-of-type(2)').textContent = student.email;
                details.querySelector('dd:nth-of-type(3)').textContent = new Date(student.dob).toLocaleDateString();
            } else {
                console.error(data.message);
            }
        })
        .catch(err => {
            console.error('Fetch error:', err);
        });

    const editButton = document.querySelector('.btn-primary');
    const modal = document.getElementById('editProfileModal');
    const closeModal = document.getElementById('closeModal');
    const form = document.getElementById('editProfileForm');

    // Open modal for profile editing
    editButton.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    // Close modal for profile editing
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Form submission for profile editing
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch('../api/StudentUpdateProfile.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            if (result.status === 'success') {
                alert('Profile updated successfully!');
                modal.style.display = 'none';
                window.location.reload(); // Refresh to show updated data
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Fetch error:', error);
            alert('Failed to update profile.');
        }
    });

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

    //***************************************************************************** 

    // Handle Change Password Modal
    const changePasswordButton = document.getElementById('changePasswordButton');
    const changePasswordModal = document.getElementById('changePasswordModal');
    const closeChangePasswordModal = document.getElementById('closeChangePasswordModal');
    const changePasswordForm = document.getElementById('changePasswordForm');

    // Open Change Password Modal
    if (changePasswordButton) {
        changePasswordButton.addEventListener('click', () => {
            changePasswordModal.style.display = 'block';
        });
    }

    // Close Change Password Modal
    if (closeChangePasswordModal) {
        closeChangePasswordModal.addEventListener('click', () => {
            changePasswordModal.style.display = 'none';
        });
    }

    // Handle Change Password Form Submission
        // Handle Change Password Form Submission
    if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const currentPassword = document.getElementById('currentPassword').value.trim();
            const newPassword = document.getElementById('newPassword').value.trim();
            const confirmPassword = document.getElementById('confirmPassword').value.trim();

            if (!currentPassword || !newPassword || !confirmPassword) {
                alert("Please fill in all fields.");
                return;
            }

            if (newPassword !== confirmPassword) {
                alert("New passwords do not match!");
                return;
            }

            const formData = new FormData();
            formData.append('currentPassword', currentPassword);
            formData.append('newPassword', newPassword);

            const submitButton = changePasswordForm.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = "Changing...";

            try {
                const response = await fetch('../api/StudentChangePass.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();
                if (result.status === 'success') {
                    alert('Password changed successfully!');
                    changePasswordForm.reset(); // Clear the inputs
                    changePasswordModal.style.display = 'none';
                } else {
                    alert(result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to change password.');
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = "Change Password";
            }
        });
    }
});
