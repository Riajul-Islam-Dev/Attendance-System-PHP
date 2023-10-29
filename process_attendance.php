<?php
session_start();
if (!isset($_SESSION['employee_id'])) {
    echo 'Unauthorized access';
    exit();
}

$host = 'localhost';
$db = 'attendance_system_php';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employee_id = $_SESSION['employee_id'];
$secret_code = $_SESSION['secret_code'];

$input_code = $_POST['secret_code'];

if ($input_code !== $secret_code) {
    echo 'Invalid secret code';
} else {
    date_default_timezone_set('Asia/Dhaka'); // Set your server's timezone to Asia/Dhaka

    $current_date = date('Y-m-d');

    // Check if employee already submitted attendance for the current date
    $check_query = "SELECT COUNT(*) AS attendance_count FROM attendance WHERE employee_id = '$employee_id' AND DATE(attendance_date) = '$current_date'";
    $check_result = $conn->query($check_query);

    if ($check_result === false) {
        echo 'Error checking attendance: ' . $conn->error;
    } else {
        $row = $check_result->fetch_assoc();
        $attendance_count = $row['attendance_count'];

        if ($attendance_count > 0) {
            echo 'Attendance already submitted for today';
        } else {
            // Insert new attendance record
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $insert_query = "INSERT INTO attendance (employee_id, attendance_date, attendance_time) VALUES ('$employee_id', '$date', '$time')";
            $check_insert_result = $conn->query($insert_query);

            if ($check_insert_result === true) {
                $attendance_time = date('H:i:s');
                $attendance_date = date('Y-m-d');
                $success_message = "Attendance submitted successfully on $attendance_date at $attendance_time";
                echo $success_message;
            } else {
                echo 'Error submitting attendance: ' . $conn->error;
            }
        }
    }
}

$conn->close();
