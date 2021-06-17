<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from admin where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['uid']=$ret['ID'];
     echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    }
    else{
    echo "<script>alert('Hatalı giriş yaptınız.');</script>";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Germiyanoğlu Konfeksiyon</title>


    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Giriş Yap</h2>
                    <form method="POST">
                        <div class="input-group">
                          
                            <input type="text" class="input--style-1" placeholder="Email" required="true" name="emailcont">
                        </div>
                      
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <input type="password" class="input--style-1" placeholder="şifre" name="password" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="login">Giriş Yap</button>
                        </div>
                        <br>
                       <a href="index.php">Hesabınız yoksa lütfen oluşturunuz.</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
 
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script>

</body>

</html>

