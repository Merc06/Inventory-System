<?php
    include_once "includes/db_con.php";
    include "includes/session.php";

    $query = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $image = $row['img'];
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
        <li class="breadcrumb-item active" style="color: white;">Account Details</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-address-card"></i> Account Info</div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="images/<?php echo $image; ?>" height="100%" width="100%" class="img-thumbnail">
                    </div>
                    <div class="col-md-7">
                        <table align="center" class="table table-responsive">
                        <tr>
                            <th>First Name: </th>
                            <td><?php echo $firstname; ?></td>
                        </tr>
                        <tr>
                            <th>Last Name: </th>
                            <td><?php echo $lastname; ?></td>
                        </tr>
                        <tr>
                            <th>Contact No.: </th>
                            <td><?php echo $contact; ?></td>
                        </tr>
                        <tr>
                            <th>Username: </th>
                            <td><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td><?php echo $emailadd; ?></td>
                        </tr>
                    </table>
                    </div>
                </div><br>
                <center>
                    <a class="btn btn-pogi" href="edit_account.php">Edit</a>
                    <a class="btn btn-pogi" href="changepass.php">Change Password</a>
                </center>
            </div>
        </div>       
      </div>
    </div>

    <?php include "includes/footer.php" ?>

  </div>
</body>

</html>
