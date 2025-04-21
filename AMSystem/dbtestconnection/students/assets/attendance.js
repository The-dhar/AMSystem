document.addEventListener('DOMContentLoaded', function() {
    // Profile dropdown toggle
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    profileButton.addEventListener('click', function() {
        profileDropdown.classList.toggle('show');
    });

    // Close the dropdown when clicking outside
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.user-profile') && !event.target.matches('.fa-user-circle') && !profileButton.contains(event.target)) {
            if (profileDropdown.classList.contains('show')) {
                profileDropdown.classList.remove('show');
            }
        }
    });

    // Join Class modal functionality
    const joinClassButton = document.getElementById('joinClassButton');
    const joinClassModal = document.getElementById('joinClassModal');
    const cancelButton = document.querySelector('#joinClassModal .cancel-button');
    const joinButton = document.querySelector('#joinClassModal .join-button');

    joinClassButton.addEventListener('click', function() {
        joinClassModal.classList.add('show');
    });

    cancelButton.addEventListener('click', function() {
        joinClassModal.classList.remove('show');
    });

    joinButton.addEventListener('click', function() {
        // Add join logic here if needed
        console.log("Join button clicked");
        joinClassModal.classList.remove('show'); // Close modal on join for now
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === joinClassModal) {
            joinClassModal.classList.remove('show');
        }
    });

    // --- Attendance Page Specific Logic ---

    // Get all subject boxes and table rows
    const subjectBoxes = document.querySelectorAll('.subject-box');
    const tableRows = document.querySelectorAll('.attendance-table tbody tr');
    const summaryTitle = document.getElementById('summaryTitle');

    // Function to highlight the selected subject and corresponding table row
    function highlightSubject(subjectCode) {
        // Remove active class from all subject boxes
        subjectBoxes.forEach(box => {
            box.classList.remove('active');
        });
        
        // Remove highlight class from all table rows
        tableRows.forEach(row => {
            row.classList.remove('highlight');
        });
        
        // Add active class to selected subject box
        const selectedBox = document.querySelector(`.subject-box[data-subject="${subjectCode}"]`);
        if (selectedBox) {
            selectedBox.classList.add('active');
        }
        
        // Add highlight class to selected table row
        const selectedRow = document.querySelector(`tr[data-subject="${subjectCode}"]`);
        if (selectedRow) {
            selectedRow.classList.add('highlight');
        }
        
        // Update the summary title
        if (selectedBox) {
            summaryTitle.textContent = `Attendance Summary - ${selectedBox.textContent}`;
        }
    }

    // Add click event listeners to all subject boxes
    subjectBoxes.forEach(box => {
        box.addEventListener('click', function() {
            const subjectCode = this.dataset.subject;
            highlightSubject(subjectCode);
        });
    });

    // Initialize with active subject (Statistics is set as active in HTML)
    // If you want to ensure something is highlighted on page load:
    const initialActiveSubject = document.querySelector('.subject-box.active');
    if (initialActiveSubject) {
        const initialSubjectCode = initialActiveSubject.dataset.subject;
        highlightSubject(initialSubjectCode);
    }
});