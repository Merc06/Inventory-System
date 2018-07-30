
<?php
    include_once "includes/db_con.php";
    include "includes/session.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php 
    include "includes/head.php";
?>

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
        <li class="breadcrumb-item active" style="color: white;">My Homepage</li>
      </ol>
        <div id="demo" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
              <li data-target="#demo" data-slide-to="3"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/banner.jpg" alt="ITMS" width="100%" height="500">
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/logo-lrwc.png" alt="ableisure" width="100%" height="500">
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/abc.jpg" alt="ableisure" width="100%" height="500">
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/asd.jpg" alt="first cagayan" width="100%" height="500">
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>   
            </div>
          </div>
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div><br><br>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-user-plus"></i>
              </div>
                <div class="mr-5"><b>Add New Admin</b></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_admin.php">
              <span class="float-left"><b>Click Here!</b></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-home"></i>
              </div>
                <div class="mr-5"><b>Add New Branch</b></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_branch.php">
              <span class="float-left"><b>Click Here!</b></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-amazon"></i>
              </div>
                <div class="mr-5"><b>Add New Brand</b></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_brand.php">
              <span class="float-left"><b>Click Here!</b></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-dropbox"></i>
              </div>
                <div class="mr-5"><b>Add New Item</b></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="add_item.php">
                <span class="float-left"><b>Click Here!</b></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
        <br>
        <ol class="breadcrumb" style="background-color: #5d0404;">
                <a href="add_income.php" class="btn btn-pogi btn-sm" data-toggle="tooltip" title="Add Incoming Item"><b>+ Add Incoming</b></a>
            </li>
        </ol>
        <center><div id="print"></div></center>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              
                <?php 
                
                    $query_view = "SELECT * FROM income_tbl INNER JOIN branch ON income_tbl.branch_id = branch.branch_id INNER JOIN items ON income_tbl.item_id = items.item_id INNER JOIN brand ON income_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON income_tbl.receiver_id = admin_user.admin_id WHERE for_pullout = '0'";
                    $run_view = mysqli_query($conn, $query_view);
 
                ?>
                
                <thead>
                    <tr>
                        <th colspan="13"><center><span class="text-info">Incoming</span> - <span class="text-warning">Outgoing</span><center></th>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <th>Transmittal</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>Serial No.</th>
                      <th>LRWC No.</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>Remarks</th>
                    </tr>
                </thead>
              <tfoot>
                    <tr>
                      <th>Type</th>
                        <th>Transmittal</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>Serial No.</th>
                      <th>LRWC No.</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>Remarks</th>
                </tr>
              </tfoot>
              <tbody>
<?php
    while($row = mysqli_fetch_array($run_view)){
        $id_income = $row['id'];
        $trans_income = $row['trans'];
        $date_income = $row['date'];
        $branch_name_income = $row['branch_name'];
        $con_person_income = $row['con_person'];
        $contact_income = $row['contact'];
        $item_name_income = $row['item_name'];
        $brand_name_income = $row['brand_name'];
        $serial_income = $row['serial'];
        $lrwc_income = $row['lrwc'];
        $receiver_last_income = $row['lastname'];
        $receiver_first_income = $row['firstname'];
        $status_income = $row['status'];
        $remarks_income = $row['remarks'];
        $pull_income = $row['for_pullout'];
  
        if($pull_income == 0){   
        echo "
            <tr class='table-info'>
                <td>Incoming</td>
                <td>
            ";
                if(empty($trans_income)){
                    echo "";
                }else{
                    echo "
                         <img class='img-thumbnail' id='$id_income' src='images/$trans_income' height='100' width='90'>
                    ";
                }   
        echo "            
                </td>
                <td>$date_income</td>
                <td>$branch_name_income</td>
                <td>$con_person_income</td>
                <td>$contact_income</td>
                <td>$item_name_income</td>
                <td>$brand_name_income</td>
                <td>$serial_income</td>
                <td>$lrwc_income</td>
                <td>$receiver_last_income,$receiver_first_income</td>
                <td>$status_income</td>
                <td>$remarks_income</td>
            ";   
            }else{
                echo "";
            }
        
            
    }

$query_view2 = "SELECT * FROM outgoing_tbl INNER JOIN branch ON outgoing_tbl.branch_id = branch.branch_id INNER JOIN items ON outgoing_tbl.item_id = items.item_id INNER JOIN brand ON outgoing_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON outgoing_tbl.receiver_id = admin_user.admin_id";
$run_view2 = mysqli_query($conn, $query_view2);

while($row = mysqli_fetch_array($run_view2)){
        $id = $row['id'];
        $trans = $row['trans'];
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
    
        echo "
            <tr class='table-warning'>
                <td>Outgoing</td>
                <td>
                ";
                if(empty($trans)){
                    echo "";
                }else{
                    echo "
                         <img class='img-thumbnail view_image' name='view' id='$id' src='images/$trans' height='100' width='90'>
                    ";
                }   
        echo "          
                </td>
                <td>$date</td>
                <td>$branch_name</td>
                <td>$con_person</td>
                <td>$contact</td>
                <td>$item_name</td>
                <td>$brand_name</td>
                <td>$serial</td>
                <td>$lrwc</td>
                <td>$receiver_last,$receiver_first</td>
                <td>$status</td>
                <td>$remarks</td>

                ";
        
    }
?>   
              </tbody>
            </table>
            </div><br><br>    
        </div>

    
    <?php include "includes/footer.php" ?>
  </div>    
        
    
</body>

</html>
