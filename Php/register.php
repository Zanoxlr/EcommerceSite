<?php
// connect to the database
include('database_connection.php');
// set the values to null
$usernameVal=$passwordVal=$message="";

// get the username
if(isset($_POST["username"])) {
  $usernameTemp = $connect->quote($_POST['username']);
  // check if username exists in the database
  $sql = "SELECT username FROM users WHERE username = \"$usernameTemp\"";
  $statement = $connect->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
  // check the result if exists
  if ($result == null) {
    $usernameVal = $usernameTemp;
  } else {
    $errorID.= "3";
  }
}

// get the mail
if (isset($_POST["mail"])) {
  $emailTemp = $connect->quote($_POST['mail']);
  // check if mail address exists in the database
  $sql = "SELECT mail FROM users WHERE mail = \"$emailTemp\"";
  $statement = $connect->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
  // check the result if exists
  if ($result == null) {
    $emailVal = $emailTemp;
  } else {
    $errorID .= "4";
  }
}

// hash the password password
if (isset($_POST["password"])) {
  $passwordValHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
  // quote for database insert
  $passwordVal = $connect->quote($passwordValHash);
} else {
  $errorID .= "2";
}

// insert into the database
if ($usernameVal != null && $emailVal != null && $passwordVal != null) {
  // prepare and executhe the query
  $sql = "INSERT INTO users (Username, Password, Mail) VALUES ( \"$usernameVal\" , \"$passwordVal\" , \"$emailVal\" )";
  $statement = $connect->prepare($sql);
  $statement->execute();
  $errorID .= "1";
} else {
  $errorID .= "5";
}
// echo the errors
echo $errorID;
?>
