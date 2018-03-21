<?php require_once("includes/dbconnect.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
  $Title = mysqli_real_escape_string($conn, $_POST["Title"]);
  $Category = mysqli_real_escape_string($conn, $_POST["selectCategory"]);
  $PostDesc = mysqli_real_escape_string($conn, $_POST["postDesc"]);

  date_default_timezone_set("Asia/Dubai");
  $Currenttime = time();
  $Datetime = strftime("%B - %d, %Y %H : %M : %S", $Currenttime);
  $Datetime;

  $Admin = "Fahmida Dilnaz";

  $Image = $_FILES["imageFile"]["name"];
  $Target = "upload/".$Image;

if(empty($Title)){

  $_SESSION["ErrorMessage"] = "Title Can't be empty.";
  redirect_to("add_new_post.php");
}

elseif(strlen($Title)<3){
  $_SESSION["ErrorMessage"] = "Title must be more than 3 Characters.";
  redirect_to("add_new_post.php");
  }

  else{

    $query = "INSERT INTO NewPost(datetime,title,category,author,image,postdesc) VALUES ('$Datetime', '$Title', '$Category', '$Admin', '$Image', '$PostDesc')";

    $result = mysqli_query($conn, $query);

    move_uploaded_file($_FILES["imageFile"]["tmp_name"], $Target);


    if($result){
      $_SESSION["successMessage"] = "Your Post Added Successfully!";
      redirect_to("add_new_post.php");
    }
    else{
      $_SESSION["ErrorMessage"] = "Post Failed to Add.";
      redirect_to("add_new_post.php");
    }


  }

} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <title>Add New Post</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-3 side-area">
            <h4 class="py-4 text-center">
              <i class="fas fa-user"></i>
               <a href="index.php"> Admin Panel</a>
            </h4>
            <nav class="nav flex-column nav-pills">
              <a class="nav-link my-2" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              <a class="nav-link my-2" href="categories.php"><i class="fas fa-compress"></i> Categories</a>
              <a class="nav-link active my-2" href="add_new_post.php"><i class="fas fa-plus"></i> Add New Post</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-unlock-alt"></i> Manage Admins</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-th-list"></i> Live Blog</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
        <div class="col-9 main-content">
            <h3 class="py-4">Add New Post</h3>
            <?php echo errorMessage();
                  echo successMessage();
            ?>
            <form class="form" action="add_new_post.php" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                  <label for="postTitle" class="col-sm-2 col-form-label"> Title: </label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" name="Title" id="postTitle" placeholder="Title">
                  </div>
              </div>
              <div class="form-group row">
                <label for="selectCategory" class="col-sm-2 col-form-label"> Category: </label>
                <div class="col-sm-10">
                  <select class="form-control" id="selectCategory" name="selectCategory">
                    <?php

                      $viewQuery = "SELECT * FROM categories ORDER BY datetime desc";
                      $execute = mysqli_query($conn, $viewQuery);

                      while ($Datarows = mysqli_fetch_array($execute)) {
                        $ID = $Datarows["id"];
                        $CategoryName = $Datarows["categoryname"];

                      ?>
                      <option><?php echo $CategoryName;?></option>
                      <?php   } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="imageFile" class="col-sm-2 col-form-label"> Upload Image: </label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-file" id="imageFile" name="imageFile">
                </div>
              </div>
              <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label"> Description: </label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="description" name="postDesc" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-3">
                    <input type="submit" name="Submit" value="Add New Post" class="btn btn-success">
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    <footer>

      <p class="bg-dark text-center py-4"> <?php echo date("Y"); ?> &copy; All Rights Reserved By Developer.</p>

    </footer>



    <script src="js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
