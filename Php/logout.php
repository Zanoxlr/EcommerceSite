<?php

if (!isset($_SESSION)) {
     header("Location: ../login.php");
}
session_start();
setcookie(session_name(), '', 100,"/","localhost",true,false);
session_unset();
session_destroy();
$_SESSION = array();
?>