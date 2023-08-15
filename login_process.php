<?php
    session_start();
    require_once('db_config.php');
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_array($res);
        $_SESSION["loggedIn"]=true;
        $_SESSION["user_id"]=$row['user_id'];
        $_SESSION['user_type']=$row['user_type'];
        if($row['user_type']=='author')
            echo "<script>
                window.alert(\"Login Successful\");
                window.location=\"author_dashboard.php\"
            </script>";
        else if($row['user_type']=='reviewer')
            echo "<script>
                window.alert(\"Login Successful\");
                window.location=\"reviewer_dashboard.php\"
            </script>";
        else
            echo "<script>
                window.alert(\"Login Successful\");
                window.location=\"commitee_dashboard.php\"
            </script>";
    }
    else
    {
        echo "<script>
        window.alert(\"Inavlid Credentials\");
        window.location=\"index.php\"
        </script>";
    }

?>
