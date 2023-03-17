
<style>
    a{
    text-decoration:none;
    color:white;
  }
  a:hover{
    color:black;
  }
  
  <?php include "website.css";?>


  </style>

<nav class="navigation navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="index.php"><img src="/food planet/website/web_img/nav_img.png" width="90px" height="80px"></a>
    <a class="navbar-brand" href="index.php">Food Planet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="purchase.php">Purchase</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="your_order.php">Your Orders</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More info
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="about.php">About Us</a></li>
            <li><a class="dropdown-item" href="contactus.php">Contact US</a></li>
            <li><a class="dropdown-item" href="FAQ.php">FAQ</a></li>
          </ul>
        </li>
      </ul>



      <?php 
      if(isset($_SESSION['login'])){
        $query = "SELECT * FROM user_carts where user_email = '$user_email'";
      $query_run = mysqli_query($conn, $query);
      $num = mysqli_num_rows($query_run);

      echo '<a href="your_cart.php"><i class="bi bi-cart" style="color:white"><span id="cart_num">'.$num.'</span></i></a>';     
      }
      elseif(!isset($_SESSION['login'])){
        echo '<a href="your_cart.php"><i class="bi bi-cart" style="color:white"></i></a>';
      }
      
      

      ?>

         <?php
        if(!isset($_SESSION['login'])){
          echo '<button type="button" class="login btn btn-outline-success mx-2"><a href= "login.php">Login</a></button>
          <button type="button" class="signup btn btn-outline-success"><a href= "signup.php">SignUp</a></button>';
        }
        elseif(isset($_SESSION['login'])){
          echo ' <button type="button" class="logout btn btn-outline-success mx-2"><a href="logout.php">LogOut</a></button>
          <button type="button" class="logout btn btn-outline-success mx-2"><a href="profile.php">Profile</a></button>';
        }
        ?>
    </div>
    </div>
  </nav>
