<?php
// connect to the database
include('database_connection.php');
// set the values to null
$usernameVal=$passwordVal="";

// get the username
if(isset($_POST["username"])) {
  // insert mysql_real_escape_string 
  $usernameVal = $_POST['username'];
}
else{
  echo "Username faild to insert.";
}
// get the password
if(isset($_POST["password"]))
{
  $passwordVal = $_POST["password"];
}
else{
  echo "Password faild to insert.";
}
// set the query to get the password hash for certian user
$query="SELECT password , ID FROM users WHERE username = \"$usernameVal\"";
// execute the query
$statement=$connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
// set the password hash
$serverPass = $result[0][0];
// verify if they match
if(password_verify($passwordVal, $serverPass)){
  GetSession($result[0][1]);
}
else{
  echo "Invalid password";
}
// creates and inserts the session id into the database
function GetSession($id){
  // connect to the database
  include('database_connection.php');
  // creat the sessionID
  $sesh = uniqid();
  session_start();
  $_SESSION["idVal"] = $sesh;
  // set the query
  $query="INSERT INTO sessions (`userID`, `sessionID`, `CrDate`, `ExDate`) VALUES ($id, \"$sesh\", NOW(), NOW() + INTERVAL 1 DAY)
   ON DUPLICATE KEY UPDATE `userID` = $id, `sessionID` = \"$sesh\", `CrDate` = NOW(), `ExDate` = NOW() + INTERVAL 1 DAY ";
  // execute the query
  $statement=$connect->prepare($query);
  $statement->execute();
  $result=$statement->fetchAll();
  // redirects you to home page
  echo "you are logged in";
  header("Location: ../index.php");
}
?>
