<?php 
include('config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con, "select Email from admin where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('Mail adresi kullanılmaktadır.');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into admin(FullName, MobileNumber, Email,  Password) value('$fname', '$contno', '$email', '$password' )");
    if ($query) {
    echo "<script>alert('Yöneticiliğiniz tanımlandı.');</script>";
    echo "<script>window.location.href ='giris.php'</script>";
  }
  else
    {
      echo "<script>alert('Tekrar Deneyiniz.');</script>";
       echo "<script>window.location.href ='index.php'</script>";
    }
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
                    <h2 class="title">Yönetici Kayıt Formu</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="isim" name="fname" required="true">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="telefon numarası" name="contactno" required="true" maxlength="10" pattern="[0-9]+"> 
                                </div>
                            </div>
                         
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                               <input class="input--style-1" type="email" placeholder="Email " name="email" required="true"> 
                              
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input type="password" value="" class="input--style-1" name="password" required="true" placeholder="şifre">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Gönder</button>
                        </div>
                        <br>
                        <a href="giris.php" style="color: red">Hesabınız var mı? Giriş yap</a>
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

