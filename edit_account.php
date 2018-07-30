<?php
    include_once "includes/db_con.php";
    include "includes/session.php";

    $query = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $contact = $row['cel_no'];
        $username = $row['username'];
        $emailadd = $row['email'];

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
        <li class="breadcrumb-item active" style="color: white;">Edit Account</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-address-card"></i> Edit Account</div>
        <div class="card-body">
            <div class="container">
                <form action="functions.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">First Name: </label> 
                              <input class="form-control" name="fname" value="<?php echo $firstname ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="">Contact No.: </label> 
                              <input class="form-control" name="cont" id="con" value="<?php echo $contact ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="">Username: </label> 
                              <input class="form-control" name="user" value="<?php echo $username ?>" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Last Name: </label> 
                              <input class="form-control" name="lname" value="<?php echo $lastname ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="">Email: </label> 
                              <input class="form-control" name="email" value="<?php echo $emailadd ?>" type="email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password: <a style="color:red">*required</a></label> 
                              <input class="form-control" name="pass" type="password" required>
                            </div>
                            <input type="submit" class="btn btn-pogi" name="update_account" value="Update Account" style="float:right;">
                        </div>   
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
