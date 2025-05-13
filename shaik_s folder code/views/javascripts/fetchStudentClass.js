const studentClassApiURL = "../api/student_class.php";

document.addEventListener("DOMContentLoaded", loadStudentClasses);

// Load all student-class assignments
function loadStudentClasses() {
    fetch(studentClassApiURL)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector(".studentClassTableBody");
            tableBody.innerHTML = "";

            data.forEach(item => {
                const row = `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.student_id}</td>
                        <td>${item.class_id}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error loading student-class data:", error));
}

// Assign student to a class
function assignStudentToClass() {
    const studentId = document.querySelector("#studentId").value;
    const classId = document.querySelector("#classId").value;

    fetch(studentClassApiURL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            student_id: studentId,
            class_id: classId
        })
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.message === "Student assigned to class") {
                loadStudentClasses();
                document.querySelector("#assignStudentForm").reset();
            }
        })
        .catch(error => console.error("Error assigning student:", error));
}