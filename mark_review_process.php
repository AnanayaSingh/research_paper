<?php
    session_start();
    require('db_config.php');
    $user_id=$_SESSION['user_id'];
    $paper_id=$_POST['paper'];
    $review_result=$_POST['review_result'];
    $comment=$_POST['review_comment'];
    $recommendation=$_POST['recommendation'];
    $status=$_POST['status'];

    $sql="SELECT * FROM review WHERE paper_id='$paper_id'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==0)
    {
        $sql="INSERT INTO `review`(`recommendation`,`review_result`,`comment`,`status`,`user_id`,`paper_id`) VALUES('$recommendation','$review_result','$comment','$status','$user_id','$paper_id')";
    }
    else
    {
        $sql="UPDATE review SET recommendation='$recommendation',review_result='$review_result',comment='$comment',status='$status',user_id='$user_id' WHERE paper_id='$paper_id'";
    }
    if(mysqli_query($conn,$sql))
    {
        echo "<script>window.alert(\"Review Added Successfully\"); window.location=\"review.php\";</script>";
    }
    else
    {
        echo "<script>window.alert(\"Error\"); window.location=\"mark_review.php\";</script>";
    }

?>