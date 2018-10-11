<?php
session_start();
//session_destroy();
if(isset($_SESSION['class_uname'])) unset($_SESSION['class_uname']);
if(isset($_SESSION['class_pass'])) unset($_SESSION['class_pass']);
header("Location:login.php?status=Successfully Logged Out!");
?>