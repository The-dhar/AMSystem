function loadSchedule() {
    fetch('../api/adminSchedule.php')
        .then(response => response.json())
        .then(scheduleData => {
            if (!Array.isArray(scheduleData)) {
                throw new Error('Expected an array but received ' + typeof scheduleData);
            }

            const tableBody = document.getElementById('scheduleTableBody');
            tableBody.innerHTML = '';

            scheduleData.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.class_name}</td>
                    <td>${item.subject_name}</td>
                    <td>${item.day}</td>
                    <td>${item.start_time}</td>
                    <td>${item.end_time}</td>
                    <td>${item.room}</td>
                    <td><span class="status ${item.status.toLowerCase()}">${item.status}</span></td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching schedule:', error));
}

function openAddSchedule() {
    document.getElementById('addScheduleModal').style.display = 'block';
    document.getElementById('overlay').classList.add('open');

    // Load dropdown options only when opening the modal
    loadDropdownOptions();
}

function closeAddSchedule() {
    document.getElementById('addScheduleModal').style.display = 'none';
    document.getElementById('overlay').classList.remove('open');

    document.querySelectorAll('#addScheduleModal input, #addScheduleModal select')
        .forEach(el => el.value = '');
}

function submitSchedule() {
    const scheduleData = {
        class_id: document.getElementById("class_id").value,
        subject_id: document.getElementById("subject_id").value,
        day: document.getElementById("day").value,
        start_time: document.getElementById("start_time").value,
        end_time: document.getElementById("end_time").value,
        room: document.getElementById("room").value,
        status: document.getElementById("status").value
    };

    fetch('../api/addSchedule.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(scheduleData)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            closeAddSchedule();
            loadSchedule();
        } else {
            alert("Error: " + result.message);
        }
    })
    .catch(error => console.error('Error submitting schedule:', error));
}

function loadDropdownOptions() {
    // Load Classes
    fetch('../api/get_classes.php')
        .then(res => res.json())
        .then(data => {
            const classSelect = document.getElementById('class_id');
            classSelect.innerHTML = '<option value="">Select Class</option>';
            data.data.forEach(cls => {
                let option = document.createElement('option');
                option.value = cls.id;
                option.textContent = cls.name;
                classSelect.appendChild(option);
                console.log("Classes:", data);
            });
        });

    // Load Subjects
    fetch('../api/get_subjects.php')
        .then(res => res.json())
        .then(data => {
            const subjectSelect = document.getElementById('subject_id');
            subjectSelect.innerHTML = '<option value="">Select Subject</option>';
            data.data.forEach(sub => {
                let option = document.createElement('option');
                option.value = sub.id;
                option.textContent = sub.name;
                subjectSelect.appendChild(option);
            });
        });

    // Load Teachers
    /*fetch('../api/get_teachers.php')
        .then(res => res.json())
        .then(data => {
            const teacherSelect = document.getElementById('teacher_id');
            teacherSelect.innerHTML = '<option value="">Select Teacher</option>';
            data.data.forEach(teacher => {
                let option = document.createElement('option');
                option.value = teacher.id;
                option.textContent = teacher.fullname;
                teacherSelect.appendChild(option);
            });
        });*/
}

document.addEventListener('DOMContentLoaded', function () {
    loadSchedule();

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

    const addButton = document.querySelector('.add-button');
    if (addButton) {
        addButton.addEventListener('click', openAddSchedule);
    }

    // Assign global access for modal functions
    window.closeAddSchedule = closeAddSchedule;
    window.submitSchedule = submitSchedule;

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
});
