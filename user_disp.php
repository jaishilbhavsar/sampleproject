
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
    $res=$obj->getuser();
    $row=$res->fetch_assoc();
?>
<form method="post" action="user_disp_code.php">
<div class="jumbotron">
    <h1><center>View Profile</center></h1>
</div>
<div class="row">
    <div class="col-md-5">
        <img src="<?php echo $row['profile_pic'];?>"  class="img-responsive img-circle" alt="">
    </div>
    <div class="col-md-7">
        <label>Id:<?php  echo $row["pk_email_id"] ?></label><br><br>
        <label>Uname:<?php  echo $row["uname"] ?></label><br><br>
        <label>Mobile:<?php  echo $row["mobile_no"] ?></label><br><br>
        <label>Address:<?php  echo $row["address"] ?></label><br><br>
        <label>Gender:<?php  echo $row["gender"] ?></label><br><br>
        <input type="submit" name="btnup" value="Edit Profile" class="btn btn-success">
         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#myModal">Change Password</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control"  name="txtold" placeholder="Enter Old Password">
        <input type="text" class="form-control" name="txtnew" placeholder="Enter New Password">
        <input type="text" class="form-control" name="txtnewch" placeholder="Change password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="btnch" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <input type="submit" name="btnout" value="Log Out" class="btn btn-warning">
    </div>
</div>
</form>
</html>