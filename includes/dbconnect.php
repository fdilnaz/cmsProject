<?php

$conn = mysqli_connect('localhost', 'root', '', 'phpcms');

if(!$conn){
  die("Connection failed: " . mysqli_connect_error($conn));
}

 ?>
