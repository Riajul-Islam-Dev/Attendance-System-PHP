<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Unauthorized access");
}

$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = trim($_POST['username']);
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo 'Please provide valid credentials';
} else {
    $username = $conn->real_escape_string($username);

    $query = "SELECT id, username, password, secret_code FROM employees WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $employee = $result->fetch_assoc();
        if (password_verify($password, $employee['password'])) {
            $_SESSION['employee_id'] = $employee['id'];
            $_SESSION['username'] = $employee['username'];
            $_SESSION['secret_code'] = $employee['secret_code'];
            echo 'Login successful';
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'Invalid credentials';
    }
}

$conn->close();
