<?php
    include_once "includes/db_con.php";
    include "includes/session.php";


?>
<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php";?>
    
    

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include "includes/nav.php" ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb" style="background-color: #5d0404;">
        <li class="breadcrumb-item">
          <a href="index.php" style="color: white;"><b>Homepage</b></a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Change Password</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-lock"></i> Change Password</div>
        <div class="card-body">
            <div class="container">
                <div class="message"></div>
                <form action="functions.php" method="post">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Current Password: <a style="color:red">*required</a></label> 
                              <input class="form-control" name="current" type="password" required>
                            </div>
                            <div class="form-group">
                              <label for="">New Password: <a style="color:red">*required</a></label> 
                              <input class="form-control" name="new" type="password" required>
                            </div>
                            <div class="form-group">
                              <label for="">Confirm New Password: <a style="color:red">*required</a></label> 
                              <input class="form-control" name="confirm" type="password" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>   
                    </div>
                    <center><input type="submit" class="btn btn-pogi" name="change_pass"         value="Save Changes"></center>
                </form>
            </div>
        </div>
      </div>
    </div>
      
    <?php include "includes/footer.php" ?>
    </div>  
</body>

</html>
