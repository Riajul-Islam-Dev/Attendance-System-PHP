<?php
$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employeeId = $_GET['id']; // Get employee ID from URL parameter

$query = "SELECT id, full_name, username, secret_code FROM employees WHERE id = $employeeId";

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $employeeData = $result->fetch_assoc();
?>

<form id="edit-employee-form">
    <input type="hidden" id="employee_id" value="<?php echo $employeeData['id']; ?>">
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $employeeData['full_name']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $employeeData['username']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="secret_code" class="form-label">Secret Code</label>
        <input type="password" class="form-control" id="secret_code" name="secret_code" value="<?php echo $employeeData['secret_code']; ?>" required>
    </div>
    <button type="button" id="update-employee-button" class="btn btn-primary">Update</button>
    <div id="update-result" class="mt-3"></div>
</form>

<?php
} else {
    echo '<div class="alert alert-danger" role="alert">Employee not found</div>';
}

$conn->close();
?>
