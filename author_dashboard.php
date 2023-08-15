<?php
    require_once('navbar.php');
    $user_id=$_SESSION['user_id'];
  $sql1="SELECT * FROM writes WHERE author_user_id='$user_id'";
  $res1=mysqli_query($conn,$sql1);
  if(mysqli_num_rows($res1)>0)
  {
    while($row1=mysqli_fetch_array($res1))
    {
        $paper_id=$row1['paper_id'];
        $sql="SELECT * FROM paper WHERE paper_id='$paper_id'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        $paper_title=$row['paper_title'];
        $paper_topic=$row['paper_topic'];
        $abstract=$row['abstract'];
        $keywords=$row['keywords'];
        $paper_file=$row['paper_file'];
        $sql="SELECT * FROM review WHERE paper_id='$paper_id'";
        $res=mysqli_query($conn,$sql);
        $status="Review Pending";
        $row="";
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            $status=$row['status'];
        }
        $sql2 ="SELECT U.name FROM user as U JOIN writes as W ON W.author_user_id=U.user_id WHERE W.paper_id='".$paper_id."';";
            $res2=mysqli_query($conn,$sql2);
            $authors="";
            while($row2=mysqli_fetch_array($res2))
            {
                $authors=$authors.$row2['name'].", ";
            }
            $authors=substr($authors,0,-2);
        echo "<div class=\"paper\">
            Paper Id:- $paper_id<br>
            Paper Title:- $paper_title<br>
            Paper Topic:- $paper_topic<br>
            Abstract:- $abstract<br>
            Keywords:- $keywords<br>
            Status:- $status<br>
            Authors:- $authors<br>";

        if($status!="Review Pending")
        {
            echo "Recommendation:- ".$row['recommendation']."<br>";
            echo "Comment:- ".$row['comment']."<br>";
            echo "Review Result:- ".$row['review_result']."<br>";
        }

        echo "<br><a href=\"$paper_file\" target=\"_blank\">
              <i
              class=\"fa fa-file-pdf-o\"
              style=\"
                font-size: 18px;
                color: red;
                border: 1px solid red;
                padding: 4px;
              \"
              >View PDF</i
            >
          </a>
        </div>";
    }
  }
  else
  {
    ?>
        No Papers Submitted till date
    <?php
  }
  ?>