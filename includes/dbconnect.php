<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "phpcms";

$conn = mysqli_connect( [$dbHost, $dbUser, $dbPassword, $dbName]);

if(!$conn){

  die("Connection failed: " . mysqli_connect_error($conn));

}

 ?>
