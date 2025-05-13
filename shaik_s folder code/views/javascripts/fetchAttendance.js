const attendanceApiURL = "../student_backend/api/attendance.php";

document.addEventListener("DOMContentLoaded", loadAttendance);

// Load all attendance records
function loadAttendance() {
    fetch(attendanceApiURL)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('attendanceTableBody');
            tableBody.innerHTML = "";

            data.forEach(record => {
                const row = `
                    <tr>
                        <td>${record.student_id}</td>
                        <td>${record.subject_id}</td>
                        <td>${record.date}</td>
                        <td>${record.status}</td>
                    </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error loading attendance:", error));
}

// Load attendance for a specific student
function loadAttendanceByStudent(studentId) {
    fetch(`${attendanceApiURL}?student_id=${studentId}`)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('.attendanceTableBody');
            tableBody.innerHTML = "";

            data.forEach(record => {
                const row = `
                    <tr>
                        <td>${record.student_id}</td>
                        <td>${record.subject_id}</td>
                        <td>${record.date}</td>
                        <td>${record.status}</td>
                    </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error loading student attendance:", error));
}

// Mark attendance for a student
function markAttendance() {
    const form = document.querySelector("#markAttendanceForm");
    const studentId = form.querySelector("input[name='student_id']").value;
    const subjectId = form.querySelector("input[name='subject_id']").value;
    const date = form.querySelector("input[name='date']").value;
    const status = form.querySelector("select[name='status']").value;

    const payload = {
        student_id: studentId,
        subject_id: subjectId,
        date: date,
        status: status
    };

    fetch(attendanceApiURL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        loadAttendance();
        form.reset();
    })
    .catch(error => {
        console.error("Error marking attendance:", error);
        alert("Failed to mark attendance.");
    });
}


