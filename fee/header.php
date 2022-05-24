<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require("connection.php");
	$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$school_name=$row["sch_name"];
	}
	
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $school_name;?></title>

    <!-- Bootstrap Core CSS -->
	<script src="jquery.min.js"></script>
	
   <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="typeahead.min.js"></script>
	<!-- include summernote css/js-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
  <!--<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway" rel="stylesheet">-->



<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 20
    });
});
    </script>
	
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
	
	<link rel="stylesheet" href="smoothness/jquery-ui.css">
	<!------wysiwyg------------------------------>
	


	

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		
    <![endif]-->
    <!---Search box-->
	 <script type="text/javascript" src="js/jquery.js"></script>
    
    
	
	
	
	
	
	<script>
function printDiv(timetable) {
     var printContents = document.getElementById('timetable').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script src="file.js"></script>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_timetable.php?class="+str,true);
        xmlhttp.send();
    }
}

$(function() {
    $( "#name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( ".first_name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( "#book_name" ).autocomplete({
        source: 'search_books.php'
    });
});

$(function() {
    $( "#roll_no" ).autocomplete({
        source: 'searchid.php'
    });
});
</script>
 <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("subject").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Subject " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "subject" + i;
                input.class = "form-control";
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
	<script>
function goBack() {
    window.history.back();
}
</script>
<style>
a:hover {

   cursor: pointer;

   background-color: yellow;

}
</style>
</head>

<body class="body">

    <div id="wrapper">
	
	

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo $school_name;?></a>
            </div>
            <!-- Top Menu Items -->
			
            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">
               
				
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['lkg_uname'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   
							<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#fee"><i class="fa fa-fw fa-money"></i> Establlishment Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="fee" class="collapse">
                            <li>
                                <a href="set_fee.php">Setup Fee</a>
                            </li>
							<li>
                                <a href="set_fee_det.php">Setup Fee Details</a>
                            </li>
                            <li>
                                <a href="bulk_fee_update.php">Bulk Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Fee</a>
                            </li>
							<li>
                                <a href="paid_fee_details.php">Paid Fee Details</a>
                            </li>
							<li>
                                <a href="fee_remind.php">Remind Fee</a>
                            </li>
                        </ul>
                    </li> 

					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#adm_fee"><i class="fa fa-fw fa-money"></i> Tution Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="adm_fee" class="collapse">
                            <li>
                                <a href="set_adm_fee.php">Setup Tution Fee</a>
                            </li>
							<li>
                                <a href="set_adm_fee_det.php">Tution Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_adm_fee_update.php">Bulk Tution Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Tution Fee</a>
                            </li>
							<li>
                                <a href="paid_adm_fee_details.php">Paid Tution Fee Details</a>
                            </li>
							<li>
                                <a href="adm_fee_remind.php">Remind Tution Fee</a>
                            </li>
                        </ul>
                    </li> 
					
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cca_fee"><i class="fa fa-fw fa-money"></i> CCA Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cca_fee" class="collapse">
                            <li>
                                <a href="set_cca_fee.php">Setup CCA Fee</a>
                            </li>
							<li>
                                <a href="set_cca_fee_det.php">CCA Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_cca_fee_update.php">Bulk CCA Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual CCA Fee</a>
                            </li>
							<li>
                                <a href="paid_cca_fee_details.php">Paid CCA Fee Details</a>
                            </li>
							<li>
                                <a href="cca_fee_remind.php">Remind CCA Fee</a>
                            </li>
                        </ul>
                    </li> 
					
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#books"><i class="fa fa-fw fa-money"></i> Books Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="books" class="collapse">
                            <li>
                                <a href="set_books_fee.php">Setup Books Fee</a>
                            </li>
							<li>
                                <a href="set_books_fee_det.php">Books Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_books_fee_update.php">Bulk Books Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Books Fee</a>
                            </li>
							<li>
                                <a href="paid_books_fee_details.php">Paid Books Fee Details</a>
                            </li>
							<li>
                                <a href="books_fee_remind.php">Remind Books Fee</a>
                            </li>
                        </ul>
                    </li> 
					
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#uniform"><i class="fa fa-fw fa-money"></i> Uniform Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="uniform" class="collapse">
                            <li>
                                <a href="set_uniform_fee.php">Setup Uniform Fee</a>
                            </li>
							<li>
                                <a href="set_uniform_fee_det.php">Uniform Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_uniform_fee_update.php">Bulk Uniform Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Uniform Fee</a>
                            </li>
							<li>
                                <a href="paid_uniform_fee_details.php">Paid Uniform Fee Details</a>
                            </li>
							<li>
                                <a href="uniform_fee_remind.php">Remind Uniform Fee</a>
                            </li>
                        </ul>
                    </li> 
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#shoe"><i class="fa fa-fw fa-money"></i> Shoe Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="shoe" class="collapse">
                            <li>
                                <a href="set_shoe_fee.php">Setup Shoe Fee</a>
                            </li>
							<li>
                                <a href="set_shoe_fee_det.php">Shoe Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_shoe_fee_update.php">Bulk Shoe Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Shoe Fee</a>
                            </li>
							<li>
                                <a href="paid_shoe_fee_details.php">Paid Shoe fee Details</a>
                            </li>
							<li>
                                <a href="shoe_fee_remind.php">Remind Shoe Fee</a>
                            </li>
                        </ul>
                    </li> 
					
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#software"><i class="fa fa-fw fa-money"></i> Software Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="software" class="collapse">
                            <li>
                                <a href="set_software_fee.php">Setup Software Fee</a>
                            </li>
							<li>
                                <a href="set_software_fee_det.php">Software Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_software_fee_update.php">Bulk Software Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Software Fee</a>
                            </li>
							<li>
                                <a href="paid_software_fee_details.php">Paid Software fee Details</a>
                            </li>
							<li>
                                <a href="software_fee_remind.php">Remind Software Fee</a>
                            </li>
                        </ul>
                    </li> 
					

					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#van_fee"><i class="fa fa-fw fa-money"></i> School Van Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="van_fee" class="collapse">
                            <li>
                                <a href="set_van_fee.php">Setup Fee</a>
                            </li>
							<li>
                                <a href="set_van_fee_det.php">Van Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="transport_fee_update.php">Collect Van Fee</a>
                            </li>
							
							<li>
                                <a href="collected_van_fee.php">Collected Van Fee</a>
                            </li>
                        </ul>
                    </li>  
							
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>