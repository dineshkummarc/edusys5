<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	error_reporting("0");
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
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12 inline"><br>
   
        <!--
        <form class="form-inline" action="assignments.php" method="get">
        
        <div class="form-group">
        <label for="pwd">From</label>
        <input type="date" class="form-control" name="from" >
        </div>
        <div class="form-group">
        <label for="pwd">To</label>
        <input type="date" class="form-control" name="to" >
        </div>
        <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
        <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
     </form><br>
        -->
    </div>
    </div>
					
		
		
		<?php
        
		
		$num_rec_per_page=75;
	   if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	   $start_from = ($page-1) * $num_rec_per_page; 
		/*	
		 if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		$from= $_GET['from'];
		$to= $_GET['to'];
		
		
		$sql="select * from assign where (assign_date BETWEEN '$from' and '$to') and class='".$parents_class."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
       	var_dump($sql);	
		}
		else
		{
		*/	

		$present_class=$_GET['present_class'];
		$sql="select * from assign  ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
        //var_dump($sql);
	    //}
		 $result=mysqli_query($conn,$sql);
		 $row_count =1;
		//$result=mysqli_query($conn,$sql_tot_att);
		
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
		<h2>Home Works / Assignments</h2>
				<table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				
				<th>Title</th>
				<th>Description</th>
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}
				?>
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$date_posted= date('d-m-Y', strtotime( $row_tot['date_posted'] ));
	

	?>
	<tr>
	<td><?php echo $row_count;?></td>
    <td style="width:25%;"><span style="font-weight:bold;">Class: <?php echo strtoupper($row_tot["class"]);?>
    
    <?php 
    if($row_tot["section"]!=""){ 
        echo "<br>Section: ". strtoupper($row_tot["section"]);
    }
    
    ?></span><br> <?php echo $row_tot["assign_title"];?><br>
	<small style="color:red;">Sent on: <?php echo $date_posted;?></small>
	</td>
	<td><?php echo $row_tot["assign_desc"];?></td>
	<?php
	
	if(isset($_GET['delete']))
		{
	?>
	<td style="text-align:center;"><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>

	<?php 
		}
	?>
	
	</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	
	</tbody>
	</table>
	
	<?php 
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='assignments.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='assignments.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='assignments.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	
	
	?>
	
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
