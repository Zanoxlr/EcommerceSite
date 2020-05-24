$(document).ready(function() {
    // checks for submit
    $("#submit").click(function() {
        loginInput();
    });
});

function loginInput() {
    // get login info
    $username = $("#inputUsername").val();
    $password = $("#inputPassword").val();
    console.log($username);
    // post data to server
    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: { username: $username, password: $password },
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
// return a string error by id
function errorHandler($errorID) {
    // add a comma if more ids
    if ($message != "") {
        $message += ",";
    }
    // unknown username
    if ($errorID == 0) {
        $message += " unknown username";
    } else if ($errorID == 1) {
        // success, ok
        $message += "ok";
        window.location.href = "index.php";
    } else if ($errorID == 2) {
        // username not inserted
        $message += " username not inserted";
    } else if ($errorID == 3) {
        // password not inserted
        $message += " password not inserted";
    } else if ($errorID == 4) {
        // invalid password
        $message += " password is invalid";
    } else {
        $message += " no data";
    }
}
