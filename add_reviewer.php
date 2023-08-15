<?php
    require('navbar.php');
?>
<h1 class="p-3">Register</h1>
    <hr />
    <div class="form-container">
      <form action="add_reviewer_process.php" method="post">
        <label>Name: </label>
        <input type="text" name="name" /><br /><br />
        <label>Username: </label>
        <input type="text" name="username" /><br /><br />
        <label>Password: </label>
        <input type="text" name="password" /><br /><br />
        <label>Email: </label>
        <input type="text" name="email" /><br /><br />
        <label>Institution: </label>
        <input type="text" name="institution" /><br /><br />
        <label>Research Area: </label>
        <input type="text" name="research_area" /><br /><br />
        <label>Address: </label>
        <input type="text" name="address" /><br /><br />
        <label>Phone Number: </label>
        <input type="text" name="phone" /><br /><br />
        <input type="submit" value="Register" class="btn btn-success" />
      </form>
      <br />
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
