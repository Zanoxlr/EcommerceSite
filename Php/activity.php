<?php
function PostActivity($activityType){
    // check if sessID is vaild
    include("sess.php");
    if($isValidArr[0] == false){
        // invalid session
        return false;
    }
    else{
        // get sessVal
        $sessVal = $isValidArr[2];
        $userID = $isValidArr[1];
        // QUERY
        include('database_connection.php');
        // get exDate and userID from DB
        //$query = "INSERT INTO activity (UserID, activityID, Date) VALUES ( \"$userID\" , \"$activityType\" , NOW() )";
        $query = "INSERT INTO activity (UserID, activityID, Date) VALUES ( $userID , $activityType , NOW() )";
        $statement=$connect->prepare($query);
        $statement->execute();
        //return true;
    }
}
?>
