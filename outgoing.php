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
        <li class="breadcrumb-item active" style="color: white;">Outgoing</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-upload"></i><b> Outgoing Item</b></div>
        <div class="card-body">
            <center><div id="print"></div></center>
            <br>
            <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              
                <?php 
                
                    $query_view = "SELECT * FROM outgoing_tbl INNER JOIN branch ON outgoing_tbl.branch_id = branch.branch_id INNER JOIN items ON outgoing_tbl.item_id = items.item_id INNER JOIN brand ON outgoing_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON outgoing_tbl.receiver_id = admin_user.admin_id";
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
                      <th>Pullout Approval</th>
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
                      <th>LRWC No.</th>
                      <th>Receiver</th>
                      <th>Status</th>
                      <th>Remarks</th>
                      <th>Pullout Approval</th>
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
        $approval = $row['for_pullout'];
        $check = '';

            if($_SESSION['id'] != 1){
                $check = 'disabled';
            }

            if($approval == 0){
                $approval = 'PENDING!';
                echo "
                    <tr>
                        <td>$id</td>
                        <td>
                            ";
                        if(empty($trans_income)){
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
                        <td style='color:red;'>$approval</td>
                        <td>
                            <div class='btn-group'>
                               <a href='edit_outgoing.php?id=$id' class='btn btn-warning btn-xs' data-toggle='tooltip' title='Edit'><span class='fa fa-edit'></span></a>

                                <a href='functions.php?accept_id=$id&stat=$status&serial=$serial&lrwc=$lrwc' class='btn btn-success btn-xs $check' data-toggle='tooltip' title='Approve Request'><span class='fa fa-check'></span></a>

                               <a href='delete_outgoing.php?id=$id&stat=$status&serial=$serial&lrwc=$lrwc' class='btn btn-danger btn-xs' data-toggle='tooltip' title='Cancel'><span class='fa fa-ban'></span></a>
                            </div>
                        </td>
                    </tr>
                    ";
            }else{
                $approval = 'ACCEPTED!';
                echo "
                    <tr>
                        <td>$id</td>
                        <td>
                        ";
                        if(empty($trans_income)){
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
                        <td>$approval</td>
                        <td>
                        </td>
                    </tr>

                    ";
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
    
    <script>
        $(document).ready(function(){
            $('.view_image').click(function(){
                var image_id = $(this).attr("id");
                
                $.ajax({
                    url     :   "functions.php",
                    method  :   "POST",
                    data    :   {outgoing_id:image_id},
                    success :   function(data){
                        $('#image_zoom').html(data);
                        $('#view').modal("show");
                    }
                });
            });
        });
    </script>
    
</body>

</html>
