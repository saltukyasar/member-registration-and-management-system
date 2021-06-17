<?php 
session_start();
error_reporting(0);
include('config.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:cikis.php');
  }
if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $add=$_POST['address'];

 
     $query=mysqli_query($con, "update  calisanlar set FirstName='$fname',LastName='$lname', MobileNumber='$contno', Email='$email', Address='$add' where ID='$eid'");
     
    if ($query) {
    echo "<script>alert('Bilgiler Güncellendi');</script>";
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  }
  else
    {
      echo "<script>alert('Tekrar Deneyiniz.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Germiyanoğlu Konfeksiyon</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="css/edit.css" rel="stylesheet" media="all">
</head>
<body>
<div class="signup-form">
    <form  method="POST">
 <?php
$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from calisanlar where ID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Güncelleme Sayfası </h2>
		<p class="hint-text">Bilgileri Güncelleyebilirsiniz.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" value="<?php  echo $row['FirstName'];?>" required="true"></div>
				<div class="col"><input type="text" class="form-control" name="lname" value="<?php  echo $row['LastName'];?>" required="true"></div>
			</div>        	
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="contactno" value="<?php  echo $row['MobileNumber'];?>" required="true" maxlength="10" pattern="[0-9]+">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" required="true">
        </div>
		
		<div class="form-group">
            <textarea class="form-control" name="address" required="true"><?php  echo $row['Address'];?></textarea>
        </div>        
      <?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Güncelle</button>
        </div>
    </form>

</div>
</body>
</html>