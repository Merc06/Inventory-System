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
        <li class="breadcrumb-item active" style="color: white;">Incoming</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-download"></i> <b>Incoming Item</b></div>
        <div class="card-body">
            <center><div id="print"></div></center>
            <br>
            <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              
                <?php 
                
                    $query_view = "SELECT * FROM income_tbl INNER JOIN branch ON income_tbl.branch_id = branch.branch_id INNER JOIN items ON income_tbl.item_id = items.item_id INNER JOIN brand ON income_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON income_tbl.receiver_id = admin_user.admin_id ORDER BY id DESC";
                    $run_view = mysqli_query($conn, $query_view);
                ?>
                
                <thead>
                    <tr>
                      <th>#</th>
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
                      <th>Action</th>
                    </tr>
                </thead>
              <tfoot>
                    <tr>
                      <th>#</th>
                        <th>Transmittal</th>
                      <th>Date</th>
                      <th>Branch</th>
                      <th>Contact Person</th>
                      <th>Contact No.</th>
                      <th>Item</th>
                      <th>Brand</th>
                      <th>Serial No.</th>
                      <th>LRWC#</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>Remarks</th>
                      <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php 
    
    while($row = mysqli_fetch_array($run_view)){
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
        $for_pullout = $row['for_pullout'];
        
        $query_check = "SELECT * FROM outgoing_tbl WHERE serial = '".$serial."' AND lrwc = '".$lrwc."'";
        $run_check = mysqli_query($conn, $query_check);
        $row_check = mysqli_fetch_array($run_check);
            $pull = $row_check['for_pullout'];
        
        if($for_pullout == 0){
            echo "
                <tr>
                    <td>$id</td>
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
                    <td>
                        <div class='btn-group'>
                           <a href='edit_income.php?id=$id' class='btn btn-warning btn-xs' data-toggle='tooltip' title='Edit'><span class='fa fa-edit'></span></a>

                           <a href='pullout.php?id=$id&serial=$serial&lrwc=$lrwc&trans=$trans' class='btn btn-secondary btn-xs' data-toggle='tooltip' title='Pullout'><span class='fa fa-upload'></span></a>

                           <a href='delete_income.php?id=$id' class='btn btn-danger btn-xs' data-toggle='tooltip' title='Delete'><span class='fa fa-trash'></span></a>
                        </div>
                    </td>
                </tr>

                ";
        }else{
            echo "";
        }

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
