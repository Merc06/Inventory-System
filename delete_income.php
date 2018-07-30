<?php 
    include "includes/db_con.php";
    include "includes/session.php";

    if($_SESSION['id'] != 1){
        echo"
        <script>
            alert('Only head Admin can delete data, please contact your head Admin!')
            window.location='incoming.php';
        </script>";
    }else{
        $query = "DELETE FROM income_tbl WHERE id = '".$_GET['id']."'";
        $run = mysqli_query($conn, $query);
        
        echo"
            <script>
                alert('You have successfully deleted income data!')
                window.location='incoming.php';
            </script>";
    }
    
?>