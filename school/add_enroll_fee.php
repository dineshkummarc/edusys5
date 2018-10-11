<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
$id=$_GET["id"];
$sql="select * from enrolled_students where id='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$first_name=$row["first_name"];
		$st_enroll_no=$row["st_enroll_no"];
		$fee_paid_amount=$row["fee_paid_amount"];
		$first_name=$row["first_name"];
	}		

?>
       <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Enrollment Fee</h4></div>
      <div class="panel-body">
	  
	  <?php
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
		<strong>Success</strong> Updated successfully.
	</div>
		  <?php
	  }
	  ?>
	  <h4 style="color:green;">Student Name : <?php echo $first_name;?> , Paid Fee : <?php echo $fee_paid_amount;?></h4>
	  
	  <form action="insert_enroll_fee.php" method="post">
	  <div class="form-group">
	    <label for="usr">First Name</label>
		<input type="text"  name="first_name" value="<?php echo $first_name;?>" class="form-control" readonly>
	  </div>
	  
	  
	   <div class="form-group">
	    <label for="usr">Enrollment No</label>
		<input type="text"  name="st_enroll_no" value="<?php echo $st_enroll_no;?>" class="form-control" readonly>
	  </div>
	  <div class="form-group">
	    <label for="usr">Amount</label>
		<input type="text"  name="fee_paid_amount" value="" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Receipt Date</label>
		<input type="date"  name="fee_receipt_date" value="" class="form-control">
	  </div>
	  
	   <div class="form-group">
	    <label for="usr">Receipt No</label>
		<input type="text"  name="fee_receipt_no" value="" class="form-control">
		
	  </div>
		<input type="hidden"  name="id" value="<?php echo $id;?>" class="form-control">

	 <input type="submit" class="btn btn-primary" value="Update Fee"> 
	</form>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		</div>
		
    </div>
    </div>



<?php 



	}else{
		header("Location:login.php");
	}
	



?>