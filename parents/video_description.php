<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))
{
$cur_academic_year=$_SESSION['academic_year'];
$present_class=$_SESSION['parents_class'];
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];

    error_reporting("0");
    require("header.php");
    require("connection.php");
   if(isset($_GET["id"])){
       $id=$_GET["id"];
   }
$sql="select * from online_class where  id='".$id."'";
$result = mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $url = $row["url"];
    //echo $url;

    $new_url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $url);
   // echo $new_url;
?>
<head>
<style>
.iframe-container{
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; 
  height: 0;
}
.iframe-container iframe{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
</head>
    <div class="container-fluid" >
        <div class="row" style="padding-bottom:200px;padding-top:50px;">
        <button onclick="goBack()" class="btn btn-default">Go Back</button>
            <div class="col-md-1">
           
            </div>
            <div class="col-md-10" >
            <h2 style="font-weight:bold;"><?php echo strtoupper($row["present_class"])." ".strtoupper($row["section"]); ?></h2><hr>
            <h1 style="font-weight:bold;color:red; "><?php echo strtoupper($row["subject_name"]); ?> - Chapter: <?php echo $row["chapter"]; ?></h1><hr>
            <div class="iframe-container">
            <iframe width="560" height="315" src="<?php echo $new_url; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls=0 modestbranding; allowfullscreen></iframe>
            </div>
                
                <br><br><br>
                <?php 
                if($row["details"]!=""){
                ?>
                <h2 style="font-weight:bold;">Details</h2><hr>
                <p><?php echo $row["details"];?></p>
                <br><br><br>
                <?php
                }
                if($row["filepath"]!=""){
                ?>
                <h2 style="font-weight:bold;">Materials</h2><hr>
                <img src="../school/<?php echo $row['filepath'];?>" class="img img-thumbnail" alt="<?php $row['chapter'];?>"><br><br>
                <a href="../school/<?php echo $row['filepath'];?>" class= "btn btn-primary" target="_blank">Download File</a>
                <?php

                }
                ?>

            </div>
            <div class="col-md-1">
                
               
            </div>
          
        </div>
    </div>
<?php
}
require("footer.php");
} else {

    header("Location:login.php");
}

?>