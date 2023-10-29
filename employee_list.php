<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="mb-3">Employee List</h2>
                <a href="register_employee.php" class="btn btn-success">Register New Employee</a>
                <table id="employee-list-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#employee-list-table').DataTable({
                ajax: {
                    url: 'employee_data.php', // URL to fetch employee data
                    dataSrc: '' // JSON array root (if applicable)
                },
                columns: [
                    { data: 'id' },
                    { data: 'full_name' },
                    { 
                        data: null,
                        render: function (data) {
                            return `
                                <a href="employee_details.php?id=${data.id}" class="btn btn-info btn-sm">View Details</a>
                                <a href="edit_employee.php?id=${data.id}" class="btn btn-primary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="deleteEmployee(${data.id})">Delete</button>
                            `;
                        }
                    },
                ],
                // Additional DataTable options
            });
        });

        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete this employee?")) {
                $.post("delete_employee.php", { id: id }, function (data) {
                    if (data === 'success') {
                        alert('Employee deleted successfully');
                        location.reload();
                    } else {
                        alert('Error deleting employee');
                    }
                });
            }
        }
    </script>
</body>

</html>
