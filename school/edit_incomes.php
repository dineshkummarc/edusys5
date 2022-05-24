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
		<div class="panel-heading"><h4>Edit Income</h4></div>
		<div class="panel-body">
		<?php
		
			if(isset($_GET["success_income"]))

				{

					$success=$_GET["success_income"];

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
				
				$sql = "SELECT * FROM income"; 
				$result = mysqli_query($conn,$sql);
				if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
				?>
								
							
<form action="update_income.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="<?php echo $row['amount'];?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Source:</label>
		<input type="text" name="source" value="<?php echo $row['source'];?>" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" value="<?php echo $row['rec_date'];?>" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="number" name="rec_no" value="<?php echo $row['rec_no'];?>" class="form-control">
	  </div>
	 
	
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	  
	  
	<input type="submit" name="income" class="btn btn-success" value="Update Edit">
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
	}else{
		header("Location:login.php");
	}
	



?>