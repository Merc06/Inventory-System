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
        <li class="breadcrumb-item active" style="color: white;">Add Brand</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-amazon"></i> Add Brand</div>
        <div class="card-body">
            <div class="container">
                <form action="functions.php" method="post">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="form-control" name="brand" type="text" autocomplete="off" placeholder="Type Brand Name..." required>
                                <span><input type="submit" name="add_brand" class="btn btn-pogi btn-md" value="Add New Brand"></span>
                            </div>    
                        </div>
                        <div class="col-md-3"></div>
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
