<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

    require("header.php");
    require("connection.php");	
	if(isset($_GET["id"])){
		$id=$_GET["id"];
	}
$sql="select * from income_expense where id = '".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
    $income_expense = $row["income_expense"];
    $updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
    $rec_exp_date= date('d-m-Y', strtotime( $row['rec_exp_date'] ));
	
		$account_name = $row["account_name"];
		$sql_account_name = "select account_name from account_names where id='".$account_name."'";
		$result_account_name = mysqli_query($conn,$sql_account_name);
		if($row_account_name=mysqli_fetch_array($result_account_name,MYSQLI_ASSOC))
		{
		  $account_name = $row_account_name["account_name"];
		}
		
		$source_towards = $row["source_towards"];
		$sql_entry_name = "select entry_name from entry_name where id='".$source_towards."'";
		$result_entry_name = mysqli_query($conn,$sql_entry_name);
		if($row_entry_name=mysqli_fetch_array($result_entry_name,MYSQLI_ASSOC))
		{
		  $entry_name = $row_entry_name["entry_name"];
		}
?>
 <div class="container">


  <div class="row">
  <div class="col-md-3"></div>
	<div class="col-sm-6"><br>
		<div class="panel panel-primary">
     <div class="panel-heading"><h4><?php echo $account_name.' | '.$entry_name;?> - <?php echo $row["income_expense"];?></h4></div>
      <div class="panel-body">

    <ul class="list-group">
        <li class="list-group-item">Amount: <span style="font-weight:bold;">&#x20B9;<?php echo $row["amount"];?></span></li>
        <li class="list-group-item">Account: <span style="font-weight:bold;"><?php echo $account_name;?></span></li>
        <li class="list-group-item">Source/towards: <span style="font-weight:bold;"><?php echo $entry_name;?></span></li>
        <li class="list-group-item">Date: <span style="font-weight:bold;"><?php echo $rec_exp_date;?></span></li>
        <li class="list-group-item">Rec.ref.No: <span style="font-weight:bold;"><?php echo $row["rec_ref_no"];?></span></li>
		<li class="list-group-item">Note: <span style="font-weight:bold;"><?php echo $row["note"];?></span></li>
        <li class="list-group-item">Updated By: <span style="font-weight:bold;"><?php echo $row["updated_by"];?></span></li>
        <li class="list-group-item">Updated Date: <span style="font-weight:bold;"><?php echo $updated_date;?></span></li>
    </ul>
    <br>
    <?php 
    if($row["bill_name"]!=""){
    ?>
        <h4>Bill Details</h4>
        <a href="<?php echo $row['bill_path'];?>" target="blank"><img src="<?php echo $row['bill_path'];?>" style="width:40%;" alt=""></a>
    <?php
    }
    ?>


    <br><br><br>
    <div class="inline">
        <a href="<?php echo 'edit_entry.php?id='.$id;?>" class="btn btn-primary">Edit</a>
        <a href="#" onclick="deleteEntry(<?php echo $row['id'];?>)" class="btn btn-danger"> Delete</a>
        <button class="btn btn-default" onclick="goBack()">Go Back</button>
    </div>

    <script>
        function deleteEntry(id){
            if(confirm("Do you want to delete?")){
                window.location.href='delete_entry.php?id='+id+'';
            }
        }
        
        </script>
    
    </div>
    </div>
    </div>
    <div class="col-md-3"></div>
</div>
</div>
<?php
    }
require("footer.php");
	}else{
		header("Location:login.php");
	}
?>
