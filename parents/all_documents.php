<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
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
	<th>Title</th>
	<th>Issued Date</th>
	<th>Document Type</th>
	</tr>
	<?php 
	$sql = "SELECT * FROM letterhead ORDER BY ID DESC";
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
	<td><?php echo $value["doc_name"];?></td>
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
 <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php
			
}
else
{
header("Location:login.php");
}
?>  
