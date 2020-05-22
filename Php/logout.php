<?php
// check if session exists
if (!isset($_SESSION)) {
     header("Location: ../login.php");
}
// destroy the session
session_start();
setcookie(session_name(), '', 100,"/","localhost",true,false);
session_unset();
session_destroy();
$_SESSION = array();
?>
