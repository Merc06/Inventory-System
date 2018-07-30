<?php 
    include "includes/db_con.php";
    include "includes/session.php";

    if($_SESSION['id'] != 1){
        echo"
        <script>
            alert('Only head Admin can delete data, please contact your head Admin!')
            window.location='outgoing.php';
        </script>";
    }else{
        $query1 = "UPDATE income_tbl SET for_pullout = '0' WHERE serial = '".$_GET['serial']."' AND lrwc = '".$_GET['lrwc']."'";
        $run1 = mysqli_query($conn, $query1);
        
        $query = "DELETE FROM outgoing_tbl WHERE id = '".$_GET['id']."'";
        $run = mysqli_query($conn, $query);
        
        echo"
            <script>
                alert('You have cancel Outgoing Data!')
                window.location='outgoing.php';
            </script>";
    }
    
?>