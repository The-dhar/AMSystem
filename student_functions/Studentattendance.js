document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');
    const subjectBoxes = document.querySelectorAll('.subject-box');
    const summaryTitle = document.getElementById('summaryTitle');
    const logoutButton = document.getElementById('logoutButton');

    profileButton.addEventListener('click', function () {
        profileDropdown.classList.toggle('show');
    });

    window.addEventListener('click', function (event) {
        if (!profileButton.contains(event.target)) {
            profileDropdown.classList.remove('show');
        }
    });

    function filterTableBySubject(subjectCode) {
        const rows = document.querySelectorAll('.attendance-table tbody tr');
        rows.forEach(row => {
            if (row.dataset.subject === subjectCode) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });

        // Update title
        const subjectBox = document.querySelector(`.subject-box[data-subject="${subjectCode}"]`);
        if (subjectBox) {
            summaryTitle.textContent = `Attendance Summary - ${subjectBox.textContent}`;
        }
    }

    function setSubjectBoxListeners() {
        subjectBoxes.forEach(box => {
            box.addEventListener('click', function () {
                subjectBoxes.forEach(b => b.classList.remove('active'));
                box.classList.add('active');
                filterTableBySubject(box.dataset.subject);
            });
        });
    }

    function loadAttendanceSummary() {
        fetch('../api/studentAttendance.php')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const subjects = data.attendance;
                    const tbody = document.getElementById("attendance-summary-TableBody");
                    tbody.innerHTML = "";

                    subjects.forEach(subject => {
                        const percentage = parseFloat(subject.percentage) || 0;
                        const row = document.createElement('tr');
                        row.dataset.subject = subject.code;
                        row.innerHTML = `
                            <td>${subject.subject_name}</td>
                            <td>${subject.present}</td>
                            <td>${subject.absent}</td>
                            <td>${subject.excused}</td>
                            <td>${subject.total}</td>
                            <td>${percentage.toFixed(2)}%</td>
                        `;
                        tbody.appendChild(row);
                    });

                    // Reapply filtering after rows are added
                    const initialSubject = document.querySelector('.subject-box.active')?.dataset.subject;
                    if (initialSubject) {
                        filterTableBySubject(initialSubject);
                    } else {
                        summaryTitle.textContent = "Attendance Summary - All Subjects";
                    }
                } else {
                    console.error('Failed to load attendance:', data.message);
                }
            })
            .catch(err => console.error('Error loading attendance summary:', err));
    }

    // Set up listeners and load data
    setSubjectBoxListeners();
    loadAttendanceSummary();

    if (logoutButton) {
        logoutButton.addEventListener('click', function () {
            fetch('../api/studentLogout.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
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
