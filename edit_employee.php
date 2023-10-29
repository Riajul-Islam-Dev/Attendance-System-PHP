<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Edit Employee</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $host = 'localhost';
                        $db = 'attendance_system_php';
                        $user = 'root';
                        $pass = '';

                        $conn = new mysqli($host, $user, $pass, $db);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $employeeId = $_GET['id'];

                        $query = "SELECT * FROM employees WHERE id = '$employeeId'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        }
                        ?>
                        <form id="edit-employee-form">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep the same password">
                            </div>
                            <div class="mb-3">
                                <label for="secret_code" class="form-label">Secret Code</label>
                                <input type="password" class="form-control" id="secret_code" name="secret_code" value="<?php echo $row['secret_code']; ?>" required>
                            </div>
                            <button type="button" id="update-button" class="btn btn-primary">Update</button>
                        </form>
                        <div id="update-result" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/edit_employee.js"></script>
</body>

</html>
