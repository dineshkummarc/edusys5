<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
    $key=$_GET['key'];
    $array = array();
    $con = mysqli_connect("localhost","root","","school");
	$sql="select first_name,present_class,roll_no from students where academic_year='".$cur_academic_year."' and first_name LIKE '%{$key}%'";
	$query = mysqli_query($con,$sql);
    
    while($row=mysqli_fetch_assoc($query))
    {
	$array[] = $row['first_name'].",".$row['present_class'].",".$row['roll_no'];
    }
    echo json_encode($array);
	
}
?>

