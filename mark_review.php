<?php
  require('navbar.php');
  require('db_config.php');
?>
<h1 class="p-3">Review</h1>
    <hr />
    <div class="form-container-paper">
        <form action="mark_review_process.php" method="post">
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
                    $sql1="SELECT * FROM review WHERE paper_id='$paper_id' AND status='Accepted'";
                    $res1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($res1)==0)
                    {
                      echo "<option value=\"$paper_id\">$paper_title</option>";
                    }
                  }
                ?>
                </select><br>
            </div>
            <div>
                <label>Review Result</label>
                <textarea name="review_result"></textarea>
            </div>
            <div>
                <label>Comment</label>
                <textarea name="review_comment"></textarea>
            </div>
            <div>
                <label>Recommendation</label>
                <input type="text" name="recommendation"/>
            </div>
            <div>
                <label>Status</label>
                <select name="status">
                  <option value="Rejected">Rejected</option>
                  <option value="Accepted">Accepted</option>
                </select>
            </div><br>
            <button type="submit" class="btn btn-success">Submit Review</button>
        </form>
    </div>
  </body>
</html>
