<?php
// connect to the database
include('database_connection.php');
// set the values to null
$usernameVal=$passwordVal=$message="";
// get the username
if(isset($_POST["username"])) {
  $usernameVal = $_POST['username'];
} else{
  // username not inserted
  $message .= "2";
}
  // get the password
if(isset($_POST["password"]))
{
  $passwordVal = $_POST["password"];
} else{
  // password not inserted
  $message .= "3";
}
// set the query to get the password hash for certian user
$query="SELECT password , ID FROM users WHERE username = \"$usernameVal\"";
// execute the query
$statement=$connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();

if($result == null){
  // unknown username
  $message = "0";
  echo $message;
}
else{
  // set the server password hash
  $serverPass = $result[0][0]; // password
  // verify password
  if(password_verify($passwordVal, $serverPass)){
    $message .= GetSession($result[0][1]); // ID
  }
  else{
    // password is invalid
    $message .= "4";
  }
  echo $message;
}
// creates and inserts the session id into the database
function GetSession($id){
  // connect to the database
  include('database_connection.php');
  // creat the sessionID
  $sesh = uniqid();
  session_start();
  $_SESSION["idVal"] = $sesh;
  // set and execute the query
  $query="INSERT INTO sessions (`userID`, `sessionID`, `CrDate`, `ExDate`) VALUES ($id, \"$sesh\", NOW(), NOW() + INTERVAL 1 DAY)";
  $statement=$connect->prepare($query);
  $statement->execute();
  // set message ok
  return "1";
}
?>