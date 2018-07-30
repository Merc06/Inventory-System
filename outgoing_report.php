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
        <li class="breadcrumb-item active" style="color: white;">Outgoing Reports Sort by Date</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Outgoing Reports</div>
        <div class="card-body">
            <div class="container">
                <form action="outgoing_report_view.php" method="post">
                    <div class="row">
                        <div class="col-md-4"> 
                            <input class="form-control" name="weekly" type="date" required>
                        </div>
                        <div class="col-md-2">
                            <center><h5 style="padding-top:7px;">Up to</h5></center>
                        </div>
                        <div class="col-md-4">                            
                            <input class="form-control" name="weekly2" type="date" required>
                        </div>
                        <div class="col-md-2">                            
                            <input class="btn btn-pogi" name="submit_outgoing_report" value="View" type="submit" required>
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
