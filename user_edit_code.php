<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        echo "hi";
    $tg="images/";
    if(isset($_POST["btnup"]))
    {
        $pimg=basename($_FILES["f1"]["name"]);
        if($pimg=="")
        {
            $pimg=$row["profile_pic"];
        }
        else
        {
            $tg1=$tg.$pimg;
            unlink($row["profile_pic"]);
            move_uploaded_file($_FILES["f1"]["tmp_name"],$tg1);
            $pimg=$tg1;  
        }
        $conn=new mysqli('localhost','root','','project_db');
        $sql="update user_tbl set uname='".$_POST["txtname"]."',address='".$_POST["txtadd"]."',mobile_no='".$_POST["txtmobi"]."',gender='".$_POST["gen"]."',profile_pic='".$pimg."' where pk_email_id='".$_SESSION["userid"]."'";
        echo $sql;
        if($conn->query($sql)===true)
        {
            echo $sql;
            header('location:user_disp.php');
        }
    }
    }
    ?>