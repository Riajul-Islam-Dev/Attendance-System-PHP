<!DOCTYPE html>
<html>

<head>
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Attendance</h2>
        <form id="edit-attendance-form">
            <div class="mb-3">
                <label for="employee-name" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employee-name" readonly>
            </div>
            <div class="mb-3">
                <label for="attendance-date" class="form-label">Attendance Date</label>
                <input type="date" class="form-control" id="attendance-date">
            </div>
            <div class="mb-3">
                <label for="attendance-time" class="form-label">Attendance Time</label>
                <input type="time" class="form-control" id="attendance-time">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/edit_attendance.js"></script>
</body>

</html>