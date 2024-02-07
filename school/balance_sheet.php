<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
  include_once("currency_convertor.php");
	error_reporting("0");
	$from=$_GET["from"];
	$to=$_GET["to"];
	
	?>
	<head>
<script>
function printIncome(print_income) {
     var printContents = document.getElementById('print_income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			
				
<div class="container-fluid">
	<div class="row"><br>
	<div class="col-md-12 inline">
	<form class="form-inline" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="get">
	
	<div class="form-group">
    <select class="form-control" name="account_name" id='sel_account'>
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
    <select class="form-control" name="source_towards" id='sel_entry_name'>
        <option value="0">Select Category </option>
    </select>
</div>

		
	<div class="form-group">
    <label for="">From</label>
    <input type="date" name="from" class="form-control">
    </div>
	
	<div class="form-group">
    <label for="">To</label>
	<input type="date" name="to" class="form-control">
    </div>
	
<input type="submit" class="btn btn-primary" name="filter" value="Filter">
	<button type="button"  class="btn btn-success btn-md" onclick="printIncome('print_income')">Print</button> 
    <a href="add_entry.php" class="btn btn-primary">Add Entry</a>
    <a href="balance_sheet.php" class="btn btn-success">View All</a>
    
</form><br>
<button class="btn btn-default" onclick="goBack()">Go Back</button>
	</div>
	</div>

	<?php

		//////////////// Pagination //////////////////
		if (isset($_GET['pageno'])) {
			$pageno = $_GET['pageno'];
		} else {
			$pageno = 1;
		}
		$no_of_records_per_page = 50;
		$offset = ($pageno-1) * $no_of_records_per_page;
   
		$total_pages_sql = "SELECT COUNT(*) FROM income_expense where academic_year='".$academic_year."'";
		$result_pages = mysqli_query($conn,$total_pages_sql);
		$total_rows = mysqli_fetch_array($result_pages)[0];
		$total_pages = ceil($total_rows / $no_of_records_per_page);
		//////////////// Pagination //////////////////

		if((!empty($_GET['from']))&&!empty($_GET['to'])&&!empty($_GET['source_towards'])&&!empty($_GET['account_name']))
		{
			$from=$_GET["from"];
			$to=$_GET["to"];
			$source_towards=$_GET["source_towards"];
			$account_name=$_GET["account_name"];
			
			$sql_amount="select * from income_expense where academic_year='".$academic_year."' and (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		   //var_dump($sql_amount);
		   
		   $sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' and  (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_tot);

      $sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			
			var_dump($sql_income);

      $sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		}
		else if(!empty($_GET['from'])&&!empty($_GET['to'])&&!empty($_GET['account_name']))
		{
			$from=$_GET["from"];
			$to=$_GET["to"];
			$account_name=$_GET["account_name"];
			
			$sql_amount="select * from income_expense where academic_year='".$academic_year."' and (rec_exp_date BETWEEN '$from' and '$to') and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		   
		   
		   $sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' and   (rec_exp_date BETWEEN '$from' and '$to') and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			 

      $sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and (rec_exp_date BETWEEN '$from' and '$to') and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			
			$sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and (rec_exp_date BETWEEN '$from' and '$to') and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			
			
		}
		else if((!empty($_GET['from']))&&!empty($_GET['to'])&&!empty($_GET['source_towards']))
		{
			$from=$_GET["from"];
			$to=$_GET["to"];
			$source_towards=$_GET["source_towards"];
			
			$sql_amount="select * from income_expense where academic_year='".$academic_year."' and (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		   
		   
		   $sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' and  (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_tot);

      $sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";

      $sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and (rec_exp_date BETWEEN '$from' and '$to') and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		}
		else if((!empty($_GET['source_towards']))&&!empty($_GET['account_name']))
		{
			
			$source_towards=$_GET["source_towards"];
			$account_name=$_GET["account_name"];
			
			$sql_amount="select * from income_expense where academic_year='".$academic_year."' and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		  //var_dump($sql_amount); 
		   
		   $sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_tot);

      $sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_income);

      $sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and source_towards='".$source_towards."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			var_dump($sql_expense);
		}
    else if((!empty($_GET['from']))&&!empty($_GET['to']))
    {
    $from=$_GET["from"];
		$to=$_GET["to"];
			///////////////////////////////// Start Salary ///////////////////////////////////////
			$sql_staff_salary = "select sum(salary_given) as tot_salary_given from staff_salary where academic_year='".$academic_year."' and (salary_date BETWEEN '$from' and '$to') ORDER BY salary_date desc LIMIT $offset, $no_of_records_per_page";
			///////////////////////////////// End Salary /////////////////////////////////////////

			$sql_student_fee = "select sum(tot_paid) as tot_student_fee_amount from student_fee where academic_year='".$academic_year."' and (rec_date BETWEEN '$from' and '$to')  ORDER BY rec_date desc LIMIT $offset, $no_of_records_per_page";
			
			$sql_amount="select * from income_expense where academic_year='".$academic_year."' and (rec_exp_date BETWEEN '$from' and '$to') ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		   
		  $sql_tot="select sum(amount) as total_amount from income_expense where  academic_year='".$academic_year."' and (rec_exp_date BETWEEN '$from' and '$to') ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_tot);

			$sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and (rec_exp_date BETWEEN '$from' and '$to') ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";

			$sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and (rec_exp_date BETWEEN '$from' and '$to') ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
    }
    else if(!empty($_GET['account_name']))
    {
    $account_name=$_GET["account_name"];
		$sql_amount="select * from income_expense where academic_year='".$academic_year."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";	
		//var_dump($sql_amount);
		$sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		//var_dump($sql_tot);
		$sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_income);
		$sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and account_name='".$account_name."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_expense);

    }
		else if(!empty($_GET['source_towards']))
    {
      $source_towards=$_GET["source_towards"];
			$sql_amount="select * from income_expense where academic_year='".$academic_year."' and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		   
		   
		   $sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_tot);

			$sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";

			$sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' and source_towards='".$source_towards."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
    }
		
		else
		{
			


			$sql_student_fee = "select sum(tot_paid) as tot_student_fee_amount from student_fee where academic_year='".$academic_year."'  ORDER BY rec_date desc LIMIT $offset, $no_of_records_per_page";
			//var_dump($sql_student_fee);

			$sql_amount="select * from income_expense where academic_year='".$academic_year."'   ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
			
			$sql_tot="select sum(amount) as total_amount from income_expense where academic_year='".$academic_year."' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";

      $sql_income="select sum(amount) as total_income from income_expense where academic_year='".$academic_year."' and income_expense='Income' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";

      $sql_expense="select sum(amount) as total_expense from income_expense where academic_year='".$academic_year."' and income_expense='Expense' ORDER BY rec_exp_date desc LIMIT $offset, $no_of_records_per_page";
		   
			//var_dump($sql_amount);
		}

		$result_student_fee = mysqli_query($conn, $sql_student_fee);
		if($row_student_fee=mysqli_fetch_array($result_student_fee,MYSQLI_ASSOC))
		{
		$tot_student_fee_amount= $row_student_fee["tot_student_fee_amount"];
		}

		$result_staff_salary = mysqli_query($conn, $sql_staff_salary);
		if($row_staff_salary=mysqli_fetch_array($result_staff_salary,MYSQLI_ASSOC))
		{
		$tot_salary_given= $row_staff_salary["tot_salary_given"];
		}

	
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
		{
		$total_amount= $row_tot["total_amount"];
		}
		$result_amount=mysqli_query($conn,$sql_amount);
		
		
		$row_count =4;


    $result_income=mysqli_query($conn,$sql_income);
		if($row_income=mysqli_fetch_array($result_income,MYSQLI_ASSOC))
		{
		$total_income= $row_income["total_income"];
		}

    $result_expense=mysqli_query($conn,$sql_expense);
		if($row_expense=mysqli_fetch_array($result_expense,MYSQLI_ASSOC))
		{
		$total_expense1 = $row_expense["total_expense"];
		}

		$total_expense = $total_expense1+$tot_salary_given;

		$total_fee_income = $total_income + $total_member_fee + $total_family_fee + $total_donation+$tot_student_fee_amount;

    $balance = $total_fee_income - $total_expense;

     
	
	?>	
	<div class="row" id="print_income"><br>
    
		<div class="col-sm-12">
		<h3>Balance Sheet</h3><hr>
        <?php 
        if(!empty($_GET['account_name'])&&!empty($_GET['source_towards'])&&!empty($_GET['from'])&&!empty($_GET['to']))
        {
			
		$get_account_name = $_GET['account_name'];
		$sql_get_name = "select account_name from account_names where id='".$get_account_name."'";
		$result_get_name = mysqli_query($conn,$sql_get_name);
		if($row_get_name=mysqli_fetch_array($result_get_name,MYSQLI_ASSOC))
		{
		  $get_account_name = $row_get_name["account_name"];
		}
		
		$get_source_towards = $_GET['source_towards'];
		$get_entry_name = "select entry_name from entry_name where id='".$get_source_towards."'";
		$result_get_entry_name = mysqli_query($conn,$get_entry_name);
		if($row_get_entry_name=mysqli_fetch_array($result_get_entry_name,MYSQLI_ASSOC))
		{
		  $get_entry_name = $row_get_entry_name["entry_name"];
		}
		
        ?>
            <div class="alert alert-success">
            <p>Selected Category: <?php echo  $get_account_name ;?>, <?php echo  $get_entry_name ;?>, Date:  <?php echo date('d-m-Y', strtotime( $_GET['from'] ));?> - <?php echo date('d-m-Y', strtotime( $_GET['to'] ));?></p>
            </div>
        <?php
        }
        else if(!empty($_GET['account_name'])&&!empty($_GET['source_towards']))
        {
			
		$acc_source = $_GET['account_name'];
		$sql_acc_source = "select account_name from account_names where id='".$acc_source."'";
		$result_acc_source = mysqli_query($conn,$sql_acc_source);
		if($row_acc_source=mysqli_fetch_array($result_acc_source,MYSQLI_ASSOC))
		{
		  $get_acc_source = $row_acc_source["account_name"];
		}
		
		$get_source_acc = $_GET['source_towards'];
		$sql_source_acc = "select entry_name from entry_name where id='".$get_source_acc."'";
		$result_source_acc = mysqli_query($conn,$sql_source_acc);
		if($row_source_acc=mysqli_fetch_array($result_source_acc,MYSQLI_ASSOC))
		{
		  $get_entry_source_acc = $row_source_acc["entry_name"];
		}
        ?>
            <div class="alert alert-success">
            <p>Selected: <?php echo  $get_acc_source ;?>, Category:  <?php echo  $get_entry_source_acc ;?></p>
            </div>
        <?php
        }
        else if((!empty($_GET['from']))&&!empty($_GET['to']))
        {
            ?>
            <div class="alert alert-success">
            <p>Selected Date:  <?php echo date('d-m-Y', strtotime( $_GET['from'] ));?> - <?php echo date('d-m-Y', strtotime( $_GET['to'] ));?></p>
            </div>
            <?php
        }
        else if(!empty($_GET['account_name']))
        {
		$account_name_1 = $_GET['account_name'];
		$sql_1 = "select account_name from account_names where id='".$account_name_1."'";
		$result_1 = mysqli_query($conn,$sql_1);
		if($row_1=mysqli_fetch_array($result_1,MYSQLI_ASSOC))
		{
		  $get_account_name_1 = $row_1["account_name"];
		}
            ?>
            <div class="alert alert-success">
            <p>Selected Account:  <?php echo  $get_account_name_1 ;?></p>
            </div>
            <?php
        }
        ?>
		<div class="table-responsive">
		<table class="table table-bordered table-striped" >
		<tbody>
		<tr>
		<th>SL</th>
		<th>Account</th>
		<th>Particulars</th>
		<th>Rec.date</th>
		<th style="text-align:right;">Expense</th>
        <th style="text-align:right;">Income</th>
		</tr>
		<?php 
		
		if($tot_salary_given>0)
		{
		?>

		<tr>
			<td>3</td>
			<td style="font-weight:bold;color:blue;">Staff Salary</td>
			<td style="font-weight:bold;color:blue;">salary</td>
			<td>Nil</td>
			<td style="text-align:right;background-color:#f8d7da !important;font-weight:bold;text-align:right;">&#x20B9; <?php echo $tot_salary_given;?></td>
			<td style="text-align:right;">Nil</td>
		</tr>
		<?php 
		}
		if($tot_student_fee_amount>0)
		{
		?>

		<tr>
			<td>3</td>
			<td style="font-weight:bold;color:blue;">Student Fee</td>
			<td style="font-weight:bold;color:blue;">Student Fee</td>
			<td>Nil</td>
			<td style="text-align:right;">Nil</td>
			<td style="text-align:right;background-color:#d4edda !important;font-weight:bold;text-align:right;">&#x20B9; <?php echo $tot_student_fee_amount;?></td>
		</tr>
		<?php 
		}
		
		?>

	<?php
	
	foreach($result_amount as $row)
	{
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
		
		
        $reciept_date= date('d-m-Y', strtotime( $row['rec_exp_date'] ));
        $updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
        
        $id=$row["id"];
        $source_towards=$row["source_towards"];
        $amount=$row["amount"];
        $rec_exp_date=$row["rec_exp_date"];
        $updated_by=$row["updated_by"];
        $inc_exp = $row["income_expense"];
        ?>
				<tr>
				<td style="width:10%;"><?php echo $row_count;?></td>
				
				<td><a href="<?php echo 'entry_description.php?id='.$id;?>"><span style="font-weight:bold;color:blue;"><?php echo $account_name;?></span></a></td>
				
				<td><a href="<?php echo 'entry_description.php?id='.$id;?>"><span style="font-weight:bold;color:blue;"><?php echo $entry_name;?></span></a></td>
				
                <td><?php echo $reciept_date;?></td>
				
				
				
                <?php
                if($inc_exp=="Expense"){
                ?>
                <td style="background-color:#f8d7da !important;font-weight:bold;text-align:right;">&#x20B9; <?php echo $row["amount"];?></td>
                <td></td>
                <?php
                }else{
                ?>
                <td></td>
                 <td style="background-color:#d4edda !important;font-weight:bold;text-align:right;">&#x20B9; <?php echo $row["amount"];?></td>
                <?php
                }
                ?>
				
	<?php
				
	$row_count++; 
	}
	
	?>
    </tr>
                <tr style="font-weight:bold;">
                <td colspan="4" style="text-align:right;">Total</td>
                <td style="color:red !important;text-align:right;">&#x20B9;<?php echo $total_expense;?></td>
                <td style="color:green !important;text-align:right;">&#x20B9;<?php echo $total_fee_income;?></td>
                </tr>

                <tr style="background-color:#d1ecf1 !important;">
                <td colspan="4" style="text-align:right;font-weight:bold;">Balance</td>
                <td colspan="2" style="text-align:right;font-weight:bold;text-align:right;">&#x20B9;<?php echo $balance;?></td>
                
                </tr>
                
                <tr>
				<h4><span style="background-color:#2dce14 !important;color:white !important;padding:5px;">Total Income: &#x20B9;<?php echo $total_fee_income;?></span> <span style="background-color:red !important;color:white !important;padding:5px;">Total Expense: &#x20B9;<?php echo $total_expense;?></span> <span style="background-color:#006cfb !important;color:white !important;padding:5px;">Total Balance &#x20B9;<?php echo $balance;?></span></h4></tr>
	</tbody>
	</table>
	</div>
	</div>
	</div>

	<!----  Pagination code starts here---->
		<ul class="pagination">
		<li><a href="?pageno=1">First</a></li>
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
		</li>
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
			<a
				href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
		</li>
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
		</ul>
	<!----  Pagination code ends here---->
	
</div>
<?php require("footer.php"); } else { header("Location:login.php");} ?>  
