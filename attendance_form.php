<!DOCTYPE html>
<html>

<head>
    <title>Employee Attendance System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #010409;
            color: white;
        }

        .submit-attendance-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .submit-attendance-card {
            max-width: 600px;
            padding: 40px;
            border-radius: 10px;
            background-color: #0D1117;
            position: relative;
        }

        /* White shadow effect */
        .submit-attendance-card::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
            pointer-events: none;
        }

        .submit-attendance-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style form elements within the card */
        .submit-attendance-card input,
        .submit-attendance-card button {
            z-index: 1;
        }

        .submit-attendance-button-teal {
            background-color: #008080;
            color: #fff;
            border: none;
        }

        .submit-attendance-button-teal:hover {
            background-color: #00CED1;
        }

        .alert.alert-danger {
            background-color: #ff6b6b;
            border: 1px solid #ff5252;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .additional-content {
            margin-top: 20px;
            text-align: center;
        }

        .submit-attendance-heading {
            font-size: 30px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 20px 0;
            text-shadow: 0 0 10px rgba(255, 255, 0, 0.5), 0 0 20px rgba(255, 255, 0, 0.5), 0 0 30px rgba(255, 255, 0, 0.5);
        }

        /* Style the additional content */
        .additional-content {
            text-align: center;
            margin-top: 20px;
        }

        /* Style the welcome text */
        .welcome-text {
            font-size: 18px;
            color: #008080;
            margin-top: 10px;
        }

        /* Style the username span */
        .username {
            font-weight: bold;
            text-transform: capitalize;
            color: #ff6b6b;
        }

        /* Style the Secret Code label */
        .secret-code-label {
            font-weight: bold;
            color: #008080;
            font-size: 16px;
        }

        /* Style the Secret Code input */
        .secret-code-input {
            border: 1px solid #008080;
            border-radius: 5px;
            font-size: 16px;
            padding: 10px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="submit-attendance-container">
        <div class="submit-attendance-card">
            <div class="submit-attendance-logo">
                <img src="image/softkit_logo-yellow.png" alt="SoftKit Logo" width="100" class="img-fluid">
            </div>
            <h2 class="mb-3 text-center submit-attendance-heading">Submit Attendance</h2>
            <?php
            session_start();
            if (isset($_SESSION['employee_id'])) {
                $employee_id = $_SESSION['employee_id'];
                echo '<div class="additional-content">';
                if ($employee_id == 1) {
                    echo '<a href="dashboard.php" class="btn btn-outline-warning mb-2">Go to Dashboard</a>';
                }
                if (isset($_SESSION['username'])) {
                    echo '<p class="welcome-text">Welcome, <span class="username">' . $_SESSION['username'] . '</span>!</p>';
                }
                echo '</div>';
            }
            ?>
            <form id="submit-attendance-form">
                <div class="mb-3">
                    <label for="secret_code" class="form-label secret-code-label">Enter Your Secret Code</label>
                    <input type="password" class="form-control secret-code-input" id="secret_code" name="secret_code" required>
                </div>
                <div class="text-center">
                    <button type="button" id="submit-attendance" class="btn btn-primary submit-attendance-button-teal">Submit Attendance</button>
                </div>
            </form>
            <div id="attendance-submit-result" class="mt-3 text-center">
                <!-- The error message will be inserted here -->
            </div>
            <div class="text-center mt-2">
                <a href="index.php" class="btn btn-outline-danger">Log Out</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/attendance_ajax.js"></script>
</body>

</html>