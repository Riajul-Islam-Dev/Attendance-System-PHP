<!DOCTYPE html>
<html>

<head>
    <title>Admin Attendance Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="mb-3">Admin Attendance Dashboard</h2>
                <p>Welcome, Admin!</p>
                <p>Current Time: <span id="current-time"></span></p>
                <div>
                    <a href="attendance_form.php" class="btn btn-primary">Submit Attendance</a>
                    <a href="register_employee.php" class="btn btn-success">Register New Employee</a>
                    <a href="employee_list.php" class="btn btn-info">View Employee List</a>
                </div>
                <table id="attendance-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Attendance Date</th>
                            <th>Attendance Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Attendance data will be loaded dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#attendance-table').DataTable({
                ajax: {
                    url: 'attendance_data.php',
                    dataSrc: ''
                },
                columns: [
                    { data: 'full_name' },
                    { data: 'attendance_date' },
                    { data: 'attendance_time' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                <button class="btn btn-primary edit-btn" data-employee="${row.full_name}" data-date="${row.attendance_date}" data-time="${row.attendance_time}">Edit</button>
                                <button class="btn btn-danger delete-btn" data-id="${row.id}">Delete</button>
                            `;
                        }
                    }
                ],
                // Additional DataTable options
            });

            $('#attendance-table').on('click', '.delete-btn', function () {
                var employeeId = $(this).data('id');

                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: 'delete_attendance.php',
                        type: 'POST',
                        data: { id: employeeId },
                        success: function (response) {
                            console.log('Attendance record deleted successfully.');
                            table.row($(this).parents('tr')).remove().draw();
                        },
                        error: function (error) {
                            console.error('Error deleting attendance record:', error);
                        }
                    });
                }
            });

            function updateTime() {
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var seconds = currentTime.getSeconds();
                var ampm = hours >= 12 ? 'PM' : 'AM';

                hours = hours % 12;
                hours = hours ? hours : 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                var formattedTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
                document.getElementById('current-time').textContent = formattedTime;
            }

            updateTime();
            setInterval(updateTime, 1000);
        });
    </script>
</body>

</html>
