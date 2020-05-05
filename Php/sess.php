<?php
$isValidArr = array();

$isValidArr = ValidSession();

function ValidSession(){
    
    include('database_connection.php');

    session_start();
    if(!isset($_SESSION["idVal"])){
        $isValid = FALSE;
        $userID = null;
        return array($isValid, $userID);
    }
    else{
        $seshIDVal = $_SESSION["idVal"];

        $query = "SELECT * FROM `sessions` WHERE sessionID = \"$seshIDVal\"";

        $statement=$connect->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        
        date_default_timezone_set("Europe/Ljubljana");
        $date = date("Y-m-d G:i:s");
        $userID = $result[0][0];

        if ($result[0][3] <= $date) {
            // invalid
            $isValid = FALSE;
        }
        else{
            //valid
            $isValid = TRUE;
        }
        return array($isValid, $userID);
    }
}
?>