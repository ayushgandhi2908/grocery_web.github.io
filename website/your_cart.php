<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email= $_SESSION['user_email'];

}else{
  echo '<script>window.location="index.php"</script>';
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

    <title>Your Cart</title>
    <link rel="stylesheet" href="website.css">
    <style>
    <?php require "website.css";
    ?><?php require "footer.css";
    ?>
    </style>
</head>

<body>

    <?php require "partials/_navbar.php";?>

    <?php
  
   if(isset($Order_success)){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Successfully Ordered </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   }
  ?>
    <h1 class="text-center my-5">Your Cart</h1>

    <?php
  if(isset($_SESSION['login'])){
    $user_name= $_SESSION['user_name'];
   $user_mobile =$_SESSION['user_mobile'];
   $user_address = $_SESSION['user_address'];
   $user_cust_id = $_SESSION['customer_id'];


if(isset($_GET['add_cart_id'])){
 $add_cart_id = $_GET['add_cart_id'];
 $quantity = $_GET['quan'];

 
 $sql = "SELECT * FROM food_details where food_id='$add_cart_id'";
 $result = mysqli_query($conn, $sql);

    while($rows= mysqli_fetch_assoc($result)){
        $food_id = $rows['food_id'];
        $food_name = $rows['name'];
        $food_disc = $rows['discription'];
        $food_ammount = $rows['amount'];
        $food_delivery_charge =$rows['delivery_charge'];
        $food_category = $rows['category'];
        $food_image = $rows['image'];
        $total = ($quantity*$food_ammount)+ $food_delivery_charge;
        $total_price = $food_ammount + $food_delivery_charge;

     }
     $carts_query = "SELECT * FROM `user_carts` where `user_email` = '$user_email' AND `food_id` = $add_cart_id";
     $query_run = mysqli_query($conn, $carts_query);
     $fetch_rows= mysqli_num_rows($query_run);
     echo $fetch_rows;

     if($fetch_rows == 0){
      $_SESSION['added_cart_success']= TRUE;

      $sql2 = "INSERT INTO `user_carts` (`user_name`, `user_email`, `user_mobile`, `food_name`, `food_quantity`, `delivery_charge`, `food_price`, `food_category`, `food_img`, `date`,`food_id`,`address`,`total`)
      VALUES ('$user_name', '$user_email', '$user_mobile', '$food_name', '$quantity', '$food_delivery_charge', '$food_ammount', '$food_category', '$food_image', current_timestamp(), '$add_cart_id','$user_address','$total')";
     $result2 = mysqli_query($conn, $sql2);
 
      if($result2 == TRUE){
         $added_cart = TRUE;
         echo '<script>
         
         window.location = "purchase.php"
         </script>';
 
        }

     }
     elseif($fetch_rows > 0){
      $added_cart_fail= TRUE;
      echo '<script>
         
      window.location = "purchase.php"
      </script>';

     }

 }
 elseif(isset($_GET['dlt_cart_id'])){
    $dlt_cart_id = $_GET['dlt_cart_id'];
    $sql = "SELECT * FROM `user_carts` where user_email = '$user_email' AND `food_id` = $dlt_cart_id";
    $result = mysqli_query($conn, $sql);
    while($rows = mysqli_fetch_assoc($result)){
        $dlt_food_id = $_GET['dlt_cart_id'];
        
        $dlt_sql = "DELETE FROM `user_carts` where food_id = '$dlt_food_id' ";
        $result = mysqli_query($conn, $dlt_sql);
    }
    if($result == TRUE){
        $dlt_cart = TRUE;
        echo '<script>
        
        window.location = "purchase.php"
        </script>';

       }
 }

  }




  if(isset($_POST['carts_buy_btn'])){

    $radioval = $_POST['radio'];
    
    foreach($radioval as $item){
      if($item == "COD"){
        echo '<div id="cart_confirm">
        <p>Confirm to Order</p>
        <button onclick="confirm()">Confirm</button>
        <button onclick="cancel()">Cancel</button>
        </div>';
      }
      elseif($item == "PO"){
        echo '<script>window.location = "payonline.php"</script>';
      }
    }
  }
   
?>

    <div class="container text-center">

        <div class="row">
            <?php 


$query = "SELECT * FROM `user_carts` where `user_email` = '$user_email'";
$query_run = mysqli_query($conn, $query);
$fetch_rows = mysqli_num_rows($query_run);
if($fetch_rows > 0){
  while($rows = mysqli_fetch_assoc($query_run)){
    $food_id = $rows['food_id'];
    $food_name = $rows['food_name'];
    $food_ammount = $rows['food_price'];
    $food_delivery_charge =$rows['delivery_charge'];
    $food_no_of_plates = $rows['food_quantity'];
    $food_category = $rows['food_category'];
    $food_image = $rows['food_img'];
    $total = $rows['total'];
    $total_price = $total + $food_delivery_charge;

    echo '<div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3 ">
    <div id="purhcase_card">
        <img src="/food planet /admin/Food_image/'.$food_image.'" class="purchase_card_image" alt="...">
         <div class="card-body">
             <b><h6 class="card-text">'.$food_name.'</h6></b>
             <b><p class="card-text mt-3">Prize: '.$food_ammount.'$</p></b>
             <b><p class="card-text mt-3">Quantity: '.$food_no_of_plates.'/plate</p></b>
             <b><p class="card-text mt-3">Totaal Amount: '.$total_price.'$</p></b>
             <a href="view_purchase_food.php?food_id='.$food_id.'" class="btn btn-primary mt-2">View</a>
          </div>
      </div>
    </div>';

      
}
echo '</div>
</div>
<form method="post" action="">
<input type="radio" name="radio[]" value = "COD" class = "view_radio" required> <span class="radio-text">Cash on Delivery</span><br>
<input type="radio" name="radio[]" value = "PO" class = "view_radio" required><span class="radio-text"> Pay Online</span><br>';
$sql= "SELECT sum(total) FROM user_carts WHERE user_email='$user_email'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){

  $total_amt= $row['sum(total)'];
}
echo '<h3> Total Price:'.$total_amt.'</h3>';

echo '<button type="submit" id="carts_buy_btn" name="carts_buy_btn" class="text-center">BUY</button></form>
      ';

}
else{
  echo '
  <div class="container">
  <div class="jumbotron">
  <h1 class="display-5">No Item Added to Cart</h1>
  <hr class="my-4">
  <p>You dont need a silver fork to eat good food</p>
  <a class="btn btn-primary btn-lg" href="purchase.php" role="button">Order Food Now</a>
  
</div>
</div>';
}



