<?php
// set as array
$isValidArr = array();
// get the array values
$isValidArr = ValidSession();
// check if the session is valid
function ValidSession(){
    // connect to the database
    include('database_connection.php');
    // if no session
    session_start();
    if(!isset($_SESSION["idVal"])){
        $isValid = FALSE;
        $userID = null;
        return array($isValid, $userID);
    }
    // sesison exists
    else{
        // get the session id
        $seshIDVal = $_SESSION["idVal"];
        // prepare and execute the query
        $query = "SELECT * FROM `sessions` WHERE sessionID = \"$seshIDVal\"";
        $statement=$connect->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        // set the date in the right format
        date_default_timezone_set("Europe/Ljubljana");
        $date = date("Y-m-d G:i:s");
        // get the userID
        $userID = $result[0][0];
        // invalid date
        if ($result[0][3] <= $date) {
            $isValid = FALSE;
        }
        // valid date
        else{
            $isValid = TRUE;
        }
        // return the array
        return array($isValid, $userID);
    }
}
?>
