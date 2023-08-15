<?php
    require('navbar.php');
    require('db_config.php');
    $user_id=$_SESSION['user_id'];
    $sql="SELECT R.review_id,P.paper_id,P.paper_title,P.paper_topic,P.abstract,P.keywords,P.paper_file,R.recommendation,R.comment,R.review_result,R.status FROM review AS R JOIN paper AS P ON R.paper_id=P.paper_id";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        echo "<div style=\"margin:2%;\"><h2>Completed Reviews:-</h2><br>";
        echo "<table>
        <tr>
            <th>Review Id</th>
            <th>Paper Id</th>
            <th>Paper Title</th>
            <th>Paper Topic</th>
            <th>Abstract</th>
            <th>Keywords</th>
            <th>Authors</th>
            <th>View Paper</th>
            <th>Recommendation</th>
            <th>Comment</th>
            <th>Review Result</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>";
        while($row=mysqli_fetch_array($res))
        {
            echo "<tr>
                <td>".$row["review_id"]."</td>
                <td>".$row["paper_id"]."</td>
                <td>".$row["paper_title"]."</td>
                <td>".$row["paper_topic"]."</td>
                <td>".$row["abstract"]."</td>
                <td>".$row["keywords"]."</td>";
            $sql1 ="SELECT U.name FROM user as U JOIN writes as W ON W.author_user_id=U.user_id WHERE W.paper_id='".$row["paper_id"]."';";
            $res1=mysqli_query($conn,$sql1);
            $authors="";
            while($row1=mysqli_fetch_array($res1))
            {
                $authors=$authors.$row1['name'].", ";
            }
            $authors=substr($authors,0,-2);
            echo "<td>$authors</td>
                <td><a href=\"".$row["paper_file"]."\" target=\"blank\">View Paper</a>
                <td>".$row["recommendation"]."</td>
                <td>".$row["comment"]."</td>
                <td>".$row["review_result"]."</td>
                <td>".$row["status"]."</td>";
            if($row['status']=='Accepted')
                echo "<td><a href='publish.php?id=".$row['paper_id']."'>Publish</a></td>";
            else
                echo "<td></td>";
            echo "</tr>";
        }
        echo "</table></div>";
    }
    else
    {
        ?>
            No reviews yet
        <?php
    }
?>
