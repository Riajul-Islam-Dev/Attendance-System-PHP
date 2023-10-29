$(document).ready(function () {
    $("#register-button").click(function () {
        var fullName = $("#full_name").val().trim();
        var username = $("#username").val().trim();
        var password = $("#password").val();
        var secretCode = $("#secret_code").val();

        if (fullName === '' || username === '' || password === '' || secretCode === '') {
            $("#registration-result").html('<div class="alert alert-danger" role="alert">Please fill in all fields.</div>');
            return;
        }

        $.ajax({
            type: "POST",
            url: "process_registration.php",
            data: {
                full_name: fullName,
                username: username,
                password: password,
                secret_code: secretCode
            },
            dataType: "text",
            success: function (data) {
                if (data === "Employee registered successfully") {
                    window.location.href = "index.php";
                } else {
                    $("#registration-result").html('<div class="alert alert-danger" role="alert">' + data + "</div>");
                }
            },
            error: function () {
                $("#registration-result").html('<div class="alert alert-danger" role="alert">An error occurred while processing your request.</div>');
            }
        });
    });
});
