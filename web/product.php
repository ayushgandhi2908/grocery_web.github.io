<?php
session_start();
$mobile = $_SESSION['mobile'];
include 'partials/dbconnect.php';
?>

<?php

if(isset($_POST['cart-add'])){
    $mobile = $_POST['mobile'];
    $list_price = $_POST['list_price'];
    $disc_price = $_POST['disc_price'];
    $disc_percentage = $_POST['disc_percentage'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];
    $total_price = $quantity * $disc_price;

    $sql = "INSERT INTO `cart` (`name`, `list_price`, `disc_price`, `disc_per`, `quantity`, `total_price`,`mobile`, `image`, `date`) 
    VALUES ('$name', '$list_price', '$disc_price', '$disc_percentage', '$quantity', $total_price ,'$mobile', '$image', current_timestamp())";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Added to cart";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
include 'partials/header.php';
?>

<!-- product section starts  -->

<section class="product" id="product">

    <h1 class="heading">latest <span>products</span></h1>

    <div class="box-container">

    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo ' <div class="box">
        <span class="discount">'.$row['disc_percentage'].'%</span>
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="/grocery website/admin/uploaded_img/'.$row['image'].'" alt="Image not shown">
        <h3>'.$row['name'].'</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <div class="price"> ₹'.$row['disc_price'].' <span> ₹'.$row['list_price'].' </span> </div>
       ';

        if(isset($_SESSION['login_success'])){
            echo   '<form action="" method="post">
            <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1" name="quantity">
            <input type="hidden" value="'.$row['image'].'" name="image">
            <input type="hidden" value="'.$row['name'].'" name="name">
            <input type="hidden" value="'.$row['disc_percentage'].'" name="disc_percentage">
            <input type="hidden" value="'.$row['disc_price'].'" name="disc_price">
            <input type="hidden" value="'.$row['list_price'].'" name="list_price">
            <input type="hidden" value="'.$mobile.'" name="mobile">
            <span> /kg </span>
        </div>
            <input type="submit" value="add to cart" name="cart-add" class="btn">
            </form>';
        }
        else{
            echo   '<a href="#" class="btn">Login first</a>';
        }
echo '</div>';
        
    }

       

        ?>

        
</section>

<!-- product section ends -->





<?php
include 'partials/footer.php';
?>




<!-- custom js file link  -->
<script src="js/script.js"></script>
    
</body>
</html>