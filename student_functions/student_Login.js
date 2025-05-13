// Animation for page transition
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.main-content').classList.add('show');
});

// Validation and form submission
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!email || !password) {
        showModal('Both email and password are required.');
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showModal('Please enter a valid email address.');
        return;
    }

    // Create FormData object and append the email and password (plain text)
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    fetch('../api/studentLogin.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.href = 'StudentHomePage.php';
            } else {
                showModal(data.message);
            }
        })
        .catch(error => {
            console.error('Error: ', error);
            showModal('An unexpected error occurred. Please try again later.');
        });
});

// Function to show the modal with a custom message
function showModal(message) {
    const modal = document.getElementById('errorModal');
    const modalMessage = document.getElementById('modalMessage');
    modalMessage.textContent = message || 'An unexpected error occurred. Please try again.';
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    const modal = document.getElementById('errorModal');
    modal.style.display = 'none';
}
