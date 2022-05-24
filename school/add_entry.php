<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
    require("connection.php");

?>
 <div class="container">


  <div class="row">
  <div class="col-md-3"></div>
	<div class="col-sm-6"><br>
		<div class="panel panel-primary">
     <div class="panel-heading"><h4>Add Entry</h4></div>
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
	

<form action="insert_entry.php" method="post" enctype="multipart/form-data">

    <label class="radio-inline">
      <input type="radio" name="income_expense" value="Income" checked>Income
    </label>
    <label class="radio-inline">
      <input type="radio" name="income_expense" value="Expense">Expense
    </label><br><br>


	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" class="form-control" required>
	  </div>

		<div class="form-group">
		<label for="usr">Select Account</label>
			<select class="form-control" name="account_name" id='sel_account' required>
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
			<select class="form-control" name="source_towards" id='sel_entry_name' required>
				<option value="0">Select Category </option>
			</select>
		</div>


	  <div class="form-group">
	    <label for="usr">Date:</label>
		<input type="date" name="rec_exp_date" value="" class="form-control" required>
	  </div>

      <div class="form-group">
	    <label for="usr">Ref/Cash Voucher No</label>
		<input type="text" name="rec_ref_no" value="" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Note (if any)</label>
		<input type="text" name="note" class="form-control">
	  </div>

      <div class="form-group">
		<label for="usr">Upload Bill (if any)</label>
		<input type="file" value="Photo" name="bill">
	</div>

	
	 <input type="submit" name="entry" class="btn btn-primary" value="Add Entry">
	</form>
    <br>
    <button class="btn btn-default" onclick="goBack()">Go Back</button>
    </div>
    </div>
    </div>
    <div class="col-md-3"></div>
</div>
</div>
<?php
require("footer.php");
	}else{
		header("Location:login.php");
	}
?>
