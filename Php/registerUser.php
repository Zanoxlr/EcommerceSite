<?php
try {
  // connect to the database
  include('database_connection.php');
  // Set the PDO error mode to exception
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
// catch and error
catch(PDOException $e) {
  die("ERROR: Could not connect. ". $e->getMessage());
}
// Attempt insert query execution
try {
  $usernameVal=$passwordVal="";
  // username
  if(isset($_POST["username"])) {
    $usernameTemp = $_POST['username'];
    $usernameVal = CheckIfExist($usernameTemp);
  }
  else{
    echo "Username faild to insert.";
  }
  // mail
  if(isset($_POST["email"])) {
    $emailTemp = $_POST['email'];
    $emailVal = CheckIfExist($emailTemp);   
  }
  else{
    echo "EMail faild to insert.";
  }
  // password
  // if they are identical then hash it
  if($_POST["password"] == $_POST["passwordD"])
  {
    $passwordVal = password_hash($_POST["password"], PASSWORD_DEFAULT);
  }
  else{
    echo "Password faild to insert.";
  }
  
  // insert into the database
  if($usernameVal != null && $emailVal != null && $passwordVal!= null) {
    // set and execute the query
    $sql="INSERT INTO users (Username, Password, Mail) VALUES ( \"$usernameVal\" , \"$passwordVal\" , \"$emailVal\" )";
    $statement=$connect->prepare($sql);
    $statement->execute();
    // echo "ok" and redirect to login 
    echo "Records inserted successfully.";
    header("Location: ../login.php");
  }
  else{
    echo "Records faild to insert.";
  }
  unset($connect);
}

catch(PDOException $e) {
  die("ERROR: Could not able to execute $sql. ". $e->getMessage());
}
// check the database if it exists
function CheckIfExist($stringVal){
  // prepare and execute the query
  $sql="SELECT username FROM users WHERE username = \"$stringVal\"";
  $statement=$connect->prepare($sql);
  $statement->execute();
  $result=$statement->fetchAll();
  // if null return "stringVal"
  if($result == null){
    return $stringVal;
  }
}
?>
