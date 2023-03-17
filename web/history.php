
<?php
include 'partials/dbconnect.php';
session_start();

$mobile = $_SESSION['mobile'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
include "partials/header.php";
?>


<!-- product section starts  -->

<section class="product" id="product">

    <h1 class="heading"> <span>HISTORY</span></h1>

    <div class="box-container">

    <?php
    $sql = "SELECT * FROM orders where cust_mobile='$mobile' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo ' <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
    
        <h3>'.$row['prod_name'].'</h3>
        <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>
        <h4 style="font-size:17px">Quantity '.$row['quantity'].'/Kg</h4>
        <h4 style="font-size:17px">Price '.$row['price'].'/Rs</h4>
        <h4 style="font-size:17px">Order ID '.$row['order_id'].'</h4>
        <h4 style="font-size:17px">Order Status '.$row['status'].'</h4>

        </div>';

        }

        

       

        ?>

        
</section>

<!-- product section ends -->


<?php
include "partials/footer.php";
?>






<!-- custom js file link  -->
<script src="js/script.js"></script>
    
</body>
</html>