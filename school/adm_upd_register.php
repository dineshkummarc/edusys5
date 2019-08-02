<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];


require("header.php");	
if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
$sql="select * from administration where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$adm_name=$row["adm_name"];
	$adm_desig=$row["adm_desig"];
	$adm_loc=$row["adm_loc"];
	$parent_contact=$row["parent_contact"];
	$memb_since=$row["memb_since"];
	$adm_email=$row["adm_email"];
	
	}
?>

                               
                                                
		<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Administrative Members</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Faculty has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="upd_adm_member.php" method="post" enctype="multipart/form-data">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">Name:</label>
		<input type="text" name="adm_name" value="<?php echo $adm_name;?>" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Designation:</label>
		<input type="text" name="adm_desig" value="<?php echo $adm_desig;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Location:</label>
		<input type="text" name="adm_loc" value="<?php echo $adm_loc;?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Mobile:</label>
		<input type="text" name="parent_contact" value="<?php echo $parent_contact;?>" class="form-control">
	  </div>
	   
	 <div class="form-group">
	    <label for="usr">Member Since:</label>
		<input type="date" name="memb_since" value="<?php echo $memb_since;?>" class="form-control">
	  </div>
	  
	   <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="text" name="adm_email" value="<?php echo $adm_email;?>" class="form-control">
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	  
		<div class="form-group">
	    <label for="usr">Upload profile Photo:</label>
		<input type="file" name="adm_photo">
		</div>
		
		<input type="submit" name="admini" class="btn btn-success" value="Register">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
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
