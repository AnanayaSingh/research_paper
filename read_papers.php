<?php
  require('navbar.php');
  require('db_config.php');
?>
<h1 class="p-3">Review</h1>
    <hr />
    <div class="form-container-paper">
        <form action="read_paper_process.php">
            <div>
            <label>Select Paper:</label><br>
            <select name="paper">
                <?php
                  $sql="SELECT * FROM paper";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_array($res))
                  {
                    $paper_id=$row['paper_id'];
                    $paper_title=$row['paper_title'];
                    $sql1="SELECT * FROM review WHERE paper_id='$paper_id' AND status!='Accepted'";
                    $res1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($res1)==0)
                    {
                      echo "<option value=\"$paper_id\">$paper_title</option>";
                    }
                  }
                ?>
            </select><br><br>
        </div>
            <button type="submit" class="btn btn-success">Read</button>
        </form>
    </div>
  </body>
</html>
