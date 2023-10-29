$(document).ready(function () {
  $("#submit-attendance").click(function () {
    var secretCode = $("#secret_code").val();

    $.post(
      "process_attendance.php",
      { secret_code: secretCode },
      function (data) {
        if (data.startsWith("Attendance submitted successfully")) {
          displayMessage(data, "success");
          // Display saved attendance date and time
          var savedAttendance = data.replace(
            "Attendance submitted successfully on ",
            ""
          );
          $("#attendance-submit-result").html(
            '<div class="alert alert-success" role="alert">' +
              savedAttendance +
              "</div>"
          );
        } else {
          displayMessage(data, "danger");
        }
      }
    );
  });
});

function displayMessage(message, messageType) {
  // Create a Bootstrap alert with the specified message and type
  var alertMessage =
    '<div class="alert alert-' +
    messageType +
    '" role="alert">' +
    message +
    "</div>";

  // Display the alert in the appropriate result element
  $("#attendance-submit-result").html(alertMessage);
}
