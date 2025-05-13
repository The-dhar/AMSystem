// Animation for page transition
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.main-content').classList.add('show');

    document.getElementById('registrationForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const fullname = document.getElementById('fullname').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirmpassword').value.trim();

        // Validate the input fields
        if (!fullname || !email || !password || !confirmPassword) {
            showModal('All fields are required.');
            return;
        }

        if (password.length < 8) {
            showModal('Password must be at least 8 characters long.');
            return;
        }

        if (password !== confirmPassword) {
            showModal('Passwords do not match.');
            return;
        }

        // If validation passes, proceed to send form data
        const formData = new FormData(this);

        fetch('../api/adminRegistration.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.href = 'AdminLoginPage.php';  // Redirect to login page
            } else {
                showModal(data.message);  // Show the error message from the response
            }
        })
        .catch(error => {
            console.error('Error: ', error);
            showModal('An unexpected error occurred. Please try again later.');
        });
    });
});

// Function to show error messages in a modal
function showModal(message) {
    const modal = document.getElementById('errorModal');
    const modalMessage = document.getElementById('modalMessage');
    modalMessage.textContent = message || 'An unexpected error occurred. Please try again.';  // Default message if none is passed
    modal.style.display = 'block';
}

// Close the modal when clicking the close button
function closeModal() {
    const modal = document.getElementById('errorModal');
    modal.style.display = 'none';
}