?>

<?php
        if(isset($_GET['email'])){
          $rand_order_id = "ORDS".rand(1,1000000000);
          $get_email = $_GET['email'];
          $sql = "SELECT * FROM `user_carts` where `user_email` = '$user_email'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
        
          while($rows = mysqli_fetch_assoc($result)){
            $name = $rows['user_name'];
            $email = $rows['user_email'];
            $mobile = $rows['user_mobile'];
            $address = $rows['address'];
            $food_cart_name = $rows['food_name'];
            $food_ammount = $rows['food_price'];
            $food_d_charge = $rows['delivery_charge'];
            $food_quantity = $rows['food_quantity'];
            $food_id = $rows['food_id'];
            $food_image = $rows['food_img'];
            $txn_amt = $rows['total'];
        
        
            $query = "INSERT INTO `admin_orders` (`order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`, `food_id`, `food_image`)
             VALUES ('$rand_order_id', '$txn_amt', 'Null', 'pending', '', current_timestamp(), '$name', '$email', '$mobile', '$address', '$user_cust_id', '$food_cart_name', '$food_quantity', 'Cash On Delivery', 'pending', '$food_id', '$food_image')";
            $query_run = mysqli_query($conn, $query);
        
            if($query_run){
              $delete_sql = "DELETE FROM user_carts where user_email ='$user_email'";
              $delete_sql_run = mysqli_query($conn, $delete_sql);
        
              if($delete_sql_run){
                echo '<script>window.location = "your_cart.php"; </script>';
                $Order_success = TRUE;
                 
              }
            }
          
          }
        
        
        }
?>



<script>
  function confirm(){
    window.location = "your_cart.php?email='.$user_email.'"
  }
  function cancel(){
    window.location = "your_cart.php"
  }
  </script>

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
</body>

</html>