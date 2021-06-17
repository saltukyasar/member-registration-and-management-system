<?php
session_start();
error_reporting(0);
include('config.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:cikis.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Germiyanoğlu Konfeksiyon</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="css/read.css" rel="stylesheet" media="all">
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Çalışan Bilgileri</h2>
                    </div>
                     
                </div>
            </div>
<table cellpadding="0" cellspacing="0"  class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<?php
$vid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from calisanlar where ID =$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
 <tr>
    <th>İsim</th>
    <td><?php  echo $row['FirstName'];?></td>
    <th>Soyisim</th>
    <td><?php  echo $row['LastName'];?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
    <th>Telefon Numarası</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
  <tr>
    <th>Adres</th>
    <td><?php  echo $row['Address'];?></td>
    <th>İşe Giriş Tarihi</th>
    <td><?php  echo $row['CreationDate'];?></td>
  </tr>
<?php 
$cnt=$cnt+1;
}?>
                 
</tbody>
</table>
       
        </div>
    </div>
</div>     
</body>
</html>