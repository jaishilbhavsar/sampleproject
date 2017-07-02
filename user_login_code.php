<?php
    require 'database_user.php';
    $obj=new user_login();
	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $_SESSION["userid"]=$_POST["txtmail"];
        $_SESSION["uspass"]=$_POST["txtpass"];
        $res=$obj->getuser();
        if($res->num_rows==1)
        {
            header('location:user_disp.php');
        }
        else{
            echo "fail";
        }
    }
?>