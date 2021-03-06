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
               <i class="fas fa-user"></i><a href="index.php"> Admin Panel</a>
            </h4>
            <nav class="nav flex-column nav-pills">
              <a class="nav-link active my-2" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              <a class="nav-link my-2" href="categories.php"><i class="fas fa-compress"></i> Categories</a>
              <a class="nav-link my-2" href="add_new_post.php"><i class="fas fa-plus"></i> Add New Post</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-unlock-alt"></i> Manage Admins</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-th-list"></i> Live Blog</a>
              <a class="nav-link my-2" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
        <div class="col-9 main-content">
            <h3 class="p-4">PHP Admin Panel for CMS </h3>
            <?php echo phpinfo();?>
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
