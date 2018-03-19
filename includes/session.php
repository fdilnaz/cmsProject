<?php
session_start();

function errorMessage(){
  if(isset($_SESSION["ErrorMessage"])){
    $output = "<div class='alert alert-danger'>";
    $output.= htmlentities($_SESSION["ErrorMessage"]);
    $output.= "</div>";
    $_SESSION["ErrorMessage"] = Null;
    return $output;
  }
}

function successMessage(){
  if(isset($_SESSION["successMessage"])){
    $output = "<div class='alert alert-success'>";
    $output.= htmlentities($_SESSION["successMessage"]);
    $output.= "</div>";
    $_SESSION["successMessage"] = Null;
    return $output;
  }
}
 ?>
