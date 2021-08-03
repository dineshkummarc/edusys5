<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['class_teach']))
{
$class_teach=$_SESSION['class_teach'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

    error_reporting("0");
    require("header.php");
    require("connection.php");
   if(isset($_GET["id"])){
       $id=$_GET["id"];
   }
$sql="select * from online_class where  id='".$id."' and present_class='".$class_teach."'";
$result = mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $url = $row["url"];
    //echo $url;

    $new_url = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $url); 
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
        <div class="row" style="padding-bottom:50px;padding-top:50px;">
        <button onclick="goBack()" class="btn btn-default">Go Back</button>
            <div class="col-md-1">
           
            </div>
            <div class="col-md-10" >
            <h2 style="font-weight:bold;"><?php echo strtoupper($class_teach); ?> - <?php echo strtoupper($row["subject_name"]); ?> - Chapter: <?php echo $row["chapter"]; ?></h2><hr>
            <div class="iframe-container">
            <iframe width="560" height="315" src="<?php echo $new_url; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls=0 modestbranding; allowfullscreen></iframe>
            </div><hr>
                <?php 
                if($row["details"]!=""){
                ?>
                <h2 style="font-weight:bold;">Details</h2><hr>
                <p><?php echo $row["details"];?></p>
                <br>
                <?php
                }
                if($row["filetype"]!=""){
                ?>
                <h3 style="font-weight:bold;">Materials</h3>
                <a href="../school/<?php echo $row['filepath'];?>" style="color:blue;" target="_blank">Download File</a>
                <?php
                }
                ?> 
    </div>
<div class="col-md-1"></div>
 </div>
 <hr>

<div class="row">
<?php
    $sql_watch = "select * from video_views where video_id='".$id."' order by id desc";
    $result_watch = mysqli_query($conn,$sql_watch);
    $total_video_watched = mysqli_num_rows($result_watch);
    ?>
<div class="col-md-6">
    <h3 style="font-weight:bold;">Class Watched Students</h3>
    <p style="color:blue;font-weight:bold;"><?php if($total_video_watched>0){echo "Total Students Watched : ".$total_video_watched;}?></p>
    <table class="table table-bordered"  style="background-color:#e8f2ff;">
    <tr>
        <th>SL.No</th>
        <th>Name & Roll No</th>
        <th>Class</th>
        <th>Watched at</th>
    </tr>
   <?php
    $row_watched_count = 1;
    foreach($result_watch as $row_watch)
    {    
        $students_id = $row_watch["student_id"];
        $watched_at= date('d-m-Y - H:i:sa', strtotime( $row_watch['updated_at'] )); 

        $sql_w_student="select * from students where id='".$students_id."'";
        $result_w_student=mysqli_query($conn,$sql_w_student);
        if($row_w_student=mysqli_fetch_array($result_w_student,MYSQLI_ASSOC))
        {
            $watched_first_name = $row_w_student["first_name"];
            $watched_roll_no = $row_w_student["roll_no"];
            $watched_present_class = $row_w_student["present_class"];
        }
    ?>
   <tr>
       <td><?php echo $row_watched_count;?></td>
       <td><span style="color:red;font-weight:bold;"><a href="<?php echo 'description.php?first_name='.$watched_first_name.'&roll_no='.$watched_roll_no;?>" ><?php echo $watched_first_name;?></a></span> <span style="color:#30c730;"><i class="fa fa-check" aria-hidden="true"></i></span>
       <br><small>Roll No: <?php echo $watched_roll_no;?></small></td>
       <td><?php echo $watched_present_class;?></td>
       <td><?php echo $watched_at;?></td>

   </tr>  

    <?php
    $row_watched_count++;
    }
    ?>
    </table>
</div>
<div class="col-md-6">
                  
<?php 
    $sql_comment = "select * from comments where item_id='".$id."' order by id desc";
    $result_comment = mysqli_query($conn,$sql_comment);
    ?>
    
    <h3 style="font-weight:bold;">Comments</h3>
        <?php 
        foreach($result_comment as $row_comment)
        { 
            $comment_id = $row_comment["id"];
            $student_id = $row_comment["student_id"];
            $video_id = $row_comment["item_id"];
            $updated_at= date('d-m-Y --- H:i:sa', strtotime( $row_comment['updated_at'] ));       
            $edited_on= date('d-m-Y --- H:i:sa', strtotime( $row_comment['edited_on'] ));  
            
            $sql_student="select * from students where id='".$student_id."'";
            $result_student=mysqli_query($conn,$sql_student);
            if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
            {
                $first_name = $row_student["first_name"];
                $roll_no = $row_student["roll_no"];
                $present_class = $row_student["present_class"];

            }
            ?>
            <div style="background-color:#e8f2ff;padding:10px;border:1px solid #ddd;border-radius: 0px 50px 50px 0px; ">
                <p style="font-weight:bold;color:red;"><a href="<?php echo 'description.php?first_name='.$first_name.'&roll_no='.$roll_no;?>" ><?php echo $first_name;?> - Roll No: <?php echo $roll_no;?> - Class: <?php echo $present_class;?></a></p>
                <p><?php echo $row_comment["contents"];?>  <a style="color:blue;" href="<?php echo 'comment_reply.php?comment_id='.$comment_id.'&video_id='.$video_id;?>">Reply</a></p>
            
                <small style="color:#777;">Posted on: <?php echo $updated_at;?></small>
                <?php
                if($edited_on!="NULL"){ ?>
                | <small style="color:#777;">Edited on: <?php echo $edited_on;?></small>
                <?php } ?>
            </div>
            <br>
            <?php
            ///////////////////// Comment Reply ////////////////////////////
            $sql_reply = "select * from comment_reply where comment_id='".$comment_id."' and video_id='".$video_id."'";
            $result_reply = mysqli_query($conn,$sql_reply);
            if(mysqli_num_rows($result_reply)>0){
            foreach($result_reply as $row_reply){  
            $reply_updated_at= date('d-m-Y --- H:i:sa', strtotime( $row_reply['updated_at'] ));       
            $reply_edited_on= date('d-m-Y --- H:i:sa', strtotime( $row_reply['edited_on'] )); 
            $reply_id = $row_reply["id"];            
            ?>

            <div style="background-color:#ffffe0;padding:20px;border:1px solid #ddd;border-radius: 50px 0px 0px 50px;">
                <p><?php echo $row_reply["reply"];?></p>
            
                <small style="color:#777;">Posted on: <?php echo $reply_updated_at;?></small>
                <?php
                if($reply_edited_on){ ?>
                | <small style="color:#777;">Edited on: <?php echo $reply_edited_on;?></small>
                <?php } ?>
                <br><br>
            <a href="<?php echo 'edit_reply.php?reply_id='.$reply_id;?>" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Reply</a>
            </div>
            <br>

            <?php
            }
            }
             ///////////////////// Comment Reply ////////////////////////////
            ?>
        <?php
         }
        ?>
            </div>
            

        </div>
    </div>
    <script src="sharenow.js"></script>
<?php
}
require("footer.php");
} else {

    header("Location:login.php");
}

?>