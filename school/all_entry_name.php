<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from entry_name order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<a href="add_entry_name.php"><button type="button" class="btn btn-success">+ Add Category Name</button></a>
	<h3>All Category Names</h3>
	<table class="table table-bordered">
	<th>Category Name</th>
	<th>Account</th>
	<th>Added Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	$added_date= date('d-m-Y', strtotime( $row['added_date'] ));
	$entry_name=$row["entry_name"];
	$account_name_id=$row["account_name_id"];
	
	$sql_acc_name = "select account_name from account_names where id='".$account_name_id."'";
	$result_acc_name = mysqli_query($conn, $sql_acc_name);
	if($row_acc_name=mysqli_fetch_array($result_acc_name,MYSQLI_ASSOC))
	{
		$account_name = $row_acc_name["account_name"];

	}

	?>
	 <tr> 
	 <td><?php echo $entry_name;?></td> 
	 <td><?php echo $account_name;?></td> 
	 <td><?php echo $added_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_entry_name.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td>

		<script>
		  function deleteme(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_entry_name.php?id='+id+'';
			  }
		  }
		  
		  </script>
</tr> 
	 <?php 
	}
	 ?>
	</table>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
	</div>

  </div>
 
</div>



<?php require("footer.php"); } else { header("Location:login.php");} ?>  
