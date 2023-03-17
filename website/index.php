<?php

session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];

}

?>

<?php 
include "partials/_dbconnect.php";?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Home</title>
    <link rel="stylesheet" href="website.css">
    <style>
      <?php require "website.css";  ?>
      <?php require "footer.css"; ?>
    </style>
  </head>
  <body>

  <?php require "partials/_navbar.php";?>


  <div id="home_navbar">
    <img src="/food planet/website/web_img/home_img.jpg" alt="Image Loading" class="home_img">
  </div>


  <div id="nav_text">
    <h3 class="heading">Welcome to Food Planet</h3>
    <p>
      It would be acetous, sour, acid, acidic, tart, astringent, pungent, harsh, acrid; never sweet. Yummy food is
      scrumptious, delicious, delectable, luscious, great tasting, much more than tasty, really appetizing,
      lip-smacking; the kind of food to have you licking your lips in anticipation.</p>
    <button type="button" class="home_learn_btn btn">Learn More</button>
    <button type="button" class="home_order_btn btn"><a href="purchase.php" style="color:white;">Order Now</a></button>
  </div>


  <div id="home_contain">

    <div class="grp1">
      <img src="/food planet/website/web_img/bike.png" class="bike_png">
      <span>Everything You Order at- Will be quickely delivered to you dor.</span>
    </div>

    <div class="grp2">
      <img src="/food planet/website/web_img/freshfood.png" class="freshfood_png">
      <span>We use only best indegradients to cook the tasty fresh food</span>
    </div>

    <div class="grp3">
      <img src="/food planet/website/web_img/cheif.png" class="cheif_png">
      <span>Our staff consist of chefs and cooks with of experiance</span>
    </div>

    <div class="grp4">
      <img src="/food planet/website/web_img/dish.png" class="dish_png">
      <span>In our menu you will a wide variety of dishesh, dessert and drink</span>
    </div>


  </div>

 <!-- Wallpaper CCarasoul  -->
 <div class="container my-5">
 <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/food planet/website/web_img/c1.jpg" class="img1 d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="/food planet/website/web_img/c2.jpg" class="img1 d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/food planet/website/web_img/c3.jpg" class="img1 d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

  
<?php include "partials/_footer.php"; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>