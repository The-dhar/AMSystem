document.addEventListener('DOMContentLoaded', function() {

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
    
    let attendanceChart;

    // Function to determine color based on attendance percentage
    function getColorByAttendance(percentage) {
        if (percentage >= 90) {
            return '#2ecc71'; // Green for high attendance
        } else if (percentage >= 70) {
            return '#3498db'; // Blue for moderate attendance
        } else {
            return '#e74c3c'; // Red for low attendance
        }
    }

    // Profile dropdown toggle
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileButton && profileDropdown) { // Add null check
        profileButton.addEventListener('click', function(event) { // Add event parameter
            profileDropdown.classList.toggle('show');
            event.stopPropagation(); // Prevent click from immediately closing dropdown
        });

        // Close the dropdown when clicking outside
        window.addEventListener('click', function(event) {
            // Check if the click is outside the button AND outside the dropdown
            if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                if (profileDropdown.classList.contains('show')) {
                    profileDropdown.classList.remove('show');
                }
            }
        });
    } else {
        console.error("Profile button or dropdown not found.");
    }

    // Initialize chart
    function initializeChart() {
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        
        attendanceChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Filipino', 'Math', 'English'], // Subject names
                datasets: [{
                    data: [0, 0, 0], // Initial empty data
                    backgroundColor: ['#2ecc71', '#3498db', '#e74c3c'], // Placeholder colors
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value} present`;
                            }
                        }
                    }
                }
            }
        });

        updateChart();
    }

    // Function to update chart data based on selected filters
    function updateChart() {
        const schoolYear = document.getElementById('schoolYear').value;
        const gradeLevel = document.getElementById('gradeLevel').value;
        const semester = document.getElementById('semester').value;

        // Fetch the attendance data from the backend for the selected filters
        fetch(`../api/adminHome.php?schoolYear=${schoolYear}&gradeLevel=${gradeLevel}&semester=${semester}`)
            .then(response => response.json())
            .then(data => {
                // Assuming the response contains the attendance percentages per subject
                const { Filipino, Math, English } = data; // Adjust according to your response structure

                // Update chart data
                attendanceChart.data.datasets[0].data = [Filipino, Math, English];

                // Update colors based on attendance percentages
                attendanceChart.data.datasets[0].backgroundColor = [
                    getColorByAttendance(Filipino),
                    getColorByAttendance(Math),
                    getColorByAttendance(English)
                ];

                // Update the chart
                attendanceChart.update();
            })
            .catch(error => {
                console.error('Error fetching attendance data:', error);
            });
    }

    // Add event listeners to update chart when filters change
    document.getElementById('schoolYear').addEventListener('change', updateChart);
    document.getElementById('gradeLevel').addEventListener('change', updateChart);
    document.getElementById('semester').addEventListener('change', updateChart);

    // Add functionality to the "Add School Year" button
    document.getElementById('addSchoolYearBtn').addEventListener('click', function() {
        const schoolYearSelect = document.getElementById('schoolYear');
        const lastOption = schoolYearSelect.options[schoolYearSelect.options.length - 1];
        
        if (lastOption) {
            // Parse the last school year
            const lastYear = lastOption.value;
            const years = lastYear.split('-');
            const startYear = parseInt(years[0]);
            const endYear = parseInt(years[1]);
            
            // Create new school year (increment by 1)
            const newStartYear = endYear;
            const newEndYear = endYear + 1;
            const newSchoolYear = `${newStartYear}-${newEndYear}`;
            
            // Check if the new school year already exists
            let alreadyExists = false;
            for (let i = 0; i < schoolYearSelect.options.length; i++) {
                if (schoolYearSelect.options[i].value === newSchoolYear) {
                    alreadyExists = true;
                    break;
                }
            }
            
            if (!alreadyExists) {
                // Add new option to select
                const newOption = document.createElement('option');
                newOption.value = newSchoolYear;
                newOption.textContent = newSchoolYear;
                schoolYearSelect.appendChild(newOption);
                
                // Select the new option
                schoolYearSelect.value = newSchoolYear;
                
                // Update chart
                updateChart();
            }
        }
    });

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

    // Initialize the chart when the page loads
    window.onload = initializeChart;


});

