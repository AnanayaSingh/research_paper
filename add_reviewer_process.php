<?php
    require_once('db_config.php');
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $institution=$_POST['institution'];
    $research_area=$_POST['research_area'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];

    $sql="SELECT * FROM user WHERE email='$email'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        echo "<script>window.alert(\"Email id already exits\");window.location=\"register.php\"</script>";
    }
    else
    {
        $sql="INSERT INTO `user`(`name`,`username`,`password`,`instution`,`research_area`,`email`,`address`,`phone_number`,`user_type`) VALUES('$name','$username','$password','$institution','$research_area','$email','$address','$phone','reviewer')";
        echo $sql;
        if(mysqli_query($conn,$sql))
        {
            echo "<script>window.alert(\"Registeration Successful. Please Login!\");window.location=\"index.php\"</script>";
        }
        else
        {
            echo "<script>window.alert(\"Error\");window.location=\"register.php\"</script>";
        }
    }