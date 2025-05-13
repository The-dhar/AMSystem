// Animation for page transition
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.main-content').classList.add('show');
});

document.getElementById('registrationForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const fullname = document.getElementById('fullname').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmpassword').value.trim();
    const birthdate = document.getElementById('dob').value.trim();
    const gradelevel = document.getElementById('gradelevel').value.trim();

    // Input validation
    if (!fullname || !email || !password || !confirmPassword || !birthdate || !gradelevel) {
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

    // No need to hash the password here, send it as plain text
    const formData = new FormData();
    formData.append('fullname', fullname);
    formData.append('email', email);
    formData.append('studentid', email); // Use email as student ID (or change if needed)
    formData.append('dob', birthdate);
    formData.append('gradelevel', gradelevel);
    formData.append('password', password); // Send the raw password to backend
    formData.append('confirmpassword', confirmPassword); // Optional if PHP expects this

    // Send data to the backend for registration
    fetch('../api/studentRegistration.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === 'success') {
            alert(data.message);
            window.location.href = 'Studentlogin.php'; // Redirect after successful registration
        } else {
            showModal(data.message); // Show error message from the backend
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});

// Show modal with error message
function showModal(message) {
    const modal = document.getElementById('errorModal');
    const modalMessage = document.getElementById('modalMessage');
    modalMessage.textContent = message || 'An unexpected error occurred. Please try again.';
    modal.style.display = 'block';
}

function closeModal() {
    const modal = document.getElementById('errorModal');
    modal.style.display = 'none';
}
