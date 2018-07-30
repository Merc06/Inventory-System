<?php
    include_once "includes/db_con.php";
    include "includes/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php include"includes/head.php";?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include "includes/nav.php" ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All item table</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-laptop"></i> Incoming Item</div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              
                <?php 
                
                    $query_view = "SELECT * FROM income_tbl INNER JOIN branch ON income_tbl.branch_id = branch.branch_id INNER JOIN items ON income_tbl.item_id = items.item_id INNER JOIN brand ON income_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON income_tbl.receiver_id = admin_user.admin_id";
                    $run_view = mysqli_query($conn, $query_view);
                    
                        
                
                ?>
                
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact#</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>No. of Items</th>
                      <th>Serial#</th>
                      <th>LRWC#</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>remarks</th>
                      <th>Action</th>
                    </tr>
                </thead>
              <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact#</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>No. of Items</th>
                      <th>Serial#</th>
                      <th>LRWC#</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>remarks</th>
                      <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                    <?php
                        while($row = mysqli_fetch_array($run_view)){
                            $id = $row['id'];
                            $date = $row['date'];
                            $branch_name = $row['branch_name'];
                            $con_person = $row['con_person'];
                            $contact = $row['contact'];
                            $item_name = $row['item_name'];
                            $brand_name = $row['brand_name'];
                            $no_units = $row['no_units'];
                            $serial = $row['serial'];
                            $lrwc = $row['lrwc'];
                            $receiver_last = $row['lastname'];
                            $receiver_first = $row['firstname'];
                            $status = $row['status'];
                            $remarks = $row['remarks'];
                            
                            echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$date</td>
                                    <td>$branch_name</td>
                                    <td>$con_person</td>
                                    <td>$contact</td>
                                    <td>$item_name</td>
                                    <td>$brand_name</td>
                                    <td>$no_units</td>
                                    <td>$serial</td>
                                    <td>$lrwc</td>
                                    <td>$receiver_last,$receiver_first</td>
                                    <td>$status</td>
                                    <td>$remarks</td>
                                    <td>
                                        <div class='btn-group'>
									       <a href='edit_income.php?id=$id' class='btn btn-warning btn-xs'><span class='fa fa-edit'></span></a>
									       <a href='delete_income.php?id=$id' class='btn btn-danger btn-xs'><span class='fa fa-trash'></span></a>
								        </div>
                                    </td>
                                </tr>
                                
                                ";
                            
                        }
                    ?>   
              </tbody>
            </table>
          </div>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              
                <?php 
                
                    $query_view = "SELECT * FROM outgoing_tbl INNER JOIN branch ON outgoing_tbl.branch_id = branch.branch_id INNER JOIN items ON outgoing_tbl.item_id = items.item_id INNER JOIN brand ON outgoing_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON outgoing_tbl.receiver_id = admin_user.admin_id";
                    $run_view = mysqli_query($conn, $query_view);
 
                ?>
                
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact#</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>No. of Items</th>
                      <th>Serial#</th>
                      <th>LRWC#</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>remarks</th>
                      <th>Approval status</th>
                      <th>Action</th>
                    </tr>
                </thead>
              <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact#</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>No. of Items</th>
                      <th>Serial#</th>
                      <th>LRWC#</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>remarks</th>
                      <th>Approval status</th>
                      <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                    <?php
                        while($row = mysqli_fetch_array($run_view)){
                            $id = $row['id'];
                            $date = $row['date'];
                            $branch_name = $row['branch_name'];
                            $con_person = $row['con_person'];
                            $contact = $row['contact'];
                            $item_name = $row['item_name'];
                            $brand_name = $row['brand_name'];
                            $no_units = $row['no_units'];
                            $serial = $row['serial'];
                            $lrwc = $row['lrwc'];
                            $receiver_last = $row['lastname'];
                            $receiver_first = $row['firstname'];
                            $status = $row['status'];
                            $remarks = $row['remarks'];
                            $approval = $row['approval'];
                            $check = '';
                                if($approval == 0){
                                    $approval = 'Pending!';
                                }else{
                                    $approval = 'Accepted!';
                                }
                                
                                if($_SESSION['id'] != 1){
                                    $check = 'disabled';
                                }
                            
                            echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$date</td>
                                    <td>$branch_name</td>
                                    <td>$con_person</td>
                                    <td>$contact</td>
                                    <td>$item_name</td>
                                    <td>$brand_name</td>
                                    <td>$no_units</td>
                                    <td>$serial</td>
                                    <td>$lrwc</td>
                                    <td>$receiver_last,$receiver_first</td>
                                    <td>$status</td>
                                    <td>$remarks</td>
                                    <td>$approval</td>
                                    <td>
                                        <div class='btn-group'>
									       <a href='edit_outgoing.php?id=$id' class='btn btn-warning btn-xs'><span class='fa fa-edit'></span></a>
                                            <a href='functions.php?accept_id=$id' class='btn btn-success btn-xs $check'><span class='fa fa-check'></span></a> 
									       <a href='delete_outgoing.php?id=$id' class='btn btn-danger btn-xs'><span class='fa fa-trash'></span></a>
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
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>    
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include "includes/footer.php" ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <form method="POST" action="functions.php">
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Logout" name="logout">
              </div>
            </form>
        </div>
      </div>
    </div>
      <div class="modal fade" id="frofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile Information</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">PROFILE</div>
            <form method="POST" action="functions.php">
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
                
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
