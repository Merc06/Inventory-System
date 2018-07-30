<?php
    session_start();
    include_once "includes/db_con.php";
    
    if(isset($_SESSION['id'])){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ITMS-INVENTORY SYSTEM</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
    
    <style>
        body, html{
            background-color: #a03536; 
            background-repeat: no-repeat; 
            background-size: cover;
            -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;

            font-family: 'Oxygen', sans-serif;
        }
        .container{
            padding-top: 150px;
            padding-bottom: 100px;

        }

        .main{
            margin-top: 70px;
        }

        h5 { 
            font-family: 'Passion One', cursive; 
            font-weight: 1000;
            color:#9D292D;
            margin-bottom: 30px;

        }


        .form-group{
            margin-bottom: 15px;
        }

        label{
            margin-bottom: 7px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 11px;
            padding-top: 3px;
        }

        .main-login{
            background-color: #fff;
            border-radius: 4px;
            /* shadows and rounded borders */
            -webkit-box-shadow: 10px 10px 17px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 17px 0px rgba(0,0,0,0.75);
            box-shadow: 10px 10px 17px 0px rgba(0,0,0,0.75);

        }

        .main-center{
            margin-top: 30px;
            margin: 0 auto;
            max-width: 330px;
            padding: 20px 40px;

        }
    </style>
</head>

<body>
    
  <div class="container">
            
        <div class="main-login main-center">
            <form action="functions.php?f=2" method="POST">

                <div class="form-group">
                    <center>
                        <img src="images/login-logo.png" width="110" height="110" style="margin-top:-78px; margin-bottom:10px;">
                        <h5>ITMS INVENTORY</h5>
                    </center>
                    <label for="username" class="cols-sm-2 control-label">Username:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  autocomplete="off" placeholder="Enter your Username" value="<?php if(isset($_COOKIE['admin_login'])){ echo $_COOKIE['admin_login']; } ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" value="<?php if(isset($_COOKIE['admin_pass'])){ echo $_COOKIE['admin_pass']; } ?>"  required/>
                        </div>
                    </div>
                </div>
                
                <div class="form-group"> 
                    <div class="cols-sm-10">
                        <div class="input-group" style="margin-left: 20px;">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" <?php if(isset($_COOKIE['admin_login'])){ echo 'checked'; }?> />
                            <label for="rememberMe" class="cols-sm-2 control-label" style="font-size: 12px; margin-top:1px;">Remember me?</label>
                        </div>
                    </div>
                    
                </div>

                <div class="form-group ">
                    <input type="submit" name="log" value="Login" class="btn btn-pogi btn-block">
                </div>

            </form>
        </div>
   
    
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
