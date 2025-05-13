// Animation for page loading
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.main-content').classList.add('show');

    // Get elements
    const adminCard = document.getElementById('admin-card');
    const studentsCard = document.getElementById('students-card');
    const nextButton = document.querySelector('.next-button');

    // Handle user type selection
    adminCard.addEventListener('click', function () {
        adminCard.classList.add('selected');
        studentsCard.classList.remove('selected');
        nextButton.removeAttribute('disabled');
        // Store selection
        localStorage.setItem('userType', 'admin');
    });

    studentsCard.addEventListener('click', function () {
        studentsCard.classList.add('selected');
        adminCard.classList.remove('selected');
        nextButton.removeAttribute('disabled');
        // Store selection
        localStorage.setItem('userType', 'student');
    });

    if (nextButton) {
        nextButton.addEventListener('click', function () {
            const userType = localStorage.getItem('userType');

            if (userType === 'student') {
                // Use absolute path to avoid appending extra folders
                console.log('Redirecting to: /AMSystem/pages/Studentlogin.php');
                window.location.href = 'pages/Studentlogin.php';
            } else if (userType === 'admin') {
                // Use absolute path for admin login
                console.log('Redirecting to: /AMSystem/admin_pages/AdminLoginPage.php');
                window.location.href = 'admin_pages/AdminLoginPage.php';
            } else {
                // Optional: Handle cases where no user type is selected
                alert('Please select a user type first!');
                console.warn('User type not found in localStorage.');
            }
        });
    } else {
        console.error('Error: Element with class "next-button" not found.');
    }
});