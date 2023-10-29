$(document).ready(function () {
  $("#login-button").click(function () {
    var username = $("#username").val().trim();
    var password = $("#password").val();

    if (username === "" || password === "") {
      $("#login-result").html(
        '<div class="alert alert-danger" role="alert">Please fill in all fields.</div>'
      );
      return;
    }

    $.ajax({
      type: "POST",
      url: "process_login.php",
      data: { username: username, password: password },
      dataType: "text",
      success: function (data) {
        if (data === "Login successful") {
          window.location.href = "attendance_form.php";
        } else {
          displayErrorMessage(data);
        }
      },
      error: function () {
        displayErrorMessage("An error occurred while processing your request.");
      },
    });

    function displayErrorMessage(message) {
      // Create a Bootstrap alert with a red background (danger)
      var errorMessage =
        '<div class="alert alert-danger" role="alert">' + message + "</div>";

      // Display the error message in the login-result div
      $("#login-result").html(errorMessage);
    }
  });

  $("#submit-attendance").click(function () {
    var secretCode = $("#secret_code").val();

    $.post(
      "process_attendance.php",
      { secret_code: secretCode },
      function (data) {
        $("#attendance-result").html(
          '<div class="alert alert-danger" role="alert">' + data + "</div>"
        );
      }
    );
  });
});
