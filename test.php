<?php
    include_once "includes/db_con.php";
?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              
                <?php 
                
                    $query_view = "SELECT * FROM income_tbl INNER JOIN branch ON income_tbl.branch_id = branch.branch_id INNER JOIN items ON income_tbl.item_id = items.item_id INNER JOIN brand ON income_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON income_tbl.receiver_id = admin_user.admin_id";
                    $run_view = mysqli_query($conn, $query_view);
 
                ?>
                
                <thead>
                    <tr>
                      <th>Type</th>
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
                            
                            if($row['for_pullout'] == 0){
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
                                           
                                           <a href='pullout.php?id=$id' class='btn btn-secondary btn-xs'><span class='fa fa-remove'></span></a>
                                           
									       <a href='delete_income.php?id=$id' class='btn btn-danger btn-xs'><span class='fa fa-trash'></span></a>
								        </div>
                                    </td>
                                </tr>
                                
                                ";
                            }else{
                                echo "";
                            }
                            
                        } // end 1st while incoming

                   $query_view2 = "SELECT * FROM outgoing_tbl INNER JOIN branch ON outgoing_tbl.branch_id = branch.branch_id INNER JOIN items ON outgoing_tbl.item_id = items.item_id INNER JOIN brand ON outgoing_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON outgoing_tbl.receiver_id = admin_user.admin_id";
                    $run_view2 = mysqli_query($conn, $query_view2);
 						
					while($row = mysqli_fetch_array($run_view2)){
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
                            
                            if($row['for_pullout'] == 0){
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
                                           
                                           <a href='pullout.php?id=$id' class='btn btn-secondary btn-xs'><span class='fa fa-remove'></span></a>
                                           
									       <a href='delete_income.php?id=$id' class='btn btn-danger btn-xs'><span class='fa fa-trash'></span></a>
								        </div>
                                    </td>
                                </tr>
                                
                                ";
                            }else{
                                echo "";
                            }
                            
                        } // end 1st while incoming

						
//						$str .= "iouuo";

                    ?>   
              </tbody>
            </table>
<?php

?>