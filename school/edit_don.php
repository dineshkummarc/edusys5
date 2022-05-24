<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];	
	require("header.php");	
	require("connection.php");	
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Donation</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Donation has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
				?>
								
							
<form action="update_don.php" method="post">
<?php 
$id=$_GET["id"];
$sql="select * from anv_don where id='".$id."'  and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{

?>
 
	  <div class="form-group">
	    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control" required>
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Name:</label>
		<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Location:</label>
		<input type="text" name="location" value="<?php echo $row['location']; ?>" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Reciept Date:</label>
		<input type="date" name="rec_date" value="<?php echo $row['rec_date']; ?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Reciept No:</label>
		<input type="number" name="rec_no" value="<?php echo $row['rec_no']; ?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="<?php echo $row['amount']; ?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Mobile:</label>
		<input type="text" name="mob" value="<?php echo $row['mob']; ?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Towards:</label>
		<input type="text" name="towards" value="<?php echo $row['towards']; ?>" class="form-control">
	  </div>
	<input type="submit" name="upd_donation" class="btn btn-success" value="Update Donation">
	</form>
	
	<?php 
}
	?>
    </div>
    </div>
    </div>
	<div class="col-sm-3" >
        
    </div>
    </div>
</div>

<?php 


require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>