<?php
  require('navbar.php');
  require('db_config.php');
?>
  <div class="p-3">
      <h2>Published Papers:</h2>
      <div>
        <?php
          $sql = "SELECT P.paper_title,P.paper_id,P.paper_file FROM paper as P JOIN review as R ON P.paper_id=R.paper_id WHERE R.status='Published'";
          $res = mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($res))
          {
            $paper_id=$row['paper_id'];
            $paper_file=$row['paper_file'];
            $sql1="SELECT * FROM paper WHERE paper_id='$paper_id'";
            $res1 = mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($res1);
            $paper_title = $row1['paper_title'];
            $sql1 ="SELECT U.name FROM user as U JOIN writes as W ON W.author_user_id=U.user_id WHERE W.paper_id='".$paper_id."';";
            $res1=mysqli_query($conn,$sql1);
            $authors="";
            while($row1=mysqli_fetch_array($res1))
            {
                $authors=$authors."<li>".$row1['name']."</li>";
            }
            echo "<div class=\"paper\">
              $paper_title
              <br/>
              Authors:-
              <ul>
                $authors
              </ul>
              <a href=\"$paper_file\" target=\"_blank\">
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
        ?>
      </div>
    </div>
  </body>
</html>
