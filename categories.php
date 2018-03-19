<?php require_once("includes/dbconnect.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
  $CategoryName = mysqli_real_escape_string($conn, $_POST["Category"]);
  date_default_timezone_set("Asia/Dubai");
  $Currenttime = time();
  $Datetime = strftime("%B - %d, %Y %H : %M : %S", $Currenttime);
  $Datetime;

  $Admin = "Fahmida Dilnaz";

if(empty($CategoryName)){

  $_SESSION["ErrorMessage"] = "All fields must be filled out.";
  redirect_to("categories.php");
}

elseif(strlen($CategoryName)>99){
  $_SESSION["ErrorMessage"] = "Too long name for category";
  redirect_to("categories.php");
  }

  else{

    $query = "INSERT INTO categories(datetime,categoryname,creatorname) VALUES ('$Datetime', '$CategoryName', '$Admin')";

    $result = mysqli_query($conn, $query);

    if($result){
      $_SESSION["successMessage"] = "Category Added Successfully!";
      redirect_to("categories.php");
    }
    else{
      $_SESSION["ErrorMessage"] = "Category Failed to Add.";
      redirect_to("categories.php");
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
    <title>CMS Dashboard</title>
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
              <a class="nav-link active my-2" href="categories.php"><i class="fas fa-compress"></i> Categories</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-plus"></i> Add New Post</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-unlock-alt"></i> Manage Admins</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-th-list"></i> Live Blog</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
        <div class="col-9 main-content">
            <h3 class="p-4">Manage Categories</h3>
            <?php echo errorMessage();
                  echo successMessage();
            ?>
            <form class="form" action="categories.php" method="post">
              <div class="form-group row">
                  <label for="categoryName" class="col-sm-3 col-form-label labeltxt ">Category Name: </label>
                <div class="col-sm-7">
                  <input class="form-control" type="text" name="Category" id="categoryName" placeholder="Category Name">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="Submit" value="Add Category" class="btn btn-success">
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
