<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to leave?</div>
        <form method="POST" action="functions.php">
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-pogi" value="Logout" name="logout">
          </div>
        </form>
    </div>
  </div>
</div>

<?php
        $query = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
        $image = $row['img'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $contact = $row['cel_no'];
          $username = $row['username'];
          $email = $row['email'];
      ?>
      
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"><?php echo $firstname.' '.$lastname; if($_SESSION['id'] == 1){echo "<strong>&nbsp(HEAD ADMIN)</strong>";} ?></h6>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-sm-4" >
                      <center>
                        <img class="img-thumbnail" src="images/<?php echo $image; ?>" style="height:120px; width:120px;">
                      </center>
                  </div>
                  <div class="col-sm-8" style="padding-left:0;">
                      <table class="table table-hover">
                          <tbody>
                              <tr>
                                  <td>Username: </td>
                                  <td><?php echo $username; ?></td>
                              </tr>
                              <tr>
                                  <td>Contact No.: </td>
                                  <td><?php echo $contact; ?></td>
                              </tr> 
                              <tr>
                                  <td>Email: </td>
                                  <td><?php echo $email; ?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
            
              <div class="modal-footer">
                  <form action="edit_account.php" method="post">
                        <input class="btn btn-pogi btn-sm" href="edit_account.php" type="submit" value="Edit">
                  </form>
                <button class="btn btn-pogi btn-sm" type="button" data-dismiss="modal">Back</button>
              </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" id="image_zoom">
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="view_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" id="detail_zoom">
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_item">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Items Here</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="itemName" placeholder="Enter Item Name...">
            </div>
        </div>
        <form method="POST" action="functions.php">
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary btn-sm" value="Add item" name="addItem">
              <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="add_brand">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Brands Here</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="brandName" placeholder="Enter Brand Name...">
            </div>
        </div>
        <form method="POST" action="functions.php">
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary btn-sm" value="Add Brand" name="addBrand">
              <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
    </div>
  </div>
</div>
