<?php


$servername = "localhost";


$username = "root";
//$username = "digit3vx_seaclg";


$password = "";
//$password = "vM8}-IXz%Tul";


$dbname = "school";
//$dbname = "digit3vx_seaclg";





// Create connection


$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection


if ($conn->connect_error) {


    die("Connection failed: " . $conn->connect_error);


}


?>