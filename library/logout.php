<?php
session_start();
//session_destroy();
if(isset($_SESSION['lkg_uname'])) unset($_SESSION['lkg_uname']);
if(isset($_SESSION['lkg_pass'])) unset($_SESSION['lkg_pass']);
header("Location:login.php?status=Successfully Logged Out!");
?>