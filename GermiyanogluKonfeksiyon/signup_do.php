<?php

include "config.php";

$newuser_username = $_POST["uname"];
$newuser_password = $_POST["upass"];
$newuser_telno = $_POST["utel"];
$newuser_bdate = $_POST["ubdate"];

$islem = $mysqli->query("INSERT INTO calisanlar(username,password,telno,birthdate) VALUES ('".$newuser_username."','".$newuser_password."','".$newuser_telno."','".$newuser_bdate."')");

if ($islem == false ){
    echo("Error description: " . $mysqli -> error);
  }
  else{
      echo "Kayıt Başarılı!";
  }

?>