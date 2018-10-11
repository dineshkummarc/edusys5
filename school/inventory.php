<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
    </div>
	
		
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add an item to Inventory</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success_inv"]))

				{

					$success=$_GET["success_inv"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Thank you. Updated successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_inventory.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Item Name:</label>
		<input type="text" name="item_name" value="" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Available Quantity:</label>
		<input type="text" name="avl_quantity" value="" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Warehouse / Inventory Location:</label>
		<input type="text" name="ware_stock_loc" value="" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Item Category:</label>
		<input type="text" name="cat" value="" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Item Condition:</label>
		<input type="text" name="item_condition" value="" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Added Date:</label>
		<input type="date" name="added_date" value="" class="form-control">
	  </div>
	 
	 <div class="form-group">
	    <label for="usr">Added by:</label>
		<input type="text" name="added_by" value="" class="form-control">
	  </div>
	 
	 
	  
	  
	<input type="submit" name="inventory" class="btn btn-success" value="Update Inventory">
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