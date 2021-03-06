function verifyPassword(password, password1) {
    if (checkPassword(password, password1))
	return true;
    return false;
}
var message;
$(document).on('click', '#submit', function() { // catch the form's submit event
    if (verifyPassword(($("#new_password").val()), $("#new_password1").val())) {
        $.ajax({
            url: "change_password.php",
            data: {
                action: 'change_password',
                old_password: $("#old_password").val(),
                new_password: $("#new_password").val(),
                new_password1: $("#new_password1").val(),
                submit: true
            },
            type: "POST",
            beforeSend: function() {},
            complete: function() {},
            success: function(result) {

                if (result === "Yes") {
                    alert("success");
                    window.location = '#';
                } else if (result === "No") {
                    alert("No");
                    window.location = '#';
                } else {
                    alert(result);
                    //window.location = "error.php";
                }
            },
            // This callback function will trigger on unsuccessful action
            error: function(jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText);
                }
            }
        });
    } else {
        alert(message);
    }
});
