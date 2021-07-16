<?php 

require("connection.php");

$request = 0;

if(isset($_POST['request'])){
	$request = $_POST['request'];
}

// Fetch state list by districtid
if($request == 1){
	$accountid = $_POST['accountid'];
	
	
	$sql_account = "select id,entry_name from entry_name where account_name_id='".$accountid."'  order by entry_name";
	$result_account = mysqli_query($conn,$sql_account);
	
	$response = array();
	foreach($result_account as $account){
		$response[] = array(
				"id" => $account['id'],
				"name" => $account['entry_name']
			);
	}

	echo json_encode($response);
	exit;
}
