<?php
    session_start();
    require_once('db_config.php');
    echo "
    <!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <title>International Conference System</title>
    <link
      href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\"
      rel=\"stylesheet\"
      integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\"
      crossorigin=\"anonymous\"
    />
    <link rel=\"stylesheet\" href=\"css/style.css\" />
  </head>
  <body>
    <nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
    <div class=\"container-fluid\">
      <a class=\"navbar-brand\" href=\"#\">International Conference System </a>
      <button
        class=\"navbar-toggler\"
        type=\"button\"
        data-bs-toggle=\"collapse\"
        data-bs-target=\"#navbarColor02\"
        aria-controls=\"navbarColor02\"
        aria-expanded=\"false\"
        aria-label=\"Toggle navigation\"
      >
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarColor02\">
        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
          <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"index.php\">Home</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"conference.php\">Conference</a>
          </li>";
          if(isset($_SESSION['loggedIn']))
          {
            if($_SESSION['user_type']=='reviewer')
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"review.php\">Review</a>
                </li>";
          }
          if(isset($_SESSION['loggedIn']))
          {
            if($_SESSION['user_type']=='author')
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"paper.php\">Paper</a>
                </li>";
            if($_SESSION['user_type']=='commitee')
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"add_reviewer.php\">Add Reviewer</a>
                </li>";
          }
        echo "</ul>
        <div class=\"d-flex\">
          <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
            <li class=\"nav-item\">
             ";
        if(!isset($_SESSION['loggedIn']))
            echo "<a class=\"nav-link\" href=\"/borkar\">Login</a>";
        else
            echo "<a class=\"nav-link\" href=\"logout.php\">logout</a>";
        echo "</li>
          </ul>
        </div>
      </div>
    </div>
  </nav>";
?>

        </body>
        </html>