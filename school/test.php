<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass']))
{
//$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
	error_reporting("0");
	$from=$_GET["from"];
	$to=$_GET["to"];
	
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
					$class=$_GET['class'];
					
					?>	
					 <div class="container-fluid">
					
						
                        <div class="row"><br>
                        <div class="col-sm-12">
						
                        
					<form class="form-inline" action="accounts.php" method="get">
					   <div class="form-group">
					 
					 <select class="form-control" name="class">
						<option value="">Select Class</option>
						<?php

						 $sql_name="select distinct class from student_fee";

						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["class"];?>'><?php echo $value["class"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					
					 <div class="form-group">
	                   
	                    <select class="form-control" name="academic_year">
		                <option value="">Academic Year</option>
		                <option value="2016-2017">2016-17</option>
		                <option value="2017-2018">2017-18</option>
		                <option value="2018-2019">2018-19</option>
		                <option value="2019-2020">2019-20</option>
		               </select><br>
		             </div>

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
					
						<a href="<?php echo 'accounts.php?edit='.'yes';?>"><button type="button"  class="btn btn-primary btn-md ">Edit</button></a>
						
						<a href="<?php echo 'accounts.php?delete='.'yes';?>"><button type="button"  class="btn btn-danger btn-md ">Delete</button></a>
						<a href="accounts.php"><button type="button" class="btn btn-success">View All Fee</button></a>	
						
					</form>
					<form action="export_accounts.php" class="form-inline" method="post" name="export_excel">
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
			///////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_est="select sum(adm_fee) as tot_est_fee from student_fee";
			$result_est=mysqli_query($conn,$sql_est);
			if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
			{
				$tot_est_fee=$row_est["tot_est_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_adm="select sum(adm_fee) as tot_adm_fee from student_adm_fee";
			$result_adm=mysqli_query($conn,$sql_adm);
			if($row_adm=mysqli_fetch_array($result_adm,MYSQLI_ASSOC))
			{
				$tot_adm_fee=$row_adm["tot_adm_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_cca="select sum(adm_fee) as tot_cca_fee from student_cca_fee";
			$result_cca=mysqli_query($conn,$sql_cca);
			if($row_cca=mysqli_fetch_array($result_cca,MYSQLI_ASSOC))
			{
				$tot_cca_fee=$row_cca["tot_cca_fee"];
			}
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_books="select sum(adm_fee) as tot_books_fee from student_books_fee";
			$result_books=mysqli_query($conn,$sql_books);
			if($row_books=mysqli_fetch_array($result_books,MYSQLI_ASSOC))
			{
				$tot_books_fee=$row_books["tot_books_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_uni="select sum(adm_fee) as tot_uni_fee from student_uniform_fee";
			$result_uni=mysqli_query($conn,$sql_uni);
			if($row_uni=mysqli_fetch_array($result_uni,MYSQLI_ASSOC))
			{
				$tot_uni_fee=$row_adm["tot_uni_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_shoe="select sum(adm_fee) as tot_shoe_fee from student_shoe_fee";
			$result_shoe=mysqli_query($conn,$sql_shoe);
			if($row_shoe=mysqli_fetch_array($result_shoe,MYSQLI_ASSOC))
			{
				$tot_shoe_fee=$row_shoe["tot_shoe_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_soft="select sum(adm_fee) as tot_soft_fee from student_software_fee";
			$result_soft=mysqli_query($conn,$sql_soft);
			if($row_soft=mysqli_fetch_array($result_soft,MYSQLI_ASSOC))
			{
				$tot_soft_fee=$row_soft["tot_soft_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_van="select sum(van_fee) as tot_van_fee from student_van_fee";
			$result_van=mysqli_query($conn,$sql_van);
			if($row_van=mysqli_fetch_array($result_van,MYSQLI_ASSOC))
			{
				$tot_van_fee=$row_van["tot_van_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			?>			
					
			<div class="row">
				<div class="col-sm-12"><br>
					<table class="table table-bordered" style="width:60%">
						<tr style="color:red;font-weight:bold;">
							<th>Fee Category</th>
							<th>Fee Collected</th>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Establishment Fee</td>
							<td><?php echo $tot_est_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Tution Fee</td>
							<td><?php echo $tot_adm_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>CCA Fee</td>
							<td><?php echo $tot_cca_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Books Fee</td>
							<td><?php echo $tot_books_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Uniform Fee</td>
							<td><?php echo $tot_uni_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Shoe Fee</td>
							<td><?php echo $tot_shoe_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Software Fee</td>
							<td><?php echo $tot_soft_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Van Fee</td>
							<td><?php echo $tot_van_fee;?></td>
						</tr>
						
					</table>				
				</div>
			</div>
					
					
		
		<?php 
		
		
		if((isset($_GET['class']))&&!empty($_GET['academic_year'])&&!empty($_GET['from'])&&!empty($_GET['to']))
		{
			$class=$_GET["class"];
			$academic_year=$_GET["academic_year"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
	
			
			$sql_tot="select sum(adm_fee) as total_paid_fee from student_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to')  UNION ALL select sum(adm_fee) as total_paid_fee from student_adm_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') UNION ALL select sum(adm_fee) as total_paid_fee from student_books_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') UNION ALL select sum(adm_fee) as total_paid_fee from student_software_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') UNION ALL select sum(adm_fee) as total_paid_fee from student_shoe_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') UNION ALL select sum(adm_fee) as total_paid_fee from student_uniform_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') UNION ALL select sum(van_fee) as total_paid_fee from student_van_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') UNION ALL select sum(adm_fee) as total_paid_fee from student_cca_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to')";
			
			
			
		    $sql_set_fee="select adm_fee from set_fee where class='".$class."' and academic_year='".$academic_year."'";	
			//var_dump($sql_tot);
		}
		 else if(isset($_GET['academic_year']))
		
		{
			
			$academic_year=$_GET["academic_year"];
			
			
			$sql_tot="select sum(adm_fee) as total_paid_fee from student_fee where  academic_year='".$academic_year."'   UNION ALL select sum(adm_fee) as total_paid_fee from student_adm_fee where academic_year='".$academic_year."' UNION ALL select sum(adm_fee) as total_paid_fee from student_books_fee where  academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_software_fee where  academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_shoe_fee where  academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_uniform_fee where academic_year='".$academic_year."'  UNION ALL select sum(van_fee) as total_paid_fee from student_van_fee where academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_cca_fee where academic_year='".$academic_year."'";
			//var_dump($sql_tot);
			
		    $sql_set_fee="select adm_fee from set_fee where academic_year='".$academic_year."'";	
		//var_dump($sql_tot);	
		}
		else if((isset($_GET['class']))&&!empty($_GET['academic_year']))
		{
			$class=$_GET["class"];
			$academic_year=$_GET["academic_year"];
			
			
			
			$sql_tot="select sum(adm_fee) as total_paid_fee from student_fee where class='".$class."' and academic_year='".$academic_year."'   UNION ALL select sum(adm_fee) as total_paid_fee from student_adm_fee where class='".$class."' and academic_year='".$academic_year."' UNION ALL select sum(adm_fee) as total_paid_fee from student_books_fee where class='".$class."' and academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_software_fee where class='".$class."' and academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_shoe_fee where class='".$class."' and academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_uniform_fee where class='".$class."' and academic_year='".$academic_year."'  UNION ALL select sum(van_fee) as total_paid_fee from student_van_fee where class='".$class."' and academic_year='".$academic_year."'  UNION ALL select sum(adm_fee) as total_paid_fee from student_cca_fee where class='".$class."' and academic_year='".$academic_year."'";
		    $sql_set_fee="select adm_fee from set_fee where class='".$class."' and academic_year='".$academic_year."'";	
			
		}
		else
		{
			
		$sql_tot="select sum(adm_fee) as total_paid_fee from student_fee  UNION ALL select sum(adm_fee) as total_paid_fee from student_adm_fee  UNION ALL select sum(adm_fee) as total_paid_fee from student_books_fee  UNION ALL select sum(adm_fee) as total_paid_fee from student_software_fee  UNION ALL select sum(adm_fee) as total_paid_fee from student_shoe_fee  UNION ALL select sum(adm_fee) as total_paid_fee from student_uniform_fee  UNION ALL select sum(van_fee) as total_paid_fee from student_van_fee  UNION ALL select sum(adm_fee) as total_paid_fee from student_cca_fee";
		
		$sql_set_fee="select adm_fee from set_fee";		
		}
	   
	
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
		{
		
		$total_paid_fee += $row_tot["total_paid_fee"];
		
		}
				
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
	{
		$tot_adm_fee=$row_set_fee["tot_adm_fee"];
		
	}
	?>
	</div> 
	
	<?php
		
		
		$num_rec_per_page=2000;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		
		
		if((isset($_GET['class']))&&!empty($_GET['academic_year'])&&!empty($_GET['from'])&&!empty($_GET['to']))
		{
		//echo "inside";
		$class=$_GET["class"];
		$academic_year=$_GET["academic_year"];
		$from=$_GET["from"];
		$to=$_GET["to"];
		
		$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_adm_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_books_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_software_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_shoe_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_uniform_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,sum(van_fee) as paid_adm_fee from student_van_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_cca_fee where class='".$class."' and academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no ORDER BY name LIMIT $start_from, $num_rec_per_page";
		
		
		
		$sql_set_fee="select id,adm_fee from set_fee where class='".$class."' and academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		//var_dump($sql);
		}
		else if(isset($_GET["academic_year"]))
		{
			
		$academic_year=$_GET["academic_year"];
		
		
		$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_fee where academic_year='".$academic_year."' group by roll_no   UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_adm_fee where  academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_books_fee where  academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_software_fee where  academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_shoe_fee where academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_uniform_fee where  academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,sum(van_fee) as paid_adm_fee from student_van_fee where  academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_cca_fee where  academic_year='".$academic_year."' group by roll_no  ORDER BY name LIMIT $start_from, $num_rec_per_page";
		
		$sql_set_fee="select id,adm_fee from set_fee where academic_year='".$academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		//var_dump($sql);
		}
		else if((isset($_GET['class']))&&!empty($_GET['academic_year']))
		{
		
		$class=$_GET["class"];
		$academic_year=$_GET["academic_year"];
		
		$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no   UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_adm_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_books_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_software_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_shoe_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_uniform_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,sum(van_fee) as paid_adm_fee from student_van_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,sum(adm_fee) as paid_adm_fee from student_cca_fee where class='".$class."' and academic_year='".$academic_year."' group by roll_no  ORDER BY name LIMIT $start_from, $num_rec_per_page";
		
		$sql_set_fee="select id,adm_fee from set_fee where class='".$class."' and academic_year='".$academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		}
		
		
		
		
		
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
	{
		
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
				<th>Roll No</th>
				<th>Class</th>
				<th>Academic Year</th>
				<th>Receipt Date</th>
				<th style="color:green;">Fee Paid</th>
				<th style="color:blue;">Total Fee</th>
				
				<th></th>
				
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	
	$id=$row["id"];
	$name=$row["name"];
	$roll_no=$row["roll_no"];
	$academic_year=$row["academic_year"];
	$mob=$row["mob"];
	$tot_adm_fee=$row_set_fee["adm_fee"];
	
	$rec_no=$row["rec_no"];
	$paid_adm_fee+=$row["paid_adm_fee"];
	
	$class=$row["class"];
	$tot_paid=$row["tot_paid"];
	$balance=$row_set_fee["adm_fee"]-$row["paid_adm_fee"];
	
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				
				<td style="text-align:center;"><a href="<?php echo 'indi_paid_det.php?name='.$row["name"].'&roll_no='.$row["roll_no"].'&class='.$row["class"];?>"><?php echo $row["name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["class"];?></td>
				<td style="text-align:center;"><?php echo $row["academic_year"];?></td>
				<td style="text-align:center;"><?php echo $row["rec_date"];?></td>
				<td style="text-align:center;color:green;"><?php echo $row["paid_adm_fee"];?></td>
				<td style="text-align:center;color:blue;"><?php echo $tot_adm_fee;?></td>
				<td><div class="btn-group">
				<a href="<?php echo 'student_fee.php?id='.$id.'&edit=yes';?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_fee_paid.php?id='.$id;?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
			
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs.<?php echo $paid_adm_fee;?></span></tr>
	</tbody>
	</table></div>
	</div>

	<?php 
	
	if((isset($_GET['class']))&&(isset($_GET['academic_year'])))
		{
		$class=$_GET["class"];
		$academic_year=$_GET["academic_year"];
		$sql = "SELECT * FROM student_fee where academic_year='".$academic_year."' and class='".$class."' and (rec_date BETWEEN '$from' and '$to')"; 
		}
		if(isset($_GET['class']))
		{
			$class=$_GET["class"];
			if((($_GET['academic_year']))==""){
		
			$sql = "SELECT * FROM student_fee where academic_year='".$academic_year."' and class='".$class."' and (rec_date BETWEEN '$from' and '$to')"; 
			}
		
		}
		if(isset($_GET['academic_year']))
		{
			$academic_year=$_GET["academic_year"];
			if((($_GET['class']))==""){
		
			$sql = "SELECT * FROM student_fee where academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to')"; 
			}
		
		}
		
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='accounts.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='accounts.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='accounts.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
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
                      
						<form class="form-inline" action="accounts.php" method="get">
					  <div class="form-group">
					 
					 <select class="form-control" name="class">
						<option value="">Select Class</option>
						<?php

						 $sql_name="select distinct class from student_fee";
 
						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["class"];?>'><?php echo $value["class"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					
					 <div class="form-group">
	                   
	                    <select class="form-control" name="academic_year">
		                <option value="">Academic Year</option>
		                <option value="2016-2017">2016-17</option>
		                <option value="2017-2018">2017-18</option>
		                <option value="2018-2019">2018-19</option>
		                <option value="2019-2020">2019-20</option>
		               </select><br>
		             </div>
					 
					 
					 <div class="form-group">
					 <label>From</label>
	                   <input type="date" name="from" class="form-control">
		             </div>
					<div class="form-group">
					 <label>To</label>
	                   <input type="date" name="to" class="form-control">
		             </div>
					
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
					   <a href="<?php echo 'accounts.php?edit='.'yes';?>"><button type="button"  class="btn btn-primary btn-md ">Edit</button></a>
					
						<a href="<?php echo 'accounts.php?delete='.'yes';?>"><button type="button"  class="btn btn-danger btn-md w3-card-4">Delete</button></a>
					<a href="accounts.php"><button type="button" class="btn btn-success">View All Fee</button></a>	

					</form>
					<form action="export_accounts.php" method="post" class="form-inline" name="export_excel">
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
			///////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_est="select sum(adm_fee) as tot_est_fee from student_fee";
			$result_est=mysqli_query($conn,$sql_est);
			if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
			{
				$tot_est_fee=$row_est["tot_est_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_adm="select sum(adm_fee) as tot_adm_fee from student_adm_fee";
			$result_adm=mysqli_query($conn,$sql_adm);
			if($row_adm=mysqli_fetch_array($result_adm,MYSQLI_ASSOC))
			{
				$tot_adm_fee=$row_adm["tot_adm_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_cca="select sum(adm_fee) as tot_cca_fee from student_cca_fee";
			$result_cca=mysqli_query($conn,$sql_cca);
			if($row_cca=mysqli_fetch_array($result_cca,MYSQLI_ASSOC))
			{
				$tot_cca_fee=$row_cca["tot_cca_fee"];
			}
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_books="select sum(adm_fee) as tot_books_fee from student_books_fee";
			$result_books=mysqli_query($conn,$sql_books);
			if($row_books=mysqli_fetch_array($result_books,MYSQLI_ASSOC))
			{
				$tot_books_fee=$row_books["tot_books_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_uni="select sum(adm_fee) as tot_uni_fee from student_uniform_fee";
			$result_uni=mysqli_query($conn,$sql_uni);
			if($row_uni=mysqli_fetch_array($result_uni,MYSQLI_ASSOC))
			{
				$tot_uni_fee=$row_adm["tot_uni_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_shoe="select sum(adm_fee) as tot_shoe_fee from student_shoe_fee";
			$result_shoe=mysqli_query($conn,$sql_shoe);
			if($row_shoe=mysqli_fetch_array($result_shoe,MYSQLI_ASSOC))
			{
				$tot_shoe_fee=$row_shoe["tot_shoe_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_soft="select sum(adm_fee) as tot_soft_fee from student_software_fee";
			$result_soft=mysqli_query($conn,$sql_soft);
			if($row_soft=mysqli_fetch_array($result_soft,MYSQLI_ASSOC))
			{
				$tot_soft_fee=$row_soft["tot_soft_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_van="select sum(van_fee) as tot_van_fee from student_van_fee";
			$result_van=mysqli_query($conn,$sql_van);
			if($row_van=mysqli_fetch_array($result_van,MYSQLI_ASSOC))
			{
				$tot_van_fee=$row_van["tot_van_fee"];
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			?>			
					
			<div class="row">
				<div class="col-sm-12"><br>
					<table class="table table-bordered" style="width:60%">
						<tr style="color:red;font-weight:bold;">
							<th>Fee Category</th>
							<th>Fee Collected</th>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Establishment Fee</td>
							<td><?php echo $tot_est_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Tution Fee</td>
							<td><?php echo $tot_adm_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>CCA Fee</td>
							<td><?php echo $tot_cca_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Books Fee</td>
							<td><?php echo $tot_books_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Uniform Fee</td>
							<td><?php echo $tot_uni_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Shoe Fee</td>
							<td><?php echo $tot_shoe_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Software Fee</td>
							<td><?php echo $tot_soft_fee;?></td>
						</tr>
						<tr style="color:green;font-weight:bold;">
							<td>Van Fee</td>
							<td><?php echo $tot_van_fee;?></td>
						</tr>
						
					</table>				
				</div>
			</div>
					
					
					
					
					
		<?php
		$num_rec_per_page=2000;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
			
		$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_fee   UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_adm_fee  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_books_fee  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_software_fee  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_shoe_fee  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_uniform_fee  UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,van_fee from student_van_fee  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_cca_fee  ORDER BY name LIMIT $start_from, $num_rec_per_page";
		
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
				<th>Roll No</th>
				<th>Class</th>
				<th>Academic Year</th>
				<th>Receipt Date</th>
				<th style="color:green;">Fee Paid</th>
				<!--<th style="color:blue;">Total Fee</th>-->
				
				<th></th>
				
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	
	$id=$row["id"];
	$name=$row["name"];
	$total_paid_fee+=$row["adm_fee"];
	$roll_no=$row["roll_no"];
	$academic_year=$row["academic_year"];
	$mob=$row["mob"];
$tot_adm_fee=$row_set_fee["adm_fee"];
	
	$rec_no=$row["rec_no"];
	
	$class=$row["class"];
	$tot_paid=$row["tot_paid"];
	$balance=$row_set_fee["adm_fee"]-$row["paid_adm_fee"];
	
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				
				<td style="text-align:center;"><a href="<?php echo 'indi_paid_det.php?name='.$row["name"].'&roll_no='.$row["roll_no"].'&class='.$row["class"];?>"><?php echo $row["name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["class"];?></td>
				<td style="text-align:center;"><?php echo $row["academic_year"];?></td>
				<td style="text-align:center;"><?php echo $row["rec_date"];?></td>
				<td style="text-align:center;color:green;"><?php echo $row["adm_fee"];?></td>
				<!--<td style="text-align:center;color:blue;"><?php echo $tot_adm_fee;?></td>-->
				<td><div class="btn-group">
				<a href="<?php echo 'student_fee.php?id='.$id.'&edit=yes';?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_fee_paid.php?id='.$id;?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
			
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs.<?php echo $total_paid_fee;?></span></tr>
	</tbody>
	</table></div>
	</div>

			
					
				<?php 
			
				
				
				$sql_tot="select sum(tot_paid) as tot_paid_fee from student_fee";
				$result_tot=mysqli_query($conn,$sql_tot);
				if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
				{
				
				$tot_paid_fee= $row_tot["tot_paid_fee"];
				
				

				}
				?>
				
				
				</div>       
						
						
						
	<?php
		if(isset($_GET["today"])){
		//echo "Today collected";
		/////////////////////////////////////////////Start Today Collected Fee//////////////////////////////////////////////////
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		ob_start();
		date_default_timezone_set("Asia/Kolkata");
		$today_date=date("Y-m-d");
		$academic_year=$_GET["academic_year"];
			
		
		$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_fee where  academic_year='".$academic_year."'  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_adm_fee where  academic_year='".$academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_books_fee where  academic_year='".$academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_software_fee where  academic_year='".$academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_shoe_fee where  academic_year='".$academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_uniform_fee where  academic_year='".$academic_year."' UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,van_fee from student_van_fee where  academic_year='".$academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,adm_fee from student_cca_fee where  academic_year='".$academic_year."' ORDER BY id desc";
		
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
				<th>Roll No</th>
				<th>Class</th>
				<th>Academic Year</th>
				<th>Receipt Date</th>
				<th style="color:green;">Fee Paid</th>
				
				
				</tr>
				
				
	<?php
	
	foreach($result as $row)
	{
	$rec_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	$id=$row["id"];
	$name=$row["name"];
	$roll_no=$row["roll_no"];
	$academic_year=$row["academic_year"];
	
	$rec_no=$row["rec_no"];
	$mob=$row["mob"];
	

	$class=$row["class"];
	$id=$row['id'];
	$tot_fee=$row["tot_fee"];
	$tot_paid=$row["adm_fee"];
	$balance=$tot_adm_fee-$tot_paid;
	$tot_today_fee+=$row["adm_fee"];
	if($name!=""){
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><a href="<?php echo 'indi_paid_det.php?name='.$row["name"].'&roll_no='.$row["roll_no"].'&class='.$row["class"];?>"><?php echo $row["name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["class"];?></td>
				<td style="text-align:center;"><?php echo $row["academic_year"];?></td>
				<td style="text-align:center;"><?php echo $rec_date;?></td>
				<td style="text-align:center;color:green;"><?php echo $tot_paid;?></td>
				<!--<td><div class="btn-group">
				<a href="<?php echo 'student_fee.php?id='.$id.'&edit=yes';?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_fee_paid.php?id='.$id;?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>-->
				</tr>
	<?php
				
	$row_count++; 
;
	}

	}
  
   
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs <?php echo $tot_today_fee;?></span></tr>
				</tbody>
				</table>
				
				</div>
				</div>
				
		<!--/////////////////////////////////////////////End Today Collected Fee//////////////////////////////////////////////////	-->
		<?php
		}
		?>
		

	<?php 
	$sql = "SELECT * FROM student_fee"; 
	$result = mysqli_query($conn,$sql); //run the query
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 

	echo "<a href='accounts.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='accounts.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='accounts.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	
	
	}
	?>
	
<?php
			
}
else
{
header("Location:login.php");
}
?>  
