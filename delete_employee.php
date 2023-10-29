<?php
$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$delete_query = "DELETE FROM employees WHERE id = '$id'";

if ($conn->query($delete_query) === TRUE) {
    echo "Employee deleted successfully";
} else {
    echo "Error deleting employee: " . $conn->error;
}

$conn->close();
?>
