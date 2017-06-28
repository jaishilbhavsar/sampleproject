<?php
session_start();
?>
<?php
    if(isset($_SESSION["usid"])){
      $msg="";
      $id=$_SESSION["usid"];
      
    }
    else
    {
      $id="";
      $msg="hidden";
    }
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="prod_display1.php">SHOPPING TIME</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <li <?php echo $msg;?>><a href="user_disp.php"><?php echo $id;?></a></li>
      <li><a href="user_sign.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="<?php if(empty($id)){echo 'user_login.php';}else{echo 'user_disp.php';}?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>