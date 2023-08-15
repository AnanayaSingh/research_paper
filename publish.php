<?php
    require('navbar.php');
    require('db_config.php');
    $paper_id=$_GET['id'];
    $sql="UPDATE review SET status='Published' WHERE paper_id='$paper_id'";
    if(mysqli_query($conn,$sql))
    {
        echo "<script>window.alert(\"Paper Published\"); window.location='index.php'</script>";
    }
    else
    {
        echo "<script>window.alert(\"Error\"); window.location='index.php'</script>";
    }
?>