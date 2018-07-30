<?php  
    include_once "includes/db_con.php";
    include "includes/session.php";

    $query = "SELECT * FROM admin_user WHERE admin_id = '".$_GET['user_id']."' ";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);   
        $id_get = $row['admin_id'];
        $img_get = $row['img'];
        $firstname_get = $row['firstname'];
        $lastname_get = $row['lastname'];
        $contact_get = $row['cel_no'];
        $username_get = $row['username'];
        $password_get = $row['password'];
        $email_get = $row['email'];

?>
<!DOCTYPE html>
<html lang="en">

<?php include"includes/head.php "?>

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
        <li class="breadcrumb-item active" style="color: white;">Edit Admin Information</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-address-card"></i> Edit Admin Information</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="functions.php?save_id=<?php echo $id_get; ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><img class="img-thumbnail" name="image" src="images/<?php echo $img; ?>" height="100" width="100" style="margin:10px;"></center>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="col-md-4"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="first">First Name:</label> 
                              <input class="form-control" name="firstname" value="<?php echo $firstname_get; ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="emailadd">E-mail:</label> 
                              <input class="form-control" name="email" value="<?php echo $email_get; ?>" type="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="last">Last Name:</label> 
                              <input class="form-control" name="lastname" value="<?php echo $lastname_get; ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="user">Username:</label> 
                              <input class="form-control" name="username" value="<?php echo $username_get; ?>" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="conts">Contact No.:</label> 
                              <input class="form-control" name="contact" value="<?php echo $contact_get; ?>" type="text" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-pogi" value="Save" name="save_admin" style="float:right;">
                </form>    
            </div>
        </div>
      </div>
    </div>
    
      <?php include "includes/footer.php" ?>
  </div>
</body>

</html>
