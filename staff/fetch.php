<?php
//fetch.php
require("connection.php");

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM students 
  WHERE first_name LIKE '%".$search."%'
  OR roll_no LIKE '%".$search."%' 
  OR present_class LIKE '%".$search."%' 
  OR academic_year LIKE '%".$search."%' 
  OR parent_contact LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM students ORDER BY id
 ";
} 
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Student Name</th>
     <th>Roll No</th>
     <th>Class</th>
     <th>Academic Year</th>
     <th>Mobile</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'</td>
    <td>'.$row["roll_no"].'</td>
    <td>'.$row["present_class"].'</td>
    <td>'.$row["academic_year"].'</td>
    <td>'.$row["parent_contact"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>