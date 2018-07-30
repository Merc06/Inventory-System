<?php
    include_once "includes/db_con.php";
    include "includes/session.php";

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
        <li class="breadcrumb-item active" style="color: white;">View Admin</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> List of Admin</div>
        <div class="card-body">
            
            <div id="message"></div>
            
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>   
                </tfoot>
                <tbody>
                    <?Php
                        $query = "SELECT * FROM admin_user";
                        $run = mysqli_query ($conn, $query);
                        while ($row=mysqli_fetch_array($run)){
                            $id = $row['admin_id'];
                            $image = $row['img'];
                            $lastname = $row['lastname'];
                            $firstname = $row['firstname'];
                            $contact = $row['cel_no'];
                            $username = $row['username'];
                            $email = $row['email'];
                            
                            echo "
                                <tr class='delete$id'>
                                    <td>$id</td>
                                    <td>
                                        <img class='img-thumbnail view_details' name='view' id='$id' src='images/$image' height='100' width='100'>
                                    </td>
                                    <td>$lastname</td>
                                    <td>$firstname</td>
                                    <td>$contact</td>
                                    <td>$username</td>
                                    <td>$email</td>
                                    <td>
                                        <div class='btn-group'>
									       <a href='edit_admin.php?user_id=$id' class='btn btn-warning btn-xs' data-toggle='tooltip' title='Edit Info'><span class='fa fa-edit'></span></a>
									       <button class='btn btn-danger btn-xs' id='$id' data-toggle='tooltip' title='Delete'><span class='fa fa-trash'></span></button>
								        </div>
                                    </td>
                                </tr>   
                            ";
                        }
                    ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php" ?>
  </div>
</body>    
   
</html>

