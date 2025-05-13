const classApiURL = "../api/classes.php";

document.addEventListener("DOMContentLoaded", loadClasses);

// Fetch all classes
function loadClasses() {
    fetch(classApiURL)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector(".classTableBody");
            tableBody.innerHTML = "";

            data.forEach(classItem => {
                const row = `
                    <tr>
                        <td>${classItem.id}</td>
                        <td>${classItem.class_name}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error fetching classes:", error));
}

// Add a new class
function addClass() {
    const className = document.querySelector("#classNameInput").value;

    fetch(classApiURL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ class_name: className })
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            loadClasses();
            document.querySelector("#addClassForm").reset();
        })
        .catch(error => console.error("Error adding class:", error));
}
