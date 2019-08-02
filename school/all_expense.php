<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
	error_reporting("0");
	$from=$_GET["from"];
	$to=$_GET["to"];
	
	?>
	<head>
<script>
function printDiv(expense) {
     var printContents = document.getElementById('expense').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			
				
					 <div class="container">
					<div class="row"><br>
                    <div class="col-sm-12">
					<form class="form-inline" action="all_expense.php" method="get">
					 
				 <div class="form-group">
				 <label>From</label>
				   <input type="date" name="from" class="form-control">
				 </div>
				<div class="form-group">
				 <label>To</label>
				   <input type="date" name="to" class="form-control">
				 </div>
				
				
				  <input type="submit" class="btn btn-primary" name="filter" value="Filter">
				   <button type="button"  class="btn btn-success btn-md" onclick="printDiv('study')">Print</button> 
				
				</form>
				<form action="export_expense.php" method="post" name="export_excel">
		   <br>
		<div class="control-group">
			<div class="controls">
				<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
			</div>
		</div>
	</form>
	</div>
	</div>

	
	
	<?php
		
		
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		if((isset($_GET['from']))&&!empty($_GET['to']))
		{
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			$sql_amount="select * from expense where  academic_year='".$cur_academic_year."' and (exp_date BETWEEN '$from' and '$to') ORDER BY exp_date desc LIMIT $start_from, $num_rec_per_page ";
		   
		   
		   $sql_tot="select sum(amount) as total_amount from expense where  academic_year='".$cur_academic_year."' and (exp_date BETWEEN '$from' and '$to') ORDER BY exp_date desc LIMIT $start_from, $num_rec_per_page";
			//var_dump($sql_tot);
		}
		
		else
		{
			
			$sql_amount="select * from expense where  academic_year='".$cur_academic_year."' ORDER BY exp_date desc LIMIT $start_from, $num_rec_per_page ";
			
			$sql_tot="select sum(amount) as total_amount from expense where academic_year='".$cur_academic_year."' ORDER BY exp_date desc LIMIT $start_from, $num_rec_per_page";
		   
			//var_dump($sql_amount);
		}
	
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
		{
		
		$total_amount= $row_tot["total_amount"];
		}
		
		$result_amount=mysqli_query($conn,$sql_amount);
		if($row_amount=mysqli_fetch_array($result_amount,MYSQLI_ASSOC))
	{
		
		
	}
		
		$row_count =1;
	
	?>	
	<div class="row" id="expense"><br>
                <div class="col-sm-12">
				<h3>All expenses</h3>
				<div class="table-responsive">
				<table class="table table-bordered table-striped" >
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Expense Towards</th>
				<th>Amount</th>
				<th>Receipt Date</th>
				
				<th>Updated by</th>
				<th>Last Updated</th>
				<th></th>
				</tr>
	<?php
	foreach($result_amount as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['exp_date'] ));
	$last_updated= date('d-m-Y', strtotime( $row['last_updated'] ));
	
	$id=$row["id"];
	$source=$row["source"];
	$amount=$row["amount"];
	$exp_date=$row["rec"];
	$rec_no=$row["rec_no"];
	$added_by=$row["added_by"];
	$last_updated=$row["last_updated"];
	
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $row["towards"];?></td>
				<td style="text-align:center;"><?php echo $row["amount"];?></td>
				<td style="text-align:center;"><?php echo $reciept_date;?></td>
				
				<td style="text-align:center;"><?php echo $row["added_by"];?></td>
				<td style="text-align:center;"><?php echo $last_updated;?></td>
				<td><div class="btn-group">
				<a href="<?php echo 'edit_expense.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
				</tr>
				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_expense.php?id='+id+'';
					  }
				  }
				  
				  </script>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Amount Rs.<?php echo $total_amount;?></span></tr>
	</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php
	$sql = "SELECT * FROM expense where academic_year='".$cur_academic_year."'"; 
	$result = mysqli_query($conn,$sql); //run the query
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 

	echo "<a href='all_expense.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_expense.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_expense.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	
	?>
	</div>
   
	
     
	


<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
