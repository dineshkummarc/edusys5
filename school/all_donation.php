<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
	?>
	<head>
<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			<div class="dc-layout-wrapper">
                <div class="dc-content-layout">
				<?php
				if(isset($_GET['filter'])){
					$towards=$_GET['towards'];
					$from=$_GET['from'];
					$to=$_GET['to'];
					?>	
					 <div class="container-fluid">
					
						
                        <div class="row"><br>
                        <div class="col-sm-12">
						
                        
					<form class="form-inline" action="all_donation.php" method="get">
					  <div class="form-group">
					  <label for="sel1">Donation Type</label>
					 <select class="form-control" name="towards">
						<?php

						 $sql_name="select distinct towards from anv_don where academic_year='".$cur_academic_year."'";

						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["towards"];?>'><?php echo $value["towards"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					  <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" id="pwd">
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" id="pwd">
					  </div>
					 
					  <input type="submit" class="btn btn-primary" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md" onclick="printDiv('study')">Print Donation</button> 
					   
						<a href="<?php echo 'all_donation.php?edit='.'yes';?>"><button type="button"  class="btn btn-primary btn-md ">Edit Fee</button></a>
						
						<a href="<?php echo 'all_donation.php?delete='.'yes';?>"><button type="button"  class="btn btn-danger btn-md ">Delete Fee</button></a>
					</form>
					</div>
					</div>
		
		<?php 
		if((isset($_GET['towards']))&&(isset($_GET['from']))&&(isset($_GET['to'])))
		{
		$sql_tot="select towards,sum(amount)as tot_amount from anv_don where towards='".$towards."' and academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";	
		}
		if(isset($_GET['towards']))
		{
			if((($_GET['from'])=="")&&(($_GET['to'])==""))
			{
			$sql_tot="select towards,sum(amount)as tot_amount from anv_don where towards='".$towards."' and academic_year='".$cur_academic_year."'";
			}
		}
		if((isset($_GET['from']))&&(isset($_GET['to']))){
			if((($_GET['towards']))==""){
				$sql_tot="select sum(amount)as tot_amount from anv_don where (rec_date BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."'";
			}
		}
				$result_tot=mysqli_query($conn,$sql_tot);
				if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
				{
				
				$amount= $row_tot["tot_amount"];
				
				

				}
				?>
				<br><br>
				</div>       
						
						
						
	<?php
		
		
		$num_rec_per_page=50;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		if((isset($_GET['towards']))&&(isset($_GET['from']))&&(isset($_GET['to'])))
		{
		$sql="select * from anv_don where towards='".$towards."' and (rec_date BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		}
		if(isset($_GET['towards']))
		{
		
			if((($_GET['from'])=="")&&(($_GET['to'])==""))
				{
				$sql="select * from anv_don where towards='".$towards."' and academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
				}
		}
		if((isset($_GET['from']))&&(isset($_GET['to']))){
			if((($_GET['towards']))==""){
				$sql="select * from anv_don where (rec_date BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
			}
		}
		
		
		$result=mysqli_query($conn,$sql);
		$row_count =1;
	
	?>	
                <div class="row" id="income"><br>
                <div class="col-sm-12">
				<table class="table table-bordered table-striped" >
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Name</th>
				<th>Location</th>
				<th>Reciept No</th>
				<th>Reciept Date</th>
				<th>Amount</th>
				<th>Mobile</th>
				<th>Towards</th>
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}if(isset($_GET['edit']))
				{
				?>
				<th>Edit</th>
				<?php
				}
				?>
				
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$name=$row["name"];
	$location=$row["location"];
	
	$rec_no=$row["rec_no"];
	
	$mob=$row["mob"];
	$towards=$row["towards"];
	
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $name;?></td>
				<td style="text-align:center;"><?php echo $location;?></td>
				<td style="text-align:center;"><?php echo $row["rec_no"];?></td>
				<td style="text-align:center;"><?php echo $reciept_date;?></td>
				<td style="text-align:center;"><?php echo $row["amount"];?></td>
				<td style="text-align:center;"><?php echo $row["mob"];?></td>
				<td style="text-align:center;"><?php echo $row["towards"];?></td>
				<?php 
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_don.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a></td>
			
				<?php 
					}
					if(isset($_GET['edit']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'edit_don.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a></td>
			
				<?php 
					}
				?>
			
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Donation Rs.<?php echo $amount;?></span></tr>
				</tbody>
				</table></div>
				
				</div>

	<?php 
	
	if((isset($_GET['towards']))&&(isset($_GET['from']))&&(isset($_GET['to'])))
		{
		$sql = "SELECT * FROM anv_don where towards='".$towards."' and academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')"; 
		}
		if(isset($_GET['towards']))
		{
		
		if((($_GET['from'])=="")&&(($_GET['to'])==""))
			{
			$sql = "SELECT * FROM anv_don where towards='".$towards."' and academic_year='".$cur_academic_year."'"; 
			}
		
		}
		if((isset($_GET['from']))&&(isset($_GET['to']))){
			if((($_GET['towards']))=="")
			{
				$sql = "SELECT * FROM anv_don where (rec_date BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."'"; 
			}
		}
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='all_donation.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_donation.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_donation.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	}
	else
	{
	?>
				
				
			
<!---------//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////----------->  
	
                    <div class="container-fluid" >
					
                        <div class="row"><br>
                        <div class="col-sm-12">
                      
						<form class="form-inline" action="all_donation.php" method="get">
					  <div class="form-group">
					  <label for="sel1">Donation Type</label>
					 <select class="form-control" name="towards">
						<option value="">------</option>
						<?php

						 $sql_name="select distinct towards from anv_don and academic_year='".$cur_academic_year."'";

						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["towards"];?>'><?php echo $value["towards"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					  <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" id="pwd">
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" id="pwd">
					  </div>
					 
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print Donation</button> 
					   
					   <a href="<?php echo 'all_donation.php?edit='.'yes';?>"><button type="button"  class="btn btn-primary btn-md ">Edit Fee</button></a>
					  
						<a href="<?php echo 'all_donation.php?delete='.'yes';?>"><button type="button"  class="btn btn-danger btn-md w3-card-4">Delete Fee</button></a>

					</form>
					</div>
					</div>
			
						
						<?php 
				$sql_tot="select sum(amount)as tot_amount from anv_don where academic_year='".$cur_academic_year."'";
				$result_tot=mysqli_query($conn,$sql_tot);
				if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
				{
				
				$amount= $row_tot["tot_amount"];
				
				

				}
				?>
				
				<br>  <br>       
				</div>       
						
						
						
	<?php
		
		
		$num_rec_per_page=50;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql="select * from anv_don where academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	
		$result=mysqli_query($conn,$sql);
		$row_count =1;
	
	?>	
                <div class="row" id="income"><br>
                <div class="col-sm-12">
				<table class="table table-bordered table-stripped">
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Name</th>
				<th>Location</th>
				<th>Reciept No</th>
				<th>Reciept Date</th>
				<th>Amount</th>
				<th>Mobile</th>
				<th>Towards</th>
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}if(isset($_GET['edit']))
				{
				?>
				<th>Edit</th>
				<?php
				}
				?>
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$name=$row["name"];
	$location=$row["location"];
	
	$rec_no=$row["rec_no"];
	
	$mob=$row["mob"];
	$towards=$row["towards"];
	$id=$row['id'];
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $name;?></td>
				<td style="text-align:center;"><?php echo $location;?></td>
				<td style="text-align:center;"><?php echo $row["rec_no"];?></td>
				<td style="text-align:center;"><?php echo $reciept_date;?></td>
				<td style="text-align:center;"><?php echo $row["amount"];?></td>
				<td style="text-align:center;"><?php echo $row["mob"];?></td>
				<td style="text-align:center;"><?php echo $row["towards"];?></td>
				
				
				<?php 
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_don.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a></td>
			
				<?php 
					}
					if(isset($_GET['edit']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'edit_don.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a></td>
			
				<?php 
					}
				?>
				</tr>
				
	<?php
				
	$row_count++; 
	}
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Donation Rs <?php echo $amount;?></span></tr>
				</tbody>
				</table>
				
				</div>
				</div>
				

	<?php 
	$sql = "SELECT * FROM anv_don where academic_year='".$cur_academic_year."'"; 
	$result = mysqli_query($conn,$sql); //run the query
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 

	echo "<a href='all_donation.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_donation.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_donation.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	
	?>
				</article></div>
                   </div>
				   <?php
	}
				   ?>
				   
				 <!---------///////////////////////////////////////////////////////////////////////----------->  
				 
				   
                </div>
            </div>
	



<?php
			
}
else
{
header("Location:login.php");
}
?>  
