<?php
session_start();
//session_destroy();
if(isset($_SESSION['staff_uname'])) unset($_SESSION['staff_uname']);
if(isset($_SESSION['staff_pass'])) unset($_SESSION['staff_pass']);
header("Location:login.php?status=Successfully Logged Out!");
?>