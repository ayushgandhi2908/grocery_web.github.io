<?php
session_start();
if(isset($_SESSION['login_success'])){
    $mobile = $_SESSION['mobile'];
    $f_name = $_SESSION['f_name'] ;
    $l_name = $_SESSION['l_name'];
    $address = $_SESSION['address'];
    $email = $_SESSION['email'];
    $cust_id = $_SESSION['cust_id'];
    $cust = substr($cust_id,1);

}else{
    header('location: index.php');
}

include 'partials/dbconnect.php';
?>

<?php
if(isset($_GET['r'])){

$id = $_GET['r'];

$result = mysqli_query($conn, "DELETE FROM cart WHERE id='$id'");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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

    <h1 class="heading">Cart <span>products</span></h1>

    <div class="box-container">

    <?php
    $sql = "SELECT * FROM cart where mobile = '$mobile'";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);


    if($num_row > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            echo ' <div class="box">
            <span class="discount">'.$row['disc_per'].'%</span>
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
            <div class="quantity">
                <span>quantity : '.$row['quantity'].'/Kg</span></div>
                <div class="quantity">
                <span>Total : '.$row['total_price'].'Rs</span></div>
    
                <form action="cart.php?r='.$row['id'].'" method="post">
                <input type="submit" value="Remove from cart" name="remove_cart" class="btn">
                </form>
                
                </div>';            
        }


    }else{
echo 'No Product Added to cart';
    }



       

        ?>

        
</section>

<?php


if(isset($_POST['Buy_Prod'])){

    $sql = "SELECT * FROM cart where mobile = '$mobile'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $price = $row['total_price'];
        $quantity = $row['quantity'];
        $prod_name = $row['name'];
        $order_id = "#OID".rand(0,100000000);


        $sql2 = "INSERT INTO `orders` ( `order_id`, `prod_name`, `price`, `quantity`, `cust_name`, `cust_mobile`, `cust_address`, `order_time`,`status`) 
        VALUES ('$order_id', '$prod_name', '$price', '$quantity', '$f_name', '$mobile', '$address', current_timestamp(), 'pending')";
        $result2 = mysqli_query($conn, $sql2);

        $result3 = mysqli_query($conn, "DELETE FROM cart WHERE mobile='$mobile'");

    }
}



?>

<?php

if($num_row > 0){

    $sql = "SELECT * FROM cart where mobile = '$mobile'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $price = $row['total_price'];
    }

    $rand_order_id = "ORD". rand(10000,1000000000)."M".$mobile;

    
    echo ' <form action="pgRedirect.php" method="post">
    <input type="hidden" name="INDUSTRY_TYPE_ID" id="INDUSTRY_TYPE_ID" value= "Retail">
    Email:- <input type="text" name="EMAIL" id="EMAIL" value="'.$email.'"><br>
    Mobile:- <input type="text" name="MSISDN" id="MSISDN" value="'.$mobile.'"><br>
   <input type="hidden" name="order_id" id="ORDER_ID" value="'.$rand_order_id.'">
   <input type="hidden" name="total_ammount" id="total_ammount" value="'.$price.'">
   <input type="hidden" name="customer_id" id="order_id" value="'.$cust.'">

   <input type="hidden" name="CHANNEL_ID" id="CHANNEL_ID" value="WEB">
    <input type="submit" value="BUY" class="btn" style="background-color:red; margin-left:45%">
</form>';
}

?>



<!-- product section ends -->





<?php
include 'partials/footer.php';
?>




<!-- custom js file link  -->
<script src="js/script.js"></script>
    
</body>
</html>