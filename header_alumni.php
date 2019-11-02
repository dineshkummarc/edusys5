<!DOCTYPE html>
<html lang="en">
<?php
	require("connection.php");
	$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sch_name=$row["sch_name"];
		$location=$row["location"];
		$city=$row["location"];
		$web=$row["web"];
	}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $sch_name;?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
</head>

</head>

<body>

    <header>
        <!--Navbar-->
           <nav class="navbar navbar-expand-lg navbar-inverse navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><?php echo $sch_name;?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--
                    <ul class="navbar-nav mr-auto">
                       
                        <li class="nav-item">
                            <a class="nav-link" href="result.php">Result</a>
                        </li>
                       
                    </ul>
                   -->
                </div>
                </div>
            </nav>
        <!--/.Navbar-->
    </header>
