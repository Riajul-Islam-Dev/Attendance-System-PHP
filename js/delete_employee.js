function deleteEmployee(id) {
    if (confirm("Are you sure you want to delete this employee?")) {
        $.ajax({
            url: 'delete_employee.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                location.reload();
            },
            error: function() {
                alert("Error deleting employee.");
            }
        });
    }
}
