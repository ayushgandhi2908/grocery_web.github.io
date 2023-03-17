<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];

}else{
  echo '<script>window.location="index.php"</script>';
}

?>
<?php
 require "partials/_dbconnect.php";?>
<?php
if(isset($_GET['id'])){
    $food_id  = $_GET['id'];
    $sql = "SELECT * FROM `food_details` where `food_id` ='$food_id'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['food_id'] = $food_id;
    while($rows = mysqli_fetch_assoc($result)){
        $food_name = $rows['name'];
        $food_disc = $rows['discription'];
        $food_ammount = $rows['amount'];
        $food_id = $rows['food_id'];
        $food_delivery_charge =$rows['delivery_charge'];
        $food_category = $rows['category'];
        $food_image = $rows['image'];
        $total_ammount = $food_ammount + $food_delivery_charge;
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Cash On Delivery</title>
    <link rel="stylesheet" href="website.css">
    <style>
      <?php require "website.css"; ?>
    </style>
  </head>
  <body>

  <?php require "partials/_navbar.php";?>



<?php

$rand_order_id = "ORDS".rand(1,1000000000).''.$food_id;
$customer_id = substr($_SESSION['customer_id'],1,10000000);
// echo substr($rand_order_id, -1);
  echo '<div class="container mt-5">
  <div class="card mb-4">
     <div class="containt_flex" >
     <img class="card-img-top cash_img" src="/food planet/admin/Food_Image/'.$food_image.'" alt="Image" width="400px" height="200px">
     <div class="card-body">
       <h5 class="card-title">'.$food_name.'</h5>
       <p class="card-text2"><b>Category:</b> '.$food_category.'</p>
       <p class="card-text3"><b>Price:</b> '.$food_ammount.'rs</p>
       <p class="card-text4"><b>Delivery Charge:</b> '.$food_delivery_charge.'rs</p>
       <p class="card-text4"><b>Total Charge: </b> '.$total_ammount.'rs</p>


      <form method="post">
      
        <div id="COD_info">
        Your Information:
        <input class="mb-2" type="hidden" name="INDUSTRY_TYPE_ID" id="INDUSTRY_TYPE_ID" value= "Retail"  readonly><br>
        <span>Customer ID:- </span><input class="mb-2" type="text" name="customer_id" id="customer_id" value="'.$customer_id.'"  readonly><br>
        <span>Email ID:- </span><input class="mb-2" type="text" name="EMAIL" id="EMAIL" value="'.$_SESSION['user_email'].'" readonly><br>
        <span>Mobile ID:- </span><input class="mb-2" type="text" name="MSISDN" id="MSISDN" value="'.$_SESSION['user_mobile'].'" readonly><br>
       <input type="hidden" name="order_id" id="order_id" value="'.$rand_order_id.'">
       <input class="mb-2" type="hidden" name="total_ammount" id="total_ammount" value="'.$total_ammount.'RS" readonly><br>
       <input class="mb-2" type="hidden" name="food_id" id="food_id" value="'.$food_id.'" readonly><br>
       <input class="mb-2" type="hidden" name="CHANNEL_ID" id="CHANNEL_ID" value="WEB" readonly><br>
       <button type="submit" class="btn btn-primary" width="300px" name="procced">PROCEED</a></button>
        </div>
       </form>';

       ?>
       <!-- /food planet/website/purchase.php -->
     </div>
     </div>
   </div>
   </div>
  </div>

  <?php

if(isset($_POST['procced'])){
  $q = $_GET['q'];
    $u_name= $_SESSION['user_name'];
    $u_email = $_SESSION['user_email'];
    $u_mobile =$_SESSION['user_mobile'];
    $u_address =$_SESSION['user_address'];
    $u_user_id = $_SESSION['user_id_number'];

    $query = "INSERT INTO `admin_orders` (`order_id`, `txn_amt`, `bank_name`, `Status`, `gateway`, `txn_date`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cust_id`, `food_name`, `food_no_of_plates`, `payment_type`, `order_status`,`food_id`,`food_image`) 
    VALUES ('$rand_order_id', '$total_ammount', 'Null', 'Pending', '', 'current_timestamp()', '$u_name', '$u_email', '$u_mobile', '$u_address', '$customer_id', '$food_name', '$q', 'Cash on Delivery','pending','$food_id', '$food_image')";
	$query_run = mysqli_query($conn, $query);

    if($query_run){
        echo  '<script>
       window.location = "/food planet/website/purchase.php";
       </script>';
    }

  
}

  ?>

  
  <!-- <button type="button" class="mb-3 btn btn-outline-primary cart">ADD TO CART</button><br> -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>