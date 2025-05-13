console.log('adminlogin js is running');

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('AdminloginForm');
    if (form) {
        form.addEventListener('submit', function (e) {
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

            const formData = new FormData(this);

            fetch('../api/adminLogin.php', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = '../admin_pages/AdminHomePage.php';
                    } else {
                        showModal(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showModal('An unexpected error occurred. Please try again.');
                });
        });
    } else {
        console.warn('Admin login form not found');
    }

    const mainContent = document.querySelector('.main-content');
    if (mainContent) {
        mainContent.classList.add('show');
    }
});

// Modal utility
function showModal(message) {
    const modal = document.getElementById('errorModal');
    const modalMessage = document.getElementById('modalMessage');
    modalMessage.textContent = message || 'An unexpected error occurred.';
    modal.style.display = 'block';
}

function closeModal() {
    const modal = document.getElementById('errorModal');
    modal.style.display = 'none';
}
