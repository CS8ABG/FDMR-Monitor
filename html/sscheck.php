<?php
session_start();
include_once "ssconfunc.php";
if (!isset($_SESSION['selected_int_id'])) {
    header("Location: sslogin.php");
    exit();
}

// Check modified status
if (isset($_SESSION['selected_int_id'])) {
    $user_id = $_SESSION['selected_int_id'];
    $devDetails = getDevDetails($user_id);
    echo $devDetails['modified'];
}

?>
