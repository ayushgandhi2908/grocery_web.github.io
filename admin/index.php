
<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(-1);

@include 'config.php';
@include 'partials/dbconnect.php';
session_start();
if(!isset($_SESSION['admin_login_success'])){
    header("Location: login.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DashBoard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="style2.css">


</head>

<body>

   <?php
     @include 'partials/header.php';
 ?>


   <!-- Design -->
   <div id="boxes1">
            <div id="box1">
               Profit <br>
               
               <?php
               $sql = "SELECT SUM(`price`) as `sum` FROM `orders`";
               $result = mysqli_query($conn,$sql);
               $row = mysqli_fetch_row($result);
               echo $row[0]."RS";
               ?>

            </div>

            <div id="box2">
               Products <br>
               <?php
               $sql = "SELECT * FROM products";
               $result = mysqli_query($conn,$sql);
               $num = mysqli_num_rows($result);
               echo $num;
               ?>
            </div>

            <div id="box3">
               Order <br>
               <?php
               $sql = "SELECT * FROM orders";
               $result = mysqli_query($conn,$sql);
               $num = mysqli_num_rows($result);
               echo $num;
               ?>
            </div>
   </div>

   <div id="boxes2">

      <div id="box4">
         Category <br>

         <?php
               $sql = "SELECT * FROM admin_cat";
               $result = mysqli_query($conn,$sql);
               $num = mysqli_num_rows($result);
               echo $num;
               ?>
      </div>

      <div id="box5">
         Users <br>
         <?php
               $sql = "SELECT * FROM login";
               $result = mysqli_query($conn,$sql);
               $num = mysqli_num_rows($result);
               echo $num;
               ?>
      </div>
</div>

<!-- <div id="boxes3">



</div> -->



   <?php
include 'partials/footer.php';
?>



</body>

</html>