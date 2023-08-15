<?php
    require('navbar.php');
    require('db_config.php');
    $paper_id=$_GET['paper'];
    $sql="SELECT * FROM paper WHERE paper_id='$paper_id'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $file=$row['paper_file'];
    echo "<iframe src='$file' height=\"650px\" width=\"100%\"></iframe>";
?>
</body>
</html>