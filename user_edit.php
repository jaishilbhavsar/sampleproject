
<html>
<head>
    <script src="js/jquery-3.2.1.min.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
    
</head>
<body class="container">
<?php
    require 'user_navbar.php';
    require 'database_user.php';
    $obj=new user_disp();
    $result=$obj->getuser();
    $row=$result->fetch_assoc();
?>
<form method="post" action="user_edit_code.php" enctype="multipart/form-data">
<div class="jumbotron">
    <h1><center>View Profile</center></h1>
</div>
<div class="row form-group">
    <div class="col-md-5">
        <img src='<?php  echo $row["profile_pic"] ?>' class="img-responsive img-circle" height="500px" width="400px"/>
        <input type="file" name="f1">
    </div>
    <div class="col-md-7">
        <?php echo $_SESSION["userid"]; ?>
        ID:<input type="text" name="txtid" value='<?php  echo $row["pk_email_id"] ?>' class="form-control">
        NAME:<input type="text"  name="txtname" value='<?php  echo $row["uname"] ?>' class="form-control">
        Address:<input type="text"  name="txtadd" value='<?php  echo $row["address"] ?>' class="form-control">
        Mobile:<input type="text" name="txtmobi"  value='<?php  echo $row["mobile_no"] ?>' class="form-control">
        
        Gender:<input type="radio" name="gen" value="male"<?php if($row["gender"]=="male"){ echo "checked";}?>>Male
        <input type="radio" name="gen" value="female"<?php if($row["gender"]=="female"){ echo "checked";}?>>Female
        <br><input type="submit" name="btnup" value="Save" class="btn btn-success">
    </div>
</div>
</form>
</html>