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
        <li class="breadcrumb-item active" style="color: white;">Add Branch</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-home"></i> Add Branch</div>
        <div class="card-body">
            <div class="container">
                <form action="functions.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7">
                             <div class="form-group">
                                <label for="branch name">Branch Name:</label> 
                                <input class="form-control" name="branch" type="text" placeholder="Type Branch Name" required>
                            </div>
                            <div class="form-group">
                                <label for="branch add">Branch Address:</label> 
                                <input class="form-control" name="branch_add" type="text" placeholder="Type Branch Address" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="corp no">Corp. ID:</label> 
                                <input class="form-control" name="corp" id="numb" type="text" placeholder="Type Corp. ID" required>
                            </div>
                            <div class="form-group">
                                <label for="Branch contact">Branch Contact No.:</label> 
                                <input class="form-control" name="branch_contact" id="numb2" type="text" placeholder="Type Branch Contact No." required>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                           <input type="submit" name="add_branch" class="btn btn-pogi btn-md" value="Save" style="float:right;">
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
        document.querySelector("#numb").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }
        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});
    });
    $( document ).ready(function() {
        document.querySelector("#numb2").addEventListener("keypress", function (e) {
        var allowedChars = '0123456789.';
        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }
        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key)
                || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();});
    });
</script>

