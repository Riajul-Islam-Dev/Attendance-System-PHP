<?php
$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT id, full_name FROM employees"; // Fetch employee data

$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
