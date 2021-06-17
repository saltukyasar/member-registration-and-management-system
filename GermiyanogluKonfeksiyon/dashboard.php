<?php
session_start();
error_reporting(0);
include('config.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:cikis.php');
  } else{

if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from calisanlar where ID=$rid");
echo "<script>alert('Silindi');</script>"; 
echo "<script>window.location.href = 'dashboard.php'</script>";     
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
<link href="css/dashboard.css" rel="stylesheet" media="all">

</head>
<body>

    <div class="container">
    <div class="card-body">
    <?php   $uid=$_SESSION['uid'];
    $ret=mysqli_query($con,"select FullName from admin where ID='$uid'");
    $row=mysqli_fetch_array($ret);
    $name=$row['FullName'];

    ?>
    <h1>Hoşgeldiniz <?php echo $name;?></h1>

    </div>
      <a href="cikis.php" class="btn btn-danger btn-default">Çıkış</a>
    </div>
   
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Çalışan Tablosu </h2>
                    </div>
                       <div class="col-sm-7" align="right">
                        <a href="calisan_ekle.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Yeni Çalışan Ekle</span></a>
                                        
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>İsim</th>                       
                        <th>Email</th>
                        <th>Telefon Numarası</th>
                        <th>İşe Giriş Tarih</th>
                        <th>Düzenle</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
$ret=mysqli_query($con,"select * from calisanlar");
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {

?>
<!--Fetch the Records -->
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                        <td><?php  echo $row['Email'];?></td>                        
                        <td><?php  echo $row['MobileNumber'];?></td>
                        <td> <?php  echo $row['CreationDate'];?></td>
                        <td>
  <a href="bilgiler.php?viewid=<?php echo htmlentities ($row['ID']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="edit.php?editid=<?php echo htmlentities ($row['ID']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="dashboard.php?delid=<?php echo ($row['ID']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Silmek istediğinize emin misiniz ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
</tr>
<?php } ?>                 
                
                </tbody>
            </table>
       
        </div>
    </div>
</div>     
</body>
</html>


<?php }  ?>