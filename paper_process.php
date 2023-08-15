<?php
    require_once('db_config.php');
    $paper_title=$_POST['paper_title'];
    $paper_topic=$_POST['paper_topic'];
    $abstract=$_POST['abstract'];
    $keywords=$_POST['keywords'];
    $author_name_1=$_POST['author_name_1'];
    $author_email_1=$_POST['author_email_1'];
    $author_id_1="";
    $author_name_2=$_POST['author_email_2'];
    $author_email_2=$_POST['author_name_2'];
    $author_id_2="";
    $author_name_3=$_POST['author_name_3'];
    $author_email_3=$_POST['author_name_3'];
    $author_id_3="";
    $author_name_4=$_POST['author_name_4'];
    $author_email_4=$_POST['author_name_4'];
    $author_id_4="";
    $author_1=false;
    $author_2=false;
    $author_3=false;
    $author_4=false;
    if(strlen($author_name_1)>0)
    {
        $author_1=true;
        $author_name_1=$_POST['author_name_1'];
        $author_email_1=$_POST['author_email_1'];
    }
    if(strlen($author_name_2)>0)
    {
        $author_2=true;
        $author_name_2=$_POST['author_name_2'];
        $author_email_2=$_POST['author_email_2'];
    }
    if(strlen($author_name_3)>0)
    {
        $author_3=true;
        $author_name_3=$_POST['author_name_3'];
        $author_email_3=$_POST['author_email_3'];
    }
    if(strlen($author_name_4)>0)
    {
        $author_4=true;
        $author_name_4=$_POST['author_name_4'];
        $author_email_4=$_POST['author_email_4'];
    }
    $flag=true;
    echo $_POST["author_name_2"];
    if($author_1)
    {
        $sql="SELECT * FROM user WHERE email='$author_email_1' AND user_type='author'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            $author_id_1=$row['user_id'];
        }
        else
        {
            $flag=false;
            echo "<script>window.alert(\"No author registration with email1:- $author_email_1\"); window.location=\"paper.php\"</script>";
        }
    }
    if($author_2)
    {
        $sql="SELECT * FROM user WHERE email='$author_email_2' AND user_type='author'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            $author_id_2=$row['user_id'];
        }
        else
        {
            $flag=false;
            echo "<script>window.alert(\"No author registration with email2:- $author_email_2\"); window.location=\"paper.php\"</script>";
        }
    }
    if($author_3)
    {
        $sql="SELECT * FROM user WHERE email='$author_email_3' AND user_type='author'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            $author_id_3=$row['user_id'];
        }
        else
        {
            $flag=false;
            echo "<script>window.alert(\"No author registration with email3:- $author_email_3\"); window.location=\"paper.php\"</script>";
        }
    }
    if($author_4)
    {
        $sql="SELECT * FROM user WHERE email='$author_email_4' AND user_type='author'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_array($res);
            $author_id_4=$row['user_id'];
        }
        else
        {
            $flag=false;
            echo "<script>window.alert(\"No author registration with email4:- $author_email_4\"); window.location=\"paper.php\"</script>";
        }
    }
    if($flag)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . time().basename($_FILES["paper_file"]["name"]);
        move_uploaded_file($_FILES['paper_file']['tmp_name'],$target_file);
        $sql="INSERT INTO `paper`(`paper_title`,`paper_topic`,`abstract`,`keywords`,`paper_file`) VALUES('$paper_title','$paper_topic','$abstract','$keywords','$target_file')";
        if(mysqli_query($conn,$sql))
        {
            $paper_id=$conn->insert_id;
            $tflag=true;
            if($author_1)
            {
                $sql="INSERT INTO `writes` VALUES('$author_id_1','$paper_id')";
                if(!mysqli_query($conn,$sql))
                    $tflag=false;
            }
            if($author_2)
            {
                $sql="INSERT INTO `writes` VALUES('$author_id_2','$paper_id')";
                if(!mysqli_query($conn,$sql))
                    $tflag=false;
            }
            if($author_3)
            {
                $sql="INSERT INTO `writes` VALUES('$author_id_3','$paper_id')";
                if(!mysqli_query($conn,$sql))
                    $tflag=false;
            }
            if($author_4)
            {
                $sql="INSERT INTO `writes` VALUES('$author_id_4','$paper_id')";
                if(!mysqli_query($conn,$sql))
                    $tflag=false;
            }
            if($tflag)
            {
                echo "<script>window.alert(\"Paper submitted with id:- $paper_id\"); window.location=\"index.php\"</script>";
            }
            else
            {
                echo "<script>window.alert(\"Error\"); window.location=\"paper.php\"</script>";
            }
        }
    }
?>