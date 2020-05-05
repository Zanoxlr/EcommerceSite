<?php
// LOGIN
include('database_connection.php');

try {
  $usernameVal=$passwordVal="";

  // username
  if(isset($_POST["username"])) {
    // insert mysql_real_escape_string 
    $usernameVal = $_POST['username'];
  }
  else{
    echo "Username faild to insert.";
  }
  // password
  if(isset($_POST["password"]))
  {
    $passwordVal = $_POST["password"];
  }
  else{
    echo "Password faild to insert.";
  }

  $query="SELECT password , ID FROM users WHERE username = \"$usernameVal\"";
  
  $statement=$connect->prepare($query);
  $statement->execute();
  $result=$statement->fetchAll();

  $serverPass = $result[0][0];

  if(password_verify($passwordVal, $serverPass)){
    
    GetSession($result[0][1]);
  }
  else{
    echo "Invalid password";
  }
  
  unset($connect);
}

catch(PDOException $e) {
  die("ERROR: Could not able to execute $sql. ". $e->getMessage());
}

function GetSession($id){
  
  
  include('database_connection.php');

  $sesh = uniqid();
  session_start();
  $_SESSION["idVal"] = $sesh;

  $query="INSERT INTO sessions (`userID`, `sessionID`, `CrDate`, `ExDate`) VALUES ($id, \"$sesh\", NOW(), NOW() + INTERVAL 1 DAY)
   ON DUPLICATE KEY UPDATE `userID` = $id, `sessionID` = \"$sesh\", `CrDate` = NOW(), `ExDate` = NOW() + INTERVAL 1 DAY ";
  
  $statement=$connect->prepare($query);
  $statement->execute();
  $result=$statement->fetchAll();
  echo "you are logged in";
  header("Location: ../index.php");
}

?>