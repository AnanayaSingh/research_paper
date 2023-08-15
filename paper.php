<?php
  require_once('navbar.php');
  require_once('db_config.php');
  if(!isset($_SESSION['loggedIn']))
    header("Location: index.php");
  $user_id=$_SESSION['user_id'];
?>
<h1 class="p-3">Paper</h1>
    <hr />
    <div class="form-container-paper">
      <form action="paper_process.php" method="post" enctype="multipart/form-data">
        <div>
          <label>Paper Title:</label><br />
          <input type="text" name="paper_title" />
        </div>
        <div>
          <label>Paper Topic:</label><br />
          <input type="text" name="paper_topic" />
        </div>
        <div>
          <label>Abstract:</label><br />
          <textarea name="abstract"></textarea>
        </div>
        <div>
          <label>Keywords:</label><br />
          <input type="text" name="keywords" />
        </div>
        <div>
          <label>Paper File:</label><br />
          <input type="file" name="paper_file" />
        </div>
        <div>
          <label>Add Authors: </label><br />
          <table id="author_table">
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Email</th>
            </tr>
            <tr>
              <td>1</td>
              <?php
                $sql="SELECT * FROM user WHERE user_id=$user_id";
                $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($res);
                $name=$row["name"];
                $email=$row["email"];
                echo "<td><input type=\"text\" name=\"author_name_1\" value=\"$name\" style=\"background:lightgrey;\" readonly/></td>";
                echo "<td><input type=\"text\" name=\"author_email_1\" value=\"$email\" style=\"background:lightgrey;\" readonly /></td>";
              ?>
            </tr>
            <tr>
              <td>2</td>
              <td><input type="text" name="author_name_2" /></td>
              <td><input type="text" name="author_email_2" /></td>
            </tr>
            <tr>
              <td>3</td>
              <td><input type="text" name="author_name_3" /></td>
              <td><input type="text" name="author_email_3" /></td>
            </tr>
            <tr>
              <td>4</td>
              <td><input type="text" name="author_name_4" /></td>
              <td><input type="text" name="author_email_4" /></td>
            </tr>
          </table>
        </div>
        <br />
        <div>
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </form>
    </div>
  </body>
</html>
