<?php

include "config.php";

$uname = $_POST["uname"];
$upass = $_POST["upass"];

$result= $mysqli -> query("SELECT * FROM calisanlar WHERE username='$uname' AND password='$upass' LIMIT 1  ");

$satir = $mysqli -> fetch_assoc($result);

?>