<?php require_once("includes/dbconnect.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BLOG</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg" style="background-color:#0a3d62;">
        <a class="navbar-brand" href="#">BLOG</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbar">
          <div class="navbar-nav">
            <a href="#" class="nav-link nav-item active">Home</a>
            <a href="#" class="nav-link nav-item">About Us</a>
            <a href="blog.php" class="nav-link nav-item">Blog</a>
            <a href="#" class="nav-link nav-item">Services</a>
            <a href="#" class="nav-link nav-item">Contact</a>
          </div>
        </div>
        <form action="" class="form-inline">
          <input type="search" class="form-control mr-sm-2" placeholder="Search">
          <button type="submit" class="btn btn-outline-warning my-2">GO</button>
        </form>
      </nav>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-12"><h1 class="my-4">My Blog Contant</h1></div>
          <div class="col-8 blog-contant">
            <?php
              global $conn;
              $viewQuery = "SELECT * FROM NewPost ORDER BY datetime desc";
              $execute = mysqli_query($conn, $viewQuery);
              while($Datarows=mysqli_fetch_array($execute)){
                $PostID = $Datarows["id"];
                $PostDate = $Datarows["datetime"];
                $PostTitle = $Datarows["title"];
                $PostCategory = $Datarows["category"];
                $PostAuthor = $Datarows["author"];
                $PostImage = $Datarows["image"];
                $PostDesc = $Datarows["postdesc"];

                ?>

                <div class="thumbnail">
                  <img class="img-responsive img-rounded" src="<?php echo $PostImage;?>" alt="Blog Post">
                </div>
                <div class="caption">
                  <h1><?php echo htmlentities($PostTitle);?></h1>
                  <p>Category:<?php echo htmlentities($PostCategory);?> Published On: <?php echo htmlentities($PostDate);?></p>
                  <p>
                    <?php
                      if(strlen($PostDesc)>5){
                        $PostDesc = substr($PostDesc, 0, 5).'...';
                        echo $PostDesc;
                      }
                    ?>
                  </p>
                  <a href="fullPost.php?id=<?php echo $PostID;?>"><span class="btn btn-info">Read More &rsaquo;&rsaquo;</span></a>
                </div>
              <?php } ?>
          </div>
          <div class="col-4">
            <aside class="">

            </aside>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <p class="bg-dark text-center py-4"> <?php echo date("Y"); ?> &copy; All Rights Reserved By Developer.</p>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
