$(document).ready(function () {
    var editBtns = document.querySelectorAll('.edit-btn');
    var employeeNameInput = document.getElementById('employee-name');
    var attendanceDateInput = document.getElementById('attendance-date');
    var attendanceTimeInput = document.getElementById('attendance-time');

    editBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            employeeNameInput.value = btn.getAttribute('data-employee');
            attendanceDateInput.value = btn.getAttribute('data-date');
            attendanceTimeInput.value = btn.getAttribute('data-time');
        });
    });

    $('#edit-attendance-form').on('submit', function (e) {
        e.preventDefault();

        var editedData = {
            employee: employeeNameInput.value,
            date: attendanceDateInput.value,
            time: attendanceTimeInput.value
        };

        $.ajax({
            url: 'update_attendance.php',
            type: 'POST',
            data: editedData,
            success: function (response) {
                console.log('Attendance record updated successfully.');
            },
            error: function (error) {
                console.error('Error updating attendance record:', error);
            }
        });
    });
});
