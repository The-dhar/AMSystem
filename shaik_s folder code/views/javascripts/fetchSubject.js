const subjectApiURL = "../api/subjects.php";

document.addEventListener("DOMContentLoaded", loadSubjects);

// Load all subjects
function loadSubjects() {
    fetch(subjectApiURL)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector(".subjectTableBody");
            tableBody.innerHTML = "";

            data.forEach(subject => {
                const row = `
                    <tr>
                        <td>${subject.id}</td>
                        <td>${subject.subject_name}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error loading subjects:", error));
}

// Add new subject
function addSubject() {
    const subjectName = document.querySelector("#subjectName").value;

    fetch(subjectApiURL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ subject_name: subjectName })
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.message === "Subject created") {
                loadSubjects();
                document.querySelector("#addSubjectForm").reset();
            }
        })
        .catch(error => console.error("Error adding subject:", error));
}