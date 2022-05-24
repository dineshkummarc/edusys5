<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-12"><br>
	<a href="documents.php"><button class="btn btn-success">Go Back</button></a><br>
	<h2>All Documents</h2>
	<table class="table table-bordered">
	<tbody>
	<tr>
	<th>SL No</th>
	<th>Document Name</th>
	<th>Issued Date</th>
	
	</tr>
	<?php 
	$sql = "SELECT * FROM letterhead where academic_year='".$cur_academic_year."' ORDER BY ID DESC";
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	foreach($result as $value){
	$id=$value["id"];
	$printed_date=date('d-m-Y', strtotime( $value['printed_date'] ));
	?>
	<tr>
	<td><?php echo $row_count;?></td>
	<td><a href="<?php echo 'print_letterhead.php?id='.$id;?>"><?php echo $value["lh_title"];?></a></td>
	<td><?php echo $printed_date;?></td>
	
	</tr>
	
	<?php $row_count++; 
	}
	?>

	</table>
	 
	 
	</div>
	</div>
	

    
    </div>
    </div>
    <div id="clearfix">
    </div>

    </div>

<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
