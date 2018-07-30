<?php
date_default_timezone_set('Asia/Taipei');
ini_set("session.gc_maxlifetime", "28800");
$current_date = date('m/d/Y h:i:s a', time());

include_once "includes/db_con.php";
include "includes/session.php";

if (isset($_POST['log'])) {
    $user = mysqli_escape_string($conn, $_POST['username']);
    $pass = mysqli_escape_string($conn, $_POST['password']);    

    //var_dump(md5($pass));
    $query = "SELECT * FROM admin_user WHERE username='$user'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $tbl_user = $row['username'];
        $tbl_pass = $row['password'];
        $tbl_id = $row['admin_id'];

        if($user != $tbl_user){
             echo " <script>
                        alert('Username Or Password Is Incorrect!');
                        window.location='login.php';
                    </script>";

        }else if($tbl_pass != md5($pass)){
             echo " <script>
                        alert('Username Or Password Is Incorrect!');
                        window.location='login.php';
                    </script>";
        }else{

            $_SESSION['id'] = $tbl_id;
            if(!empty($_POST["remember"])){
                setcookie ("admin_login", $user, time() + (86400 * 30), "/");
                setcookie ("admin_pass", $pass, time() + (86400 * 30), "/");
            }else{
                if(isset($_COOKIE["admin_login"]))   
                {  
                 setcookie ("admin_login","");  
                }  
                if(isset($_COOKIE["admin_pass"]))   
                {  
                 setcookie ("admin_pass","");  
                }  
           }
            
               echo "   
                    <script>
                        window.location='index.php';
                    </script> 
                    ";
            
        }
    
}//end of isset LOGIN===============>

if(isset($_POST['logout'])){
    
    session_destroy();
    header("location: login.php");
    
} //end of isset LOGOUT===============>

if(isset($_POST['save'])){
    $date = $_POST['date'];
    $branch_id = $_POST['branch_id'];
    $con_person = $_POST['con_person'];
    $contact = $_POST['contact'];
    $item_id = $_POST['item_id'];
    $brand_id = $_POST['brand_id'];
    $os = $_POST['os'];
    $ms = $_POST['ms'];
    $serial = $_POST['serial'];
    $lrwc = $_POST['lrwc'];
    $receiver_id = $_POST['receiver_id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $target_path = "images/";
    $target_path = $target_path.basename($_FILES['trans']['name']);  
    move_uploaded_file($_FILES['trans']['tmp_name'],$target_path);
    
    $query = " INSERT INTO `lrwc_db`.`income_tbl` 
    (`id`, `trans`, `date`, `branch_id`, `con_person`, `contact`, `item_id`, `os`, `ms`, `brand_id`, `serial`, `lrwc`, `receiver_id`, `status`, `remarks`) 
    VALUES (NULL, '". basename($_FILES['trans']['name']) . "', '$date', '$branch_id', '$con_person', '$contact', '$item_id','$os', '$ms', '$brand_id', '$serial', '$lrwc', '$receiver_id', '$status', '$remarks'); ";
    $run = mysqli_query($conn, $query);
   
    echo "
        <script>
            alert('Data Successfully Added to Incoming Table!')
            window.location='add_income.php';
        </script>";
   
    
} //end of isset ADD INCOMING===============>

if(isset($_POST['edit'])){
    $id_pass = $_GET['pass_id'];
    $date = $_POST['date'];
    $branch_id = $_POST['branch_id'];
    $con_person = $_POST['con_person'];
    $contact = $_POST['contact'];
    $item_id = $_POST['item_id'];
    $brand_id = $_POST['brand_id'];
    $serial = $_POST['serial'];
    $lrwc = $_POST['lrwc'];
    $receiver_id = $_POST['receiver_id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    
             
    $query = "UPDATE income_tbl
                SET date = '" . $date . "',
                    branch_id = '" . $branch_id . "',
                    con_person = '" . $con_person . "',
                    contact = '" . $contact . "',
                    item_id = '" . $item_id . "',
                    brand_id = '" . $brand_id . "',
                    serial = '" . $serial . "',
                    lrwc = '" . $lrwc . "',
                    receiver_id = '" . $receiver_id . "',
                    status ='" .  $status . "',
                    remarks = '" . $remarks . "'
                WHERE id = '" . $id_pass . "'
            ";

    $run = mysqli_query($conn, $query);
   
    echo "
        <script>
            alert('Data successfully Edited!')
            window.location='incoming.php';
        </script>";
   
    
} //end of isset EDIT INCOMING===============>

if(isset($_POST['add_admin'])){
        
    if($_SESSION['id'] != 1){
        echo "
            <script>
                alert('You Can\'t Add Another Admin, Please Contact Your Head Admin!');
                window.location='index.php';
            </script>
            ";
    }else{
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $username = mysqli_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];
        $target_path = "images/";
        $target_path = $target_path.basename($_FILES['image']['name']);  
        move_uploaded_file($_FILES['image']['tmp_name'],$target_path);

        $query_user = "SELECT * FROM admin_user WHERE username = '".$username."'";
        $run_user = mysqli_query($conn, $query_user);
        $row = mysqli_fetch_array($run_user);
        
        $user = $row['username'];
        $pass = $row['password'];
        
        if($user == $username){
            echo "
                <script>
                    alert('Username Already Exist!');
                    window.history.back();
                </script>
                ";
        }else if($pass == md5($password)){
            echo "
                <script>
                    alert('Password Already Exist!');
                    window.history.back();
                </script>
                ";
        }else{
            $query_add = "INSERT INTO admin_user (admin_id, img, firstname, lastname, cel_no, username, password, email) values('',
            '". basename($_FILES['image']['name']) . "',
            '" . $firstname . "',
            '" . $lastname . "',
            '" . $contact . "',
            '" . $username . "',
            '" . md5($password) . "',
            '" . $email . "')";
            $run_add = mysqli_query($conn, $query_add);

            echo "
                <script>
                    alert('You Have Successfully Added Another Admin')
                    window.location='add_admin.php';
                </script>";
        }
    }
} //end of isset ADD ADMIN ===============>

if(isset($_POST['save_admin'])){
    $target_path = "images/";
    $target_path = $target_path.basename($_FILES['image']['name']);  
    move_uploaded_file($_FILES['image']['tmp_name'],$target_path);
    
    $id = $_GET['save_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact']; 
    $email = $_POST['email'];
    $username = $_POST['username'];
    
             
    $query = "UPDATE admin_user
                SET img = '" . basename($_FILES['image']['name']) . "',
                    firstname = '" . $firstname . "',
                    lastname = '" . $lastname . "',
                    cel_no = '" . $contact . "',
                    email = '" . $email . "',
                    username = '" . $username . "'
                WHERE admin_id = '" . $id . "'
            ";

    $run = mysqli_query($conn, $query);
   
    echo "
            <script>
                alert('Data Successfully Edited!')
                window.location='view_admin.php';
            </script>";
} //end of isset SAVE ADMIN ===============>

if(isset($_POST['admin_id'])){
    
     $sql_query="DELETE FROM admin_user WHERE admin_id='".$_POST['admin_id']."'";
     mysqli_query($conn, $sql_query);
   
}

if(isset($_POST['add_branch'])){
    $branch = $_POST['branch'];
    $branch_add = $_POST['branch_add'];
    $corp = $_POST['corp'];
    $branch_contact = $_POST['branch_contact'];
    
    $query = "SELECT * FROM branch WHERE branch_name = '".$branch."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
    
    $branch_name = $row['branch_name'];
    
    if($branch == $branch_name){
        echo "
            <script>
                alert('Branch Already Exist! Please Input New Branch');
                window.location='add_branch.php';
            </script>";
    }else{
        $query_add = "INSERT INTO branch (branch_name, corp_id, branch_add, branch_contactno)
        values(
        '" . $branch . "',
        '" . $corp . "',
        '" . $branch_add . "',
        '" . $branch_contact . "')";
        $run_add = mysqli_query($conn, $query_add);

        echo "
            <script>
                alert('You Have Successfully Added Another Branch')
                window.location='add_branch.php';
            </script>"; 
    }
} //end of isset ADD BRANCH ===============>

if(isset($_POST['add_brand'])){
    
    $query = "SELECT * FROM brand WHERE brand_name = '".$_POST['brand']."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);

     $brand = $row['brand_name'];
    
    if($_POST['brand'] == $brand){
        echo "
            <script>
                alert('Brand Already Exist! Please Input New Brand');
                window.location='add_brand.php';
            </script>"; 
    }else{
        $query_add = "INSERT INTO brand (brand_name)
        values('" . $_POST['brand'] . "')";
        $run_add = mysqli_query($conn, $query_add);
            echo "
                <script>
                    alert('You Have Successfully Added Another Brand')
                    window.location='add_brand.php';
                </script>"; 
    }
    
} //end of isset ADD BRAND ===============>

if(isset($_POST['add_item']) || isset($_POST['itemName'])){
    if(isset($_POST['add_item'])){
         $item_name = $_POST['item'];
    
        $query = "SELECT * FROM items WHERE item_name = '".$item_name."'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);

        $item = $row['item_name'];

        if($item == $item_name){
            echo "
                <script>
                    alert('Item Already Exist! Please Input New Item');
                    window.location='add_item.php';
                </script>";
        }else{
            $query_add = "INSERT INTO items (item_name) values('" . $item_name . "')";
            $run_add = mysqli_query($conn, $query_add);
            echo "
                <script>
                    alert('You Have Successfully Added Another Item')
                    window.location='add_item.php';
                </script>"; 
        }
        
    }else{
        $item_name = $_POST['itemName'];
        
        $query = "SELECT * FROM items WHERE item_name = '".$item_name."'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);

        $item = $row['item_name'];


        if($item == $item_name){
            echo "false";
            exit();
            
        }else{
             $item_name = $_POST['itemName'];
            $query_add = "INSERT INTO items (item_name)
            values('" . $item_name . "')";
            $run_add = mysqli_query($conn, $query_add);
        }
    }
   
} //end of isset ADD ITEM ===============>

if(isset($_POST['save_outgoing'])){
    $date = $_POST['date'];
    $branch_id = $_POST['branch_id'];
    $con_person = $_POST['con_person'];
    $contact = $_POST['contact'];
    $item_id = $_POST['item_id'];
    $brand_id = $_POST['brand_id'];
    $serial = $_POST['serial'];
    $lrwc = $_POST['lrwc'];
    $receiver_id = $_POST['receiver_id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    
    $query = " INSERT INTO `lrwc_db`.`outgoing_tbl` (`id`, `date`, `branch_id`, `con_person`, `contact`, `item_id`, `brand_id`, `serial`, `lrwc`, `receiver_id`, `status`, `remarks`, `approval`) VALUES (NULL, '$date', '$branch_id', '$con_person', '$contact', '$item_id', '$brand_id', '$serial', '$lrwc', '$receiver_id', '$status', '$remarks', '0'); ";
    $run = mysqli_query($conn, $query);
   
    echo "
        <script>
            alert('Data Is Pending, Please Contact Your Head Admin For The Approval!')
            window.location='add_outgoing.php';
        </script>";
   
    
} //end of isset ADD OUTGOING===============>

if(isset($_POST['edit_outgoing'])){
    $id_pass = $_GET['pass_id'];
    $date = $_POST['date'];
    $branch_id = $_POST['branch_id'];
    $con_person = $_POST['con_person'];
    $contact = $_POST['contact']; // wait check ko
    $item_id = $_POST['item_id'];
    $brand_id = $_POST['brand_id'];
    $serial = $_POST['serial'];
    $lrwc = $_POST['lrwc'];
    $receiver_id = $_POST['receiver_id'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    
             
    $query = "UPDATE outgoing_tbl
                SET date = '" . $date . "',
                    branch_id = '" . $branch_id . "',
                    con_person = '" . $con_person . "',
                    contact = '" . $contact . "',
                    item_id = '" . $item_id . "',
                    brand_id = '" . $brand_id . "',
                    serial = '" . $serial . "',
                    lrwc = '" . $lrwc . "',
                    receiver_id = '" . $receiver_id . "',
                    status ='" .  $status . "',
                    remarks = '" . $remarks . "'
                WHERE id = '" . $id_pass . "'
            ";

    $run = mysqli_query($conn, $query);
   
    echo "
        <script>
            alert('Data Successfully Edited!')
            window.location='outgoing.php';
        </script>";
   
    
} //end of isset EDIT INCOMING===============>

if(isset($_GET['accept_id'])){
    $status = $_GET['stat'];
    $query = "UPDATE outgoing_tbl SET status = 'PULLOUT-$current_date', for_pullout = '1' 
    WHERE id = '".$_GET['accept_id']."'";
    $run = mysqli_query($conn, $query);
        echo "
        <script>
            alert('Data Accepted!')
            window.location='outgoing.php';
        </script>";
    
} //end of isset ACCEPT DATA===============>

if(isset($_POST['pullout'])){
    $date = $_POST['date'];
    $branch_id = $_POST['branch_id'];
    $con_person = $_POST['con_person'];
    $contact = $_POST['contact'];
    $item_id = $_POST['item_id'];
    $brand_id = $_POST['brand_id'];
    $serial = $_POST['serial'];
    $lrwc = $_POST['lrwc'];
    $receiver_id = $_POST['receiver_id'];
    $remarks = $_POST['remarks'];
    
    $trans = $_GET['trans'];
        $query1 = "UPDATE income_tbl SET for_pullout = '1' WHERE serial = '".$_GET['serial']."' AND lrwc = '".$_GET['lrwc']."'";
        $run1 = mysqli_query($conn, $query1);
   
        $query = " INSERT INTO `lrwc_db`.`outgoing_tbl` (`id`, `trans`, `date`, `branch_id`, `con_person`, `contact`, `item_id`, `brand_id`, `serial`, `lrwc`, `receiver_id`, `status`, `remarks`, `for_pullout`) VALUES (NULL, '$trans', '$date', '$branch_id', '$con_person', '$contact', '$item_id', '$brand_id', '$serial', '$lrwc', '$receiver_id', 'PULLOUT-pending', '$remarks', '0'); ";
        $run = mysqli_query($conn, $query);
      
        echo "
            <script>
                alert('Data Is Pending, Please Contact Your Head Admin For The Approval!');
                window.location='incoming.php';
            </script>";
    
} //end of isset PULLOUT===============>

if(isset($_POST['update_account'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cont = $_POST['cont'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    $query = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $contact = $row['cel_no'];
        $username = $row['username'];
        $emailadd = $row['email'];
        $password = $row['password'];
    
    if($password == md5($pass)){
        $query_update = "UPDATE admin_user
                SET firstname = '" . $fname . "',
                    lastname = '" . $lname . "',
                    cel_no = '" . $cont . "',
                    username = '" . $user . "',
                    email = '" . $email . "'
                WHERE admin_id = '".$_SESSION['id']."'
            ";

        $run_update = mysqli_query($conn, $query_update);
        
        echo "
            <script>
                alert('Account Updated!');
                window.location='index.php';
            </script>";
    }else{
        echo "
            <script>
                alert('Password Is Incorrect!');
                window.location='edit_account.php';
            </script>";
    }
} //end of isset UPDATE ACCOUNT===============>

if(isset($_POST['change_pass'])){
    $query = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
        $pass = $row['password'];

        $current = $_POST['current'];
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];

    if($pass != md5($current)){
        echo "
            <script>
                alert('Current Password Is Incorrect!');
                window.location='changepass.php';
            </script>";
    }else if($pass == md5($new)){
        echo "
            <script>
                alert('Please Enter New Password!');
                window.location='changepass.php';
            </script>";
    }else if($new != $confirm){
        echo "
            <script>
                alert('Password Did Not Match!');
                window.location='changepass.php';
            </script>";
    }else{
        $query = "UPDATE admin_user SET password = '".md5($new)."' 
                WHERE admin_id = '".$_SESSION['id']."'";
        $run = mysqli_query($conn, $query);
        
        echo "
            <script>
                alert('You Have Successfully Change Your Password!');
                window.location='view_account.php';
            </script>";
    }
}   //end of isset CHANGE PASS ===============>

if (isset($_POST['image_id'])){
    $output = '';
    $query = "SELECT * FROM income_tbl WHERE id = '".$_POST['image_id']."'";
    $run = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_array($run)){
        $output .= '
            <img src="images/'.$row["trans"].'" height="100%" width="100%">
        ';
    }
  echo $output;  
}   //end of isset VIEW INCOME IMAGE ===============>



if (isset($_POST['detail_id'])){
    $output = '';
    $query = "SELECT * FROM admin_user WHERE admin_id = '".$_POST['detail_id']."'";
    $run = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_array($run)){
        $output .= '
            <img src="images/'.$row["img"].'" height="100%" width="100%">
        ';
    }
  echo $output;  
}   //end of isset VIEW ADMIN DETAILS ===============>
?>
