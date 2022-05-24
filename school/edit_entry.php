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
$sql="select * from income_expense where id = '".$id."' order by id desc";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
    $income_expense = $row["income_expense"];
	
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
     <div class="panel-heading"><h4>Edit Entry</h4></div>
      <div class="panel-body">

             <?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			    </div>
				  <?php
			  }

              if(isset($_GET["failed"])){
                ?>
                <div class="alert alert-danger">
              <strong>Error</strong> Failed, Try again.
              </div>
                <?php
            }
			  ?>		
	

<form action="update_entry.php" method="post" enctype="multipart/form-data">

<?php 
if($income_expense=="Income"){
?>
    <label class="radio-inline">
      <input type="radio" name="income_expense" value="Income" checked>Income
    </label>

    <label class="radio-inline">
      <input type="radio" name="income_expense" value="Expense">Expense
    </label><br><br>
<?php
}else{

?>

<label class="radio-inline">
      <input type="radio" name="income_expense" value="Income" >Income
</label>
 <label class="radio-inline">
      <input type="radio" name="income_expense" value="Expense" checked>Expense
</label><br><br>


<?php
}

?>
    <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="<?php echo $row['amount'];?>" class="form-control">
	  </div>
	  
	
	  
	  <div class="form-group">
		<label for="usr">Select Account</label>
			<select class="form-control" name="account_name" id='sel_account'>
			<option value="<?php echo $row["account_name"]; ?>"><?php echo $account_name; ?></option>
				<option value="0">Select Account </option>
				<?php
				require("connection.php");
				$sql_account = "select id,account_name from account_names order by account_name";
				$result_account = mysqli_query($conn,$sql_account);
				foreach($result_account as $account){
				?>
				<option value="<?php echo $account['id']; ?>"><?php echo $account["account_name"]; ?>
				</option>
				<?php
				}
				?>

			</select>
		</div>

		<div class="form-group">
		<label for="usr">Select Category</label>
			<select class="form-control" name="source_towards" id='sel_entry_name'>
			<option value="<?php echo $row["source_towards"]; ?>"><?php echo $entry_name; ?></option>
				<option value="0">Select Category </option>
			</select>
		</div>

	  <div class="form-group">
	    <label for="usr">Date:</label>
		<input type="date" name="rec_exp_date" value="<?php echo $row['rec_exp_date'];?>" class="form-control">
	  </div>

      <div class="form-group">
	    <label for="usr">Ref/Cash Voucher No</label>
		<input type="text" name="rec_ref_no" value="<?php echo $row['rec_ref_no'];?>" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Note (if any)</label>
		<input type="text" name="note" value="<?php echo $row['note'];?>" class="form-control">
	  </div>

      <div class="form-group">
		<label for="usr">Upload Bill (if any)</label>
		<input type="file" value="Photo" name="bill">
	</div>
    <input type="hidden" name="id" value="<?php echo $id;?>">

	
	 <input type="submit" name="edit_entry" class="btn btn-primary" value="Edit Entry">
	</form><br>

    <button class="btn btn-default" onclick="goBack()">Go Back</button>
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
