<?php
$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT employees.full_name, attendance.attendance_date, attendance.attendance_time FROM attendance
          JOIN employees ON attendance.employee_id = employees.id
          ORDER BY attendance.attendance_date DESC";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
