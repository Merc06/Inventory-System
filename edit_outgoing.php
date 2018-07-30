<?php
    include_once "includes/db_con.php";
    include "includes/session.php";

    $query = "SELECT * FROM outgoing_tbl INNER JOIN branch ON outgoing_tbl.branch_id = branch.branch_id INNER JOIN items ON outgoing_tbl.item_id = items.item_id INNER JOIN brand ON outgoing_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON outgoing_tbl.receiver_id = admin_user.admin_id
    WHERE id = '".$_GET['id']."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $id = $_GET['id'];
        $item_id = $row['item_id'];
        $branch_id = $row['branch_id'];
        $brand_id = $row['brand_id'];
        $receiver_id = $row['admin_id'];
        $date = $row['date'];
        $branch_name = $row['branch_name'];
        $con_person = $row['con_person'];
        $contact = $row['contact'];
        $item_name = $row['item_name'];
        $brand_name = $row['brand_name'];
        $serial = $row['serial'];
        $lrwc = $row['lrwc'];
        $receiver_last = $row['lastname'];
        $receiver_first = $row['firstname'];
        $status = $row['status'];
        $remarks = $row['remarks'];

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
      <ol class="breadcrumb" style="background-color: #5d0404;">
        <li class="breadcrumb-item">
          <a href="index.php" style="color: white;"><b>Homepage</b></a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Edit Incoming</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-download"></i> Edit Incoming Item</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="functions.php?pass_id=<?php echo $_GET['id']; ?>">       
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetime">Date:</label> 
                                 <input class="form-control" name="date"  value="<?php echo $date; ?>" type="date" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="branch">Branch: </label>
                                <select class="form-control" name="branch_id" required>
                                    <option value="<?php echo $branch_id; ?>"><?php echo $branch_name; ?></option>
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
                              <input class="form-control" name="con_person" value="<?php echo $con_person; ?>" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="contact">Contact#:</label> 
                              <input class="form-control" name="contact" value="<?php echo $contact; ?>" type="text" id="con" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="item">Item type:</label> 
                              <select class="form-control" name="item_id" required>
                                    <option value='<?php echo $item_id; ?>'><?php echo $item_name; ?></option>
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
                                    <option value='<?php echo $brand_id; ?>'><?php echo $brand_name; ?></option>
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serial#">Serial#:</label> 
                                 <input class="form-control" name="serial" value="<?php echo $serial; ?>" type="text" name="date" required>
                            </div>
                            <div class="form-group">
                              <label for="receiver">Received by:</label> 
                              <select class="form-control" name="receiver_id" required>
                                    <option value='<?php echo $receiver_id; ?>'><?php echo $receiver_last.','.$receiver_first; ?></option>
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
                              <input class="form-control" name="lrwc" value="<?php echo $lrwc; ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="status">Status:</label> 
                              <select class="form-control" name="status" required>
                                    <option value='<?php echo $status; ?>'><?php echo $status; ?></option>
                                    <option value='Deffective'>Deffective</option>
                                    <option value='For evaluation'>For evaluation</option>
                                    <option value='Working'>Working</option>
                                    
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarkes">Remarks:</label> 
                        <textarea class="form-control" rows="5" name="remarks" value="<?php echo $remarks; ?>" required><?php echo $remarks; ?></textarea>
                    </div>
                    <input type="submit" value="Save" name="edit_outgoing" class="btn btn-pogi btn-md" style="float:right;">
                </form>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

