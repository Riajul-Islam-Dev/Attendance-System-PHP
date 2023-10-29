<!DOCTYPE html>
<html>

<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="mb-3">Employee Details and Attendance</h2>
                <a href="employee_list.php" class="btn btn-secondary">Back to Employee List</a>
                <table id="attendance-details-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Attendance Date</th>
                            <th>Attendance Time</th>
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
            var employeeId = <?php echo $_GET['id']; ?>; // Get employee ID from URL parameter

            $('#attendance-details-table').DataTable({
                ajax: {
                    url: 'employee_attendance_data.php?id=' + employeeId, // URL to fetch attendance data for a specific employee
                    dataSrc: '' // JSON array root (if applicable)
                },
                columns: [
                    { data: 'attendance_date' },
                    { data: 'attendance_time' },
                ],
                // Additional DataTable options
            });
        });
    </script>
</body>

</html>
