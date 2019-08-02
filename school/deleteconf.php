<?php
session_start();
if(isset($_SESSION['uname'])&&isset($_SESSION['pass']))
{
require("connection.php");	
require("header.php");

?>
<br><br><br>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
  
  <?php
  
  require("nav_buttons.php");
  ?>
  
  <div class="w3-card-4" style="background-color:#fff;">
  <div class="w3-container w3-teal" >
  <br>
    <h2>All Amounts</h2>
	<br>
  </div>
  <br>
  <form class="w3-container form-inline" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="w3-row-padding">
  <div class="w3-third">
  <label class="w3-text-teal"><b>From</b></label>
  <input class="w3-input w3-border" placeholder="From Date"  type="date" name="from">
  </div>
   <div class="w3-third">
  <label class="w3-text-teal"><b>To</b></label>
<input class="w3-input w3-border" placeholder="To Date"  type="date" name="to">
 </div>
  </p> 
  <div class="w3-third"><br>
  <input type="submit" class="btn btn-success" value="Submit">
  <button type="button" class="btn btn-primary" onclick="goBack()">Go Back</button>
  <button type="button"  class="btn btn-success btn-md" onclick="printDiv('members')">Print <i class="fa fa-print" aria-hidden="true"></i></button>
  </div>
  </div>
  </form>
  <hr>
  
  
  <div style="padding:20px;" class="table-responsive" id="members">
  <table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th>SL No.</th>
        <th>Name</th>
        <th>Card No</th>
        <th>Receipt Date</th>
        <th>Amount</th>
       
        <th></th>
      </tr>
    </thead>
	<?php
	
	$num_rec_per_page=500;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	if((isset($_GET["from"]))&&(!empty($_GET["to"])))
	{
	$from=$_GET["from"];
	$to=$_GET["to"];
	$sql="select * from amounts where (rec_date BETWEEN '$from' and '$to') order by id desc LIMIT $start_from, $num_rec_per_page ";	
	//var_dump($sql);
		
	}
	else
	{
	$sql="select * from amounts order by id desc  LIMIT $start_from, $num_rec_per_page ";		
	}
	
	$result=mysqli_query($conn,$sql);
	$row_count=1;
	foreach($result as $row){
	//$balance = $row["total_amounts"]-$row["amount_paid"];
	?>

	<tr>
      <td><?php echo $row_count;?></td>
      <td><a href="<?php echo 'individual_amounts.php?first_name='.$row['first_name'].'&card_no='.$row['card_no'];?>"><span style="color:blue;"><?php echo $row["first_name"];?></span></a></td>
      <td><?php echo $row["card_no"];?></td>
      <td><?php echo $row["rec_date"];?></td>
      <td><?php echo $row["amount"];?></td>
     
      <td>
	  <div class="btn-group">
        <a href="<?php echo 'edit_amounts.php?id='.$row['id']; ?>" title="Edit">  <button type="button" class="btn btn-primary">Edit</button></a>
		
		<button type="button" class="btn btn-danger" onclick="deleteme(<?php echo $row['id'];?>)">Delete</button>
		
		<!--
        <a href="<?php echo 'del_amounts.php?id='.$row['id']; ?>" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i><span style="color:red;">Delete</span></a>
		-->
       </div>
	   
	  <script>
	  function deleteme(id){
		  if(confirm("Do you want to delete?")){
			  window.location.href='del_amounts.php?id='+id+'';
		  }
	  }
	  
	  </script>

	  </td>
    </tr>
	<?php
	$row_count++;
	}
	?>
    
   
  </table>
  </div>
  <!--------------------------------- Pagination starts here    ---------------------------------------->
  <?php
  
  	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='all_accounts.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_accounts.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_accounts.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	
  ?>
  
   <!--------------------------------- Pagination ends here    ---------------------------------------->
  
  
<footer class="w3-container w3-teal">
<br>
      <p>Powered by : <a href="https://digitalcoorg.com">Digitalcoorg</a></p>
	  <br>
    </footer>
	
</div>
</div>
  <div class="col-sm-1"></div>
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