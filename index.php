<?php
  require('navbar.php');
  if(isset($_SESSION['loggedIn']))
  {
    if($_SESSION['user_type']=='author')
    {
      header("Location: author_dashboard.php");
    }
    else if($_SESSION['user_type']=='reviewer')
    {
      header("Location: reviewer_dashboard.php");
    }
    else if($_SESSION['user_type']=='commitee')
    {
      header("Location: commitee_dashboard.php");
    } 
  }
?>    <h1 class="p-3">Login</h1>
    <hr />
    <div class="form-container">
      <form action="login_process.php" method="post">
        <label>Username: </label>
        <input type="text" name="username" /><br /><br />
        <label>Password: </label>
        <input type="password" name="password" /><br /><br />
        <input type="submit" value="Login" class="btn btn-success" />
      </form>
      <br />
      <a href="register.php">New User? Register Here</a>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
