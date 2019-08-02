<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	

?>
       <div class="container">
		<div class="row">
		<div class="col-sm-3">
		</div>
		
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
		<div class="panel-heading"><h4>Edit expense</h4></div>
		<div class="panel-body">
		<?php
		
			if(isset($_GET["success_expense"]))

				{

					$success=$_GET["success_expense"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Thank you. Updated successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
				if(isset($_GET["id"]))

				{

					$id=$_GET["id"];

					

				}
				
				$sql = "SELECT * FROM expense where academic_year='".$cur_academic_year."'"; 
				$result = mysqli_query($conn,$sql);
				if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
				?>
								
							
<form action="update_expense.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="<?php echo $row['amount'];?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Towards:</label>
		<input type="text" name="towards" value="<?php echo $row['towards'];?>" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="exp_date" value="<?php echo $row['exp_date'];?>" class="form-control">
	  </div>
	
	 <div class="form-group">
	    <label for="usr">Added by:</label>
		<input type="text" name="added_by" value="<?php echo $row['added_by'];?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Academic Year:</label>
		<input type="text" name="academic_year" value="<?php echo $row['academic_year'];?>" class="form-control">
	  </div>
	 
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	  
	  
	<input type="submit" name="expense" class="btn btn-success" value="Update Edit">
	</form>
	
	<?php
	}
	?>
    </div>
    </div>
    </div>

	<div class="col-sm-3">
		</div>
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