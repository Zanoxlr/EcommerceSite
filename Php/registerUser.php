<?php
try {
  include('database_connection.php');

  // Set the PDO error mode to exception
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
  die("ERROR: Could not connect. ". $e->getMessage());
}

// Attempt insert query execution
try {
  $usernameVal=$passwordVal="";
 
  // username
  if(isset($_POST["username"])) {
    $usernameTemp = $_POST['username'];

    $sql="SELECT username FROM users WHERE username = \"$usernameTemp\"";
    $statement=$connect->prepare($sql);
    $statement->execute();
    $result=$statement->fetchAll();

    if($result == null){
      $usernameVal = $usernameTemp;
    }
  }
  else{
    echo "Username faild to insert.";
  }
  // mail
  if(isset($_POST["email"])) {
    $emailTemp = $_POST['email'];

    $sql="SELECT mail FROM users WHERE mail = \"$emailTemp\"";
    $statement=$connect->prepare($sql);
    $statement->execute();
    $result=$statement->fetchAll();

    if($result == null){
      $emailVal = $emailTemp;
    }
  }
  else{
    echo "EMail faild to insert.";
  }
  // password
  if($_POST["password"] == $_POST["passwordD"])
  {
    $passwordVal=password_hash($_POST["password"], PASSWORD_DEFAULT);
  }
  else{
    echo "Password faild to insert.";
  }
  
  // INSERT INTO DB
  if($usernameVal != null && $emailVal != null && $passwordVal!= null) {

    $sql="INSERT INTO users (Username, Password, Mail) VALUES ( \"$usernameVal\" , \"$passwordVal\" , \"$emailVal\" )";
    $statement=$connect->prepare($sql);
    $statement->execute();
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

?>