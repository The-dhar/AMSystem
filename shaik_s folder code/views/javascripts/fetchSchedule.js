const scheduleApiURL = "../api/schedule.php";

document.addEventListener("DOMContentLoaded", loadSchedules);

// Fetch and display all schedules
function loadSchedules() {
    fetch(scheduleApiURL)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector(".scheduleTableBody");
            tableBody.innerHTML = "";

            data.forEach(schedule => {
                const row = `
                    <tr>
                        <td>${schedule.id}</td>
                        <td>${schedule.class_id}</td>
                        <td>${schedule.subject_id}</td>
                        <td>${schedule.day}</td>
                        <td>${schedule.time}</td>
                        <td>${schedule.room}</td>
                        <td>${schedule.status}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error loading schedules:", error));
}

// Add a new schedule
function addSchedule() {
    const classId = document.querySelector("#classId").value;
    const subjectId = document.querySelector("#subjectId").value;
    const day = document.querySelector("#day").value;
    const time = document.querySelector("#time").value;
    const room = document.querySelector("#room").value;
    const status = document.querySelector("#status").value;

    fetch(scheduleApiURL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            class_id: classId,
            subject_id: subjectId,
            day: day,
            time: time,
            room: room,
            status: status
        })
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.message === "Schedule created") {
                loadSchedules();
                document.querySelector("#addScheduleForm").reset();
            }
        })
        .catch(error => console.error("Error creating schedule:", error));
}