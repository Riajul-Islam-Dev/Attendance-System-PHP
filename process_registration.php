<?php
$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullName = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$secretCode = $_POST['secret_code'];

if (empty($fullName) || empty($username) || empty($password) || empty($secretCode)) {
    echo '<div class="alert alert-danger" role="alert">Please provide valid information</div>';
} else {
    $fullName = $conn->real_escape_string($fullName);
    $username = $conn->real_escape_string($username);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $check_username_query = "SELECT COUNT(*) AS username_count FROM employees WHERE username = '$username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result && $check_username_result->fetch_assoc()['username_count'] > 0) {
        echo '<div class="alert alert-danger" role="alert">Username already exists</div>';
    } else {
        // Insert new employee record
        $insert_query = "INSERT INTO employees (full_name, username, password, secret_code) 
                         VALUES ('$fullName', '$username', '$hashedPassword', '$secretCode')";
        
        if ($conn->query($insert_query) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Employee registered successfully</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error registering employee: ' . $conn->error . '</div>';
        }
    }
}

$conn->close();
?>
