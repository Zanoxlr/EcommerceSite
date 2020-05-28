$(document).ready(function() {
    // checks for submit
    $("#submit").click(function() {
        RegisterInput();
    });
});


function RegisterInput() {
    // get login info
    $username = $("#inputUsername").val();
    $mail = $("#inputMail").val();
    $password = $("#inputPassword").val();
    $passwordRepeat = $("#inputPasswordRepeat").val();

    if ($password != $passwordRepeat) {
        errorHandler(2);
    } else {
        // post data to server
        $.ajax({
            type: "POST",
            url: "php/register.php",
            data: { username: $username, mail: $mail, password: $password },
            success: function(data) {
                // gets data back
                $message = "";
                // get info from server
                for (var i = 0; i < data.length; i++) {
                    errorHandler(data.charAt(i));
                };
                // show message
                $("#labelInfo").text($message);
            }
        })
    }
}

function errorHandler($errorID) {
    if ($message != "") {
        $message += ",";
    }
    if ($errorID == 1) {
        // success, ok
        $message += "ok";
        window.location.href = "login.php";
    } else if ($errorID == 2) {
        // invalid/unmatched password
        $message += " invalid/unmatching password/s";
    } else if ($errorID == 3) {
        // username exists
        $message += " username exists";
    } else if ($errorID == 4) {
        // email exists
        $message += " email exists";
    } else if ($errorID == 5) {
        // failed to insert
        $message += " failed to insert";
    } else {
        // no data ... error
        $message += " no data";
    }
}