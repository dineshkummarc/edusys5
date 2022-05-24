<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["edit_entry"]))
{
	$id=test_input($_POST["id"]);
	$income_expense=test_input($_POST["income_expense"]);
	$amount=test_input($_POST["amount"]);
	$account_name=test_input($_POST["account_name"]);
	$source_towards=test_input($_POST["source_towards"]);
	$rec_exp_date=test_input($_POST["rec_exp_date"]);
	$rec_ref_no=test_input($_POST["rec_ref_no"]);
	$note=test_input($_POST["note"]);
	$updated_by = $_SESSION['lkg_uname'];

	if (is_uploaded_file($_FILES['bill']['tmp_name'])) {
        $filetmp = $_FILES["bill"]["tmp_name"];
        $filename = $_FILES["bill"]["name"];
        $filetype = $_FILES["bill"]["type"];
        $filepath = "bills/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $sql= "update income_expense set income_expense='".$income_expense."',amount='".$amount."',account_name='".$account_name."',source_towards='".$source_towards."',rec_ref_no='".$rec_ref_no."',rec_exp_date='".$rec_exp_date."',updated_by='".$updated_by."',bill_name='".$filename."',bill_type='".$filetype."',bill_path='".$filepath."',note='".$note."' where id='".$id."'";
       
    }
    else
    {
        $sql= "update income_expense set income_expense='".$income_expense."',amount='".$amount."',account_name='".$account_name."',source_towards='".$source_towards."',rec_ref_no='".$rec_ref_no."',rec_exp_date='".$rec_exp_date."',updated_by='".$updated_by."',note='".$note."' where id='".$id."'";
    }


	if ($conn->query($sql) === TRUE)
	{
	
	header("Location:balance_sheet.php?success=.'success'");
    }
	else
	{
	header("Location:balance_sheet.php?failed=.'failed'");

	}
}
}else{
		header("Location:login.php");
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
