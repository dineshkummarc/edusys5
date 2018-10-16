<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","password");
    $db=mysql_select_db("db_name",$con);
    $query=mysql_query("select first_name,present_class,roll_no from students where academic_year='".$cur_academic_year."' and first_name LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
	//$array = array();
    $array[] = $row['first_name'].",".$row['present_class'].",".$row['roll_no'];
    //$array[] = $row['present_class'];
   
 
    }
    echo json_encode($array);
}
?>

