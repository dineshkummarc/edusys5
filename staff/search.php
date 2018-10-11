<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("school",$con);
    $query=mysql_query("select first_name,present_class,roll_no from students where first_name LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
	//$array = array();
    $array[] = $row['first_name'].",".$row['present_class'].",".$row['roll_no'];
    //$array[] = $row['present_class'];
   
 
    }
    echo json_encode($array);
?>
