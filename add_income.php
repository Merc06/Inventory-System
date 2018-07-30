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
      <ol class="breadcrumb" style="background-color: #5d0404;">
        <li class="breadcrumb-item">
          <a href="index.php" style="color: white;"><b>Homepage</b></a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Add Incoming</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-download"></i> Add Incoming Item</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="functions.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Transmittal:</label> 
                                 <input class="form-control-file" name="trans" type="file">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetime">Date:</label> 
                                 <input class="form-control" name="date" type="date">
                            </div>
                        </div>
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
                              <input class="form-control" name="con_person" type="text" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="contact">Contact No.:</label> 
                              <input class="form-control" name="contact" id="con" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="item">Item Type:</label>
                            <div class="input-group">
                              <select class="form-control" id="itemSelect" name="item_id" required>
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
                               <!-- <span class="btn btn-pogi" data-toggle="modal" data-target="#add_item"> -->
                                <a href="add_item.php" class="btn btn-pogi btn-sm" data-toggle="tootltip" title="Add New Item">
                                    <span class="fa fa-plus-circle"></span>
                                </a>    
                            </div>
                        </div>
                        <div class="col-md-6">
                          <label for="brands">Brand:</label>    
                            <div class="input-group">
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
                                <!-- <span class="btn btn-pogi" data-toggle="modal" data-target="#add_brand"> -->
                                <a href="add_brand.php" class="btn btn-pogi btn-sm" data-toggle="tootltip" title="Add New Brand">
                                    <span class="fa fa-plus-circle"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serial#">OS License Key:</label> 
                                 <input class="form-control" name="os" id="os" type="text" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="lrwc#">MS License Key:</label> 
                              <input class="form-control" name="ms" id="ms" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serial#">Serial No.:</label> 
                                 <input class="form-control" name="serial" id="sr" type="text">
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
                                            echo "<option value='$admin_id'>$firstname $lastname
                                            </option>";
                                        }
                                    ?>  
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="lrwc#">LRWC No.:</label> 
                              <input class="form-control" name="lrwc" id="lr" type="text" required>
                            </div>
                            <div class="form-group">
                              <label for="status">Status:</label> 
                              <select class="form-control" name="status" required>
                                    <option value=''></option>
                                    <option value='Working'>Working</option>
                                    <option value='Deffective'>Deffective</option>
                                    <option value='For evaluation'>For Evaluation</option>
                                    <option value='For Disposal'>For Disposal</option>
                                    
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarkes">Remarks:</label> 
                        <textarea class="form-control" rows="5" name="remarks" required></textarea>
                    </div>
                    <input type="submit" value="Save" name="save" class="btn btn-pogi btn-md" style="float:right;">
                </form>
            </div>
        </div>    
      </div>
    </div>

    <?php include "includes/footer.php" ?>

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

    $('select').select2({
        theme   :   "bootstrap",
        width   :   "90%"
        
  
        
    });
</script>

