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
        <li class="breadcrumb-item active" style="color: white;">Add New Admin and Info</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user-plus"></i> Add New Admin</div>
        <div class="card-body">
            <div class="container">
                <form action="functions.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for="Image">Upload Profile Picture:</label>
                            <input type="file" name="image" class="form-control" id="fileToUpload" required>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="first name">First Name:</label> 
                                <input class="form-control" name="firstname" type="text" placeholder="Type your first name..." required>
                            </div>
                            <div class="form-group">
                                <label for="contact no">Mobile/Tel No.:</label> 
                                <input class="form-control" name="contact" id="con" type="text" placeholder="Type your number..." required>
                            </div>
                            <div class="form-group">
                                <label for="Username">Username:</label> 
                                <input class="form-control" name="username" type="text" placeholder="Type your username..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last name">Last Name:</label> 
                                <input class="form-control" name="lastname" type="text" placeholder="Type your last name..." required>
                            </div>
                            <div class="form-group">
                                <label for="email address">E-mail Address:</label> 
                                <input class="form-control" name="email" type="email" placeholder="Type your E-mail address..." required>
                            </div>
                            <div class="form-group">
                                <label for="passwords">Password:</label> 
                                <input class="form-control" name="password" type="password" placeholder="Type your password..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><input type="submit" name="add_admin" class="btn btn-pogi btn-md" value="Add New Admin"></center>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>        
      </div>
    </div>

    <?php include "includes/footer.php" ?>
  </div>
</body>

</html>

<script>
    $( document ).ready(function() {
        document.querySelector("#con").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }
        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});
    });
    
</script>