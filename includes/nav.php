  <?php 
        $query = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
            $id = $row['admin_id'];
            $image = $row['img'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
    ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #7c0000; box-shadow: 3px 5px 3px #888888;" id="mainNav" >
    <a class="navbar-brand" href="index.php"><img src="images/Logomakr_2Op3Y0.png" height="30" width="37">&nbsp; <b> ITMS Inventory System</b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="background-color: #5d0404;">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-home" style="font-size:20px;color:white;"></i>
            <span class="nav-link-text" style="color: white;">Homepage</span>
          </a>
        </li>
       <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Maintenance">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">         
            <i class="fa fa-fw fa-cog" style="font-size:20px;color:white;"></i>
            <span class="nav-link-text" style="color: white;">Maintenance</span>
          </a>
            <?php
                if($id == 1){
                    echo "
                        <ul class='sidenav-second-level collapse' id='collapseComponents' style='background-color: #5d0404;'>
                            <li>
                              <a href='view_admin.php' style='color: white;'>View All Admin</a>
                            </li>
                            <li>
                              <a href='add_admin.php' style='color: white;'>Add New Admin</a>
                            </li>
                            <li>
                              <a href='view_account.php' style='color: white;'>View Your Account</a>
                            </li>
                        </ul>
                        ";
                }else{
                    echo "
                        <ul class='sidenav-second-level collapse' id='collapseComponents' style='background-color: #5d0404;'>
                            <li>
                              <a href='view_account.php' style='color: white;'>View Your Account</a>
                            </li>
                        </ul>
                        ";
                }
            ?>
        </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap" style="font-size:20px;color:white;"></i>
            <span class="nav-link-text" style="color: white;">Inventory</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti" style="background-color: #5d0404;">
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" style="color: white;"> Incoming</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2" style="background-color: #5d0404;">
                <li>
                  <a href="incoming.php" style="color: white;">View Incoming</a>
                </li>
                <li>
                  <a href="add_income.php" style="color: white;">Add Incoming</a>
                </li>
              </ul>
            </li>
              <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" style="color: white;"> Outgoing</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti3" style="background-color: #5d0404;">
                <li>
                  <a href="outgoing.php" style="color: white;">View Outgoing</a>
                </li>
             <!--   <li>
                  <a href="add_outgoing.php">Add Outgoing</a>
                </li> -->
              </ul>
            </li>
          </ul>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
           <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-calendar" style="font-size:20px;color:white;"></i>
                <span class="nav-link-text" style="color: white;">Reports</span>
          </a>
            <ul class='sidenav-second-level collapse' id='collapseComponents2' style='background-color: #5d0404;'>
                <li>
                  <a href='income_report.php' style='color: white;'>Incoming Reports</a>
                </li>
                <li>
                  <a href='outgoing_report.php' style='color: white;'>Outgoing Reports</a>
                </li>
            </ul>
        </li>
          
      </ul> 
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="form-group">
              <img class="rounded-circle" data-toggle="modal" data-target="#frofile" src="images/<?php echo $image ?>" style="height:35px; width:35px;">
              <span>
                  <a class="nav-link" data-toggle="modal" data-target="#profile" style="color: white;">Hi! <?php echo $firstname; ?></a>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" style="color: white;">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>