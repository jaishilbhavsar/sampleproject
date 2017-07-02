<?php
    require 'database_user.php';
    $obj=new user_disp();
    $result=$obj->getuser();
    $row=$result->fetch_assoc();
    if(isset($_POST["btnup"]))
    {
        header('location:user_edit.php');
    }
    if(isset($_POST["btnout"]))
    {
        unset($_SESSION['usid']);
        session_destroy();
        $_SESSION=" ";
        header('location:index.html');
        exit;
    }
    if(isset($_POST["btnch"]))
    {
        $_SESSION["uspass"]=$_POST["txtold"];
        $o1=new user_login();
        $res=$o1->getus();
        $newps=$_POST["txtnew"];
        $cfps=$_POST["txtnewch"];
        if($newps==$cfps)
        {
            if($res->num_rows==1)
            {
                $_SESSION["userps1"]=$newps;
                $o2=new user_disp();
                $res1=$o2->getuserch();
                header('location:user_disp.php');
            }
        }
        else
        {
            echo '<script>';
            echo 'alert("Enter Correct Confirm Password")';
            echo '</script>';
        }
    }
    ?>