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
        <li class="breadcrumb-item active">Add Outgoing</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-laptop"></i> Add Outgoing Item</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="functions.php">
                    
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetime">Date:</label> 
                                 <input class="form-control" name="date" type="date" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branch">Branch: </label>
                                <select class="form-control" name="branch_id" required>
                                    <option value=''></option>
                                    <?php 
                                        $query = "SELECT * FROM branch ORDER BY branch_name";
                                        $run = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($run)){
                                            $br_id = $row['branch_id'];
                                            $branch = $row['branch_name'];
                                            echo "<option value='$br_id'>$branch</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="contact_person">Contact Person:</label> 
                              <input class="form-control" name="con_person" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="contact">Contact#:</label> 
                              <input class="form-control" name="contact" id="con" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="item">Item type:</label> 
                              <select class="form-control" name="item_id" required>
                                    <option value=''></option>
                                    <?php 
                                        $query = "SELECT * FROM items";
                                        $run = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($run)){
                                            $item_id = $row['item_id'];
                                            $item_name = $row['item_name'];
                                            echo "<option value='$item_id'>$item_name</option>";
                                        }
                                    ?>  
                              </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="brands">Brand:</label> 
                              <select class="form-control" name="brand_id" required>
                                    <option value=''></option>
                                    <?php 
                                        $query = "SELECT * FROM brand";
                                        $run = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($run)){
                                            $brand_id = $row['brand_id'];
                                            $brand_name = $row['brand_name'];
                                            echo "<option value='$brand_id'>$brand_name</option>";
                                        }
                                    ?>  
                              </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="nounits">No. of units:</label> 
                              <input class="form-control" name="no_units" id="unit" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serial#">Serial#:</label> 
                                 <input class="form-control" name="serial" type="text" name="date" required>
                            </div>
                            <div class="form-group">
                              <label for="receiver">Received by:</label> 
                              <select class="form-control" name="receiver_id" required>
                                    <option value=''></option>
                                    <?php 
                                        $query = "SELECT * FROM admin_user";
                                        $run = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($run)){
                                            $admin_id = $row['admin_id'];
                                            $lastname = $row['lastname'];
                                            $firstname = $row['firstname'];
                                            echo "<option value='$admin_id'>$lastname,$firstname
                                            </option>";
                                        }
                                    ?>  
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="lrwc#">LRWC#:</label> 
                              <input class="form-control" name="lrwc" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="status">Status:</label> 
                              <select class="form-control" name="status" required>
                                    <option value=''></option>
                                    <option value='Deffective'>Deffective</option>
                                    <option value='For evaluation'>For evaluation</option>
                                    <option value='Working'>Working</option>
                                    
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarkes">Remarks:</label> 
                        <textarea class="form-control" rows="5" name="remarks" required></textarea>
                    </div>
                    <input type="submit" value="Save" name="save_outgoing" class="btn btn-primary btn-md" style="float:right;">
                </form>
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
    <?php include "includes/modal.php" ?>
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
    $( document ).ready(function() {
        document.querySelector("#unit").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }
        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});
    });
    
    $('#unit').keypress(function(key) {
        if(key.charCode < 49 || key.charCode > 57) return false;
    });
</script>
