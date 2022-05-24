<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
    $key=$_GET['key'];
    $array = array();
	//require("connection.php");
	$conn = mysqli_connect("localhost","root","","school");
	$sql="SELECT id,first_name,roll_no,present_class FROM students where academic_year='".$cur_academic_year."' and first_name LIKE '%".$key."%' order by first_name";
	$query = mysqli_query($conn,$sql);
	
    while($row=mysqli_fetch_assoc($query))
    {
        $array[] = $row['id'].",".$row['first_name'].",".$row['roll_no'].",".$row['present_class'];
    }

    if(mysqli_num_rows($query)>0){
        echo json_encode($array);
    }else{
        $array[] = "No matching results found!";
        echo json_encode($array);
    }

    
	
}
?>

