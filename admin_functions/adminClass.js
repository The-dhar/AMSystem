document.addEventListener("DOMContentLoaded", () => {

    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('open');
    });

    overlay.addEventListener('click', function () {
        sidebar.classList.remove('open');
        overlay.classList.remove('open');
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            overlay.classList.remove('open');
        }
    });
    
    const selectedClass = document.getElementById('classSelect').value;
    loadClass(selectedClass);

    window.loadClass = loadClass;

    function loadClass(selectedClass) {
        fetch(`../api/adminClass.php?class=${selectedClass}`)
            .then(res => res.json())
            .then(students => {
                const tbody = document.getElementById("attendance-TableBody");
                tbody.innerHTML = "";

                // Initialize counters
                let presentCount = 0;
                let absentCount = 0;
                let excusedCount = 0;

                students.forEach((student, index) => {
                    // Count attendance status
                    if (student.status === 'Present') presentCount++;
                    else if (student.status === 'Absent') absentCount++;
                    else if (student.status === 'Excused') excusedCount++;

                    tbody.innerHTML += `
                        <tr>
                            <td>${student.student_id}</td>
                            <td>${student.fullname}</td>
                            <td>
                                <div class="radio-group">
                                    <label class="radio-option">
                                        <input type="radio" name="status-${index}" value="present" ${student.status === 'Present' ? 'checked' : ''} onclick="updateAttendance(${student.student_id}, 'Present')">
                                        Present
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="status-${index}" value="absent" ${student.status === 'Absent' ? 'checked' : ''} onclick="updateAttendance(${student.student_id}, 'Absent')">
                                        Absent
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="status-${index}" value="excused" ${student.status === 'Excused' ? 'checked' : ''} onclick="updateAttendance(${student.student_id}, 'Excused')">
                                        Excused
                                    </label>
                                </div>
                            </td>
                        </tr>
                    `;
                });

                document.getElementById("present-count").textContent = presentCount;
                document.getElementById("absent-count").textContent = absentCount;
                document.getElementById("excused-count").textContent = excusedCount;
                document.getElementById("total-count").textContent = students.length;
            })
            .catch(error => console.error('Error fetching attendance data:', error));
    }

    // Profile dropdown toggle
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');
    console.log(profileButton, profileDropdown);

    // Check if the profile button and dropdown are available before adding listeners
    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', function(event) {
            // Toggle dropdown visibility
            profileDropdown.classList.toggle('show');
            event.stopPropagation(); // Prevent propagation to close dropdown immediately
        });

        // Close dropdown if clicked outside
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

    // Show modal when add button is clicked
    document.querySelector('.add-button').addEventListener('click', () => {
        document.getElementById('attendanceModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';  // Show overlay
    });

    // Handle form submission for adding attendance
    document.getElementById('attendanceForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = {
            student_id: document.getElementById('student_id').value,
            schedule_id: document.getElementById('schedule_id').value,
            date: document.getElementById('date').value,
            status: document.getElementById('status').value
        };

        fetch('../api/addClass.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Attendance added successfully!");
                closeModal();  // Close modal after successful submission
                loadClass(document.getElementById('classSelect').value);
            } else {
                alert("Failed to add attendance: " + data.message);
            }
        })
        .catch(err => console.error('Error:', err));
    });
});

// Function to close the modal (moved outside DOMContentLoaded)
function closeModal() {
    document.getElementById('attendanceModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none'; // Hide overlay
}

// Close the modal when close button is clicked (X button)
const closeModalButton = document.getElementById('closeModal');
if (closeModalButton) {
    closeModalButton.addEventListener('click', () => {
        closeModal();
    });
}

// Close the modal when clicking outside the modal content (on overlay)
window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('overlay')) {
        closeModal();
    }
});

function updateAttendance(studentId, status) {
    fetch('../api/updateStatus.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ student_id: studentId, status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Attendance updated successfully');
            const selectedClass = document.getElementById('classSelect').value;
            if (typeof loadClass === 'function') {
                loadClass(selectedClass);
            }
        } else {
            console.error('Error updating attendance:', data.message);
        }
    })
    .catch(error => console.error('Error updating attendance:', error));
}


