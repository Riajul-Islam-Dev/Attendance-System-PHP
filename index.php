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

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            max-width: 600px;
            padding: 40px;
            border-radius: 10px;
            background-color: #0D1117;
            position: relative;
        }

        /* White shadow effect */
        .login-card::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
            pointer-events: none;
            /* Ensure the pseudo-element is not interactive */
        }

        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style form elements within the card */
        .login-card input,
        .login-card button {
            z-index: 1;
            /* Ensure form elements are on top of the pseudo-element */
        }

        .login-button-teal {
            background-color: #008080;
            /* Teal */
            color: #fff;
            /* White text */
            border: none;
        }

        .login-button-teal:hover {
            background-color: #00CED1;
            /* Slightly lighter teal on hover */
        }

        .alert.alert-danger {
            background-color: #ff6b6b;
            /* Red background */
            border: 1px solid #ff5252;
            /* Red border */
            color: #fff;
            /* White text */
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .login-heading {
            font-size: 30px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 20px 0;
            text-shadow: 0 0 10px rgba(255, 255, 0, 0.5), 0 0 20px rgba(255, 255, 0, 0.5), 0 0 30px rgba(255, 255, 0, 0.5);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <img src="image/softkit_logo-yellow.png" alt="SoftKit Logo" width="100" class="img-fluid">
            </div>
            <h2 class="mb-3 text-center login-heading">Employee Login</h2>
            <form id="login-form">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <!-- <button type="button" id="login-button" class="btn btn-primary">Login</button> -->
                    <button type="button" id="login-button" class="btn btn-primary login-button-teal">Login</button>
                </div>
            </form>
            <div id="login-result" class="mt-3 text-center">
                <!-- The error message will be inserted here -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>