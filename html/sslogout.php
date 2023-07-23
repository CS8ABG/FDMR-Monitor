<?php
// Bye Bye
session_start();
session_destroy();
header("Location: sslogin.php");
exit();
?>