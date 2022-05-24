<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];  
require("connection.php");
$sql = "SELECT first_name,roll_no,admission_no,dob,parent_contact,father_name,photo_path,CONCAT_WS('', address,' ', village,' ',taluk,' ', district) AS Full_Address,district FROM `students`"; 

//$sql = "SELECT  first_name,roll_no as STS_No,admission_no as Admission_No,dob as Date_of_Birth,parent_contact as Mobile,father_name,photo_path,village,taluk,district,CONCAT_WS('', address,' ', village,' ',taluk,' ', district) AS Full_Address,district from students where academic_year='".$cur_academic_year."'";


$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Student Name" . "\t" . "STS.No" . "\t" . "Admission No" . "\t" . "Date of Birth" . "\t" . "Mobile" . "\t" . "Father Name" . "\t" . "Photo" . "\t" . "Full Address" . "\t" . "District" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Students.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

echo ucwords($columnHeader) . "\n" . $setData . "\n";  
}
 ?> 