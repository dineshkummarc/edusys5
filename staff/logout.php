<?php
session_start();
if(isset($_SESSION['staff_uname'])) unset($_SESSION['staff_uname']);
if(isset($_SESSION['admin_id'])) unset($_SESSION['admin_id']);
if(isset($_SESSION['staff_pass'])) unset($_SESSION['staff_pass']);

header("Location:login.php?status=Successfully Logged Out!");
?>