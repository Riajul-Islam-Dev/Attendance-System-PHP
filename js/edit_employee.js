$(document).ready(function () {
    var employeeId = getEmployeeIdFromUrl();
    
    // Function to extract employee ID from URL
    function getEmployeeIdFromUrl() {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('id');
    }

    // Fetch and display employee data
    function fetchEmployeeData() {
        $.get("get_employee.php", { id: employeeId }, function (data) {
            $("#edit-employee-form").html(data);
        });
    }

    // Update employee data
    $("#update-button").click(function () {
        var fullName = $("#full_name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var secretCode = $("#secret_code").val();

        $.post("process_update_employee.php", {
            id: employeeId,
            full_name: fullName,
            username: username,
            password: password,
            secret_code: secretCode
        }, function (response) {
            $("#update-result").html(response);
        });
    });

    // Initial actions
    fetchEmployeeData();
});
