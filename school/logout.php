<?php
session_start();
//session_destroy();
if(isset($_SESSION['lkg_uname'])) unset($_SESSION['lkg_uname']);
if(isset($_SESSION['lkg_pass'])) unset($_SESSION['lkg_pass']);if(isset($_SESSION['academic_year'])) unset($_SESSION['academic_year']);
header("Location:login.php?status=Successfully Logged Out!");
?>