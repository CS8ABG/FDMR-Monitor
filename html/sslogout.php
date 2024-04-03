<?php
// Bye Bye
session_start();
session_destroy();
 
session_start();
$_SESSION['autologin'] = false;
header("Location: sslogin.php");
exit();