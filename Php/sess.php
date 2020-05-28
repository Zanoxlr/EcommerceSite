<?php
// set array
$isValidArr = array();
// get array values
$isValidArr = ValidSession(); // [isValid, userID, seshIDVal]

function ValidSession(){
    // get PDO connected
    include('database_connection.php');
    // check id session exists in cookies
    session_start();
    if(!isset($_SESSION["idVal"])){
        $isValid = false;
        $userID = null;
        return array($isValid, $userID, null);
    }
    else{
        // get sessionID value and quote it
        $seshIDVal = $_SESSION["idVal"];
        // get exDate and userID from DB
        $query = "SELECT UserID, exDate FROM `sessions` WHERE sessionID = \"$seshIDVal\"";
        $statement=$connect->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        // get current date
        date_default_timezone_set("Europe/Ljubljana");
        $date = date("Y-m-d G:i:s");
        $userID = $result[0]["UserID"]; // UserID
        // compare crDate and currnet date
        if ($result[0]["exDate"] <= $date) {
            // invalid
            $isValid = FALSE;
        }
        else{
            //valid
            $isValid = TRUE;
        }
        return array($isValid, $userID, $seshIDVal);
    }
}
?>