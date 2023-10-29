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

$query = "SELECT attendance_date, attendance_time FROM attendance WHERE employee_id = $employeeId";

$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
