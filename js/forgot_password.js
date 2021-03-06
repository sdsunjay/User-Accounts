$(document).on('click', '#submit', function() { // catch the form's submit event
   username = document.getElementById('username');
   if (username.value.length > 0) {
        if (checkUsername(username)) {
            // Send data to server through ajax call
            // action is functionality we want to call and outputJSON is our data
            $.ajax({
                url: 'forgot_password.php',
                data: {
                    action: 'checkUsername',
                    username: $("#username").val(),
                    submit: true
                }, //send username and password and submit to forgot_password.php
                type: 'post',
                async: true,
                beforeSend: function() {
                    //Not sure what to do here..
                    // This callback function will trigger before data is sent
                    // $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
                },
                complete: function() {
                    //Not sure what to do here..
                    // This callback function will trigger on data sent/received complete
                    //$.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
                },
                success: function(result) {
                    console.log(result); // works. outputs to console success
                    try {
                        var data = JSON.parse(result);
                    } catch (e) {
                        alert('Error with JSON response from server');
                    }
                    if (data.response == "yes") {
                        $("#question_container").html(data.question);
                      //  $('#Sign-In').hide();
                        $('#shell #contact #Secret-Question #question_container').html(data.question);
                        $('#Secret-Question').show();
                        //alert(data.question);
                    } else if (data.response === "no") {
                        alert(data.msg);
                        //alert('Username does not exist');
                    } else {
                        window.location = "error.php";
                    }
                },
                error: function(request, error) {
                    // This callback function will trigger on unsuccessful action
                    alert('Network error has occurred please try again!');
                }
            });
        }
    } else if (document.getElementById('answer').value.length > 0){
        answer = document.getElementById('answer')
        if (checkAnswer(answer)) {
            // Send data to server through ajax call
            // action is functionality we want to call and outputJSON is our data
            $.ajax({
                    type: 'POST',
                    url: 'forgot_password.php',
                    data: {
                        action: 'checkAnswer',
                        answer: answer.value,
                        submit: true
                    }, //send secret answer and submit to checkAnswer.php
                })
                .done(function(responseData) {
                    var parsed_data = JSON.parse(responseData);
                    //console.log(responseData); // works. outputs to console success
                    if (parsed_data.response == "yes") {
                        $('#Secret-Question').hide();
                        $('#Password').show();
                    } else {
                        alert(parsed_data.response);
                    }
                });
        }
    } else if ($('#password').val().length > 0) {
        if (checkPassword($('#password'), $('#password1'))) {
            // Send data to server through ajax call
            // action is functionality we want to call and outputJSON is our data
            $.ajax({
                    type: 'POST',
                    url: 'forgot_password.php',
                    data: {
                        action: 'checkPassword',
                        password: $("#password").val(),
                        password1: $("#password1").val(),
                        submit: true
                    }, //send secret answer and submit to checkAnswer.php
                })
                .done(function(responseData) {
                    var parsed_data = JSON.parse(responseData);
                    //console.log(responseData); // works. outputs to console success
                    if (parsed_data.response == "yes") {
                        window.location = "protected_page.php";
                    } else {
                        alert(parsed_data.response);
                    }
                });
        }
    }
    return false; // cancel original event to prevent form submitting
});
