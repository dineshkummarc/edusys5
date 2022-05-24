<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["inventory"]))
{
	
	date_default_timezone_set("Asia/Kolkata");
	$last_updated=date("Y-m-d");
	
	$id=test_input($_POST["id"]);
	$item_name=test_input($_POST["item_name"]);
	$avl_quantity=test_input($_POST["avl_quantity"]);
	$ware_stock_loc=test_input($_POST["ware_stock_loc"]);
	$cat=test_input($_POST["cat"]);
	$item_condition=test_input($_POST["item_condition"]);
	$added_date=test_input($_POST["added_date"]);
	$added_by=test_input($_POST["added_by"]);
	
	$sql="update inventory set item_name='".$item_name."',avl_quantity='".$avl_quantity."',ware_stock_loc='".$ware_stock_loc."',cat='".$cat."',item_condition='".$item_condition."',added_date='".$added_date."',added_by='".$added_by."',last_updated='".$last_updated."' where id ='".$id."'";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:all_inventory.php?success_inv=.'success_inv'");
    } 
	else 
	{
	var_dump($sql);			
		
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