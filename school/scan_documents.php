<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{


require("header.php");	

?>
<div class="container-fluid"><br>
               <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                      <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" id="pwd">
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" id="pwd">
					  </div>
					  <input type="submit" class="btn btn-success" value="Filter" name="scan_document">
					  <a href="documents.php"><button type="button" class="btn btn-success">Go Back</button></a>
					  </form>
					  
		<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10"><br>
		<?php
		require("connection.php");
		
		if(isset($_GET["scan_document"])){
			$from=$_GET["from"];
		$to=$_GET["to"];
		$sql="select * from uploaded_documents where (upl_date BETWEEN '$from' and '$to')";	
		}else{
		$sql="select * from uploaded_documents";	
		}
		
        $result=mysqli_query($conn,$sql);		
		?>
		<div class="table-responsive">
		<h3>Uploaded Documents</h3>
	<center><table class="table table-bordered">
		<tbody>
		<tr>
	    <td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Document Name</span></td>
		<td><span style="font-weight: bold;">Uploaded Date</span></td>
        </tr>
		<?php 
		$row_count =1;
		foreach($result as $value){
		$id=$value["id"];
		$upl_date= date('d-m-Y', strtotime( $value['upl_date'] ));
		?>
		
        <tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'doc_description.php?id='.$id;?>"><?php echo $value["upl_doc_name"];?></a></td>
		<td><?php echo $upl_date;?></td>
        </tr>
		<?php 
		$row_count++;
		}
		
		?>
								
		
	  </div>
	  <div class="col-sm-1">
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
