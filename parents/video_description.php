<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['academic_year'])&&isset($_SESSION['student_id']))
{
$cur_academic_year=$_SESSION['academic_year'];
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];
$student_id=$_SESSION['student_id'];

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
<?php
 $sql_views = "select id from video_views where student_id='".$student_id."' and video_id='".$id."' and academic_year='".$cur_academic_year."'";
 $result_views = mysqli_query($conn,$sql_views);
 if(mysqli_num_rows($result_views)==0){ 

    $sql="insert into video_views (video_id,student_id,academic_year) values('$id','$student_id','$cur_academic_year')";
    $conn->query($sql);
    echo "inserted";
 }
?>
    <div class="container-fluid" >
        <div class="row" style="padding-bottom:200px;padding-top:50px;">
        
            <div class="col-md-1">
           
            </div>
            <div class="col-md-10" >
           
            <h2 style="font-weight:bold;"><?php echo strtoupper($row["present_class"])." - ".strtoupper($row["section"]); ?> - 
            <?php echo strtoupper($row["subject_name"]); ?> - Chapter: <?php echo $row["chapter"]; ?></h2><hr>
            <div class="iframe-container">
            <iframe width="560" height="315" src="<?php echo $new_url; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls=0 modestbranding; allowfullscreen></iframe>
            </div>
                
                <br><br><br>
                <?php 
                if($row["details"]!=""){
                ?>
                <h3 style="font-weight:bold;">Details</h3>
                <div style="background-color:#eee;padding:10px;border:1px solid #ddd;">
                <p><?php echo $row["details"];?></p>
                </div>
                
                <br>
                <?php
                }
                if($row["filepath"]!=""){
                ?>
                <h3 style="font-weight:bold;">Materials</h3>
                <a href="../school/<?php echo $row['filepath'];?>" style="color:blue;" target="_blank">Download File</a>
                <?php
                }
                ?>
            <br>

    <hr>
   
<?php 
    $sql_comment = "select id,contents,updated_at,edited_on,item_id,student_id from comments where student_id='".$student_id."' and item_id='".$id."'";
    $result_comment = mysqli_query($conn,$sql_comment);

    if(mysqli_num_rows($result_comment)==0){      
    ?>
        <h3 style="font-weight:bold;">Comment Here</h3>
        <form action="insert_comment.php" method="post"  role="form">
        
        <div class="form-group">
        <label for="details">Enter your Comment, Feedback or Doubts</label>
        <textarea rows="6" name="contents" placeholder="Enter your Comment, Feedback or Doubts here." class="form-control"></textarea>
        </div> 

        <input type="hidden" name="video_id" value="<?php echo $id;?>">        
        
        <input type="submit" name="comment" class="btn btn-primary" value="Send">
        </form><br>
    <?php
    }
    else
    {
    ?>
        <h3 style="font-weight:bold;">Comments</h3>
        <?php 
        foreach($result_comment as $row_comment)
        { 
        $comment_id = $row_comment["id"];
        $comment_video_id = $row_comment["item_id"];
        $comment_student_id = $row_comment["student_id"];
        $updated_at= date('d-m-Y --- H:i:sa', strtotime( $row_comment['updated_at'] ));       
        $edited_on= date('d-m-Y --- H:i:sa', strtotime( $row_comment['edited_on'] ));       
        ?>
        <div style="background-color:#e8f2ff;padding:10px;border:1px solid #ddd;border-radius: 0px 50px 50px 0px;">
            <p><?php echo $row_comment["contents"];?></p>
            <small style="color:#777;">Posted on: <?php echo $updated_at;?></small>
            <?php
            if($edited_on!="NULL"){ ?>
             | <small style="color:#777;">Edited on: <?php echo $edited_on;?></small>
            <?php } ?>
            <br><br>
            <a href="<?php echo 'edit_comment.php?id='.$comment_id;?>" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Comment</a>
        </div>
        <br>
        <?php
            ///////////////////// Comment Reply ////////////////////////////
            $sql_reply = "select * from comment_reply where comment_id='".$comment_id."' and video_id='".$comment_video_id."'";
            $result_reply = mysqli_query($conn,$sql_reply);
            if(mysqli_num_rows($result_reply)>0){
            foreach($result_reply as $row_reply){  
            $reply_updated_at= date('d-m-Y --- H:i:sa', strtotime( $row_reply['updated_at'] ));       
            $reply_edited_on= date('d-m-Y --- H:i:sa', strtotime( $row_reply['edited_on'] )); 
            $reply_id = $row_reply["id"];            
            $student_reply_id = $row_reply["student_id"];            
            ?>

            <div style="background-color:#ffffe0;padding:20px;border:1px solid #ddd;border-radius: 50px 0px 0px 50px;">
            <h4 style="font-weight:bold;">Comment Reply</h4>
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
    }
    ?>
    <br>
            <button onclick="goBack()" class="btn btn-default">Go Back</button>
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