<?php
  session_start();
  if(isset($_SESSION['login'])){
    $user_email= $_SESSION['user_email'];
  
  }else{
    echo '<script>window.location="index.php"</script>';
  }
  

?>
<?php
 require "partials/_dbconnect.php";?>
<!-- <?php
if(isset($_GET['id'])){
  

}
?> -->

<?php

$sql = "SELECT * from users where email = '$user_email'";
$result = mysqli_query($conn, $sql);
while($rows = mysqli_fetch_assoc($result)){
  $user_id = $rows['user_id'];
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


$customer_id = substr($_SESSION['customer_id'],1,10000000);
// echo substr($rand_order_id, -1);
if(isset($_GET['id'])){

  $food_id  = $_GET['id'];
  $quantity = $_GET['q'];
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
  $rand_order_id = "ORDS".rand(1,1000000000)."F".$food_id."U".$user_id."Q".$quantity;
  echo '<div class="container mt-5">
  <h2 class="text-center">ONLINE PAYMENT</h2>
  <div class="card mb-4">

     <div class="containt_flex" >
     <img class="card-img-top cash_img" src="/food planet/admin/Food_Image/'.$food_image.'" alt="Image" width="400px" height="200px">
     <div class="card-body">
       <h5 class="card-title">'.$food_name.'</h5>
       <p class="card-text2"><b>Category:</b> '.$food_category.'</p>
       <p class="card-text3"><b>Price:</b> '.$food_ammount.'rs</p>
       <p class="card-text4"><b>Delivery Charge:</b> '.$food_delivery_charge.'rs</p>
       <p class="card-text4"><b>Total Charge: </b> '.$total_ammount.'rs</p>
       <form method="post" action="pgRedirect.php">
      <div id="COD_info">
      YOUR INFO: <br>
        <input type="hidden" name="INDUSTRY_TYPE_ID" id="INDUSTRY_TYPE_ID" value= "Retail">
        Cust ID:- #<input type="text" name="customer_id" id="customer_id" value="'.substr($_SESSION['customer_id'],1,10000000).'"><br>
        Email:- <input type="text" name="EMAIL" id="EMAIL" value="'.$_SESSION['user_email'].'"><br>
        Mobile:- <input type="text" name="MSISDN" id="MSISDN" value="'.$_SESSION['user_mobile'].'"><br>
       <input type="hidden" name="order_id" id="order_id" value="'.$rand_order_id.'">
       <input type="hidden" name="total_ammount" id="total_ammount" value="'.$total_ammount.'">
       <input type="hidden" name="food_id" id="food_id" value="'.$food_id.'">
       <input type="hidden" name="CHANNEL_ID" id="CHANNEL_ID" value="WEB">
       <button type="submit" class="btn btn-primary po_buy">PROCEED</a></button>
    </div>
       </form>';
}else{
    echo '<div class="container text-center">

    <div class="row">';
    
    $sql= "SELECT sum(total) FROM user_carts WHERE user_email='$user_email'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){

  $total_amt= $row['sum(total)'];
}

$rand_order_id = "ORDS".rand(1,1000000000)."USER".$user_email;


    $sql = "SELECT * FROM user_carts where user_email='$user_email'";
    $result = mysqli_query($conn, $sql);
    while($rows = mysqli_fetch_assoc($result)){

      echo'
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3 ">
      <div id="purhcase_card">
          <img src="/food planet /admin/Food_image/'.$rows['food_img'].'" class="purchase_card_image" alt="...">
           <div class="card-body">
               <b><h5 class="card-text">'.$rows['food_name'].'</h5></b>
               <b><p class="card-text mt-3">Prize: '.$rows['total'].'/Plate</p></b>
               <b><p class="card-text mt-3">Total Prize: '.$rows['total'].'$</p></b>
            </div>
        </div>
      </div>';
    }
    

    
    echo '</div></div>
    
    <form method="post" action="pgRedirect1.php">
      <div id="COD_info">
      YOUR INFO: <br>
        <input type="hidden" name="INDUSTRY_TYPE_ID" id="INDUSTRY_TYPE_ID" value= "Retail">
        Cust ID:- #<input type="text" name="customer_id" id="customer_id" value="'.substr($_SESSION['customer_id'],1,10000000).'"><br>
        Email:- <input type="text" name="EMAIL" id="EMAIL" value="'.$_SESSION['user_email'].'"><br>
        Mobile:- <input type="text" name="MSISDN" id="MSISDN" value="'.$_SESSION['user_mobile'].'"><br>
       <input type="hidden" name="order_id" id="order_id" value="'.$rand_order_id.'">
       <input type="hidden" name="total_ammount" id="total_ammount" value="'.$total_amt.'">
       <input type="hidden" name="food_id" id="food_id" value="">
       <input type="hidden" name="CHANNEL_ID" id="CHANNEL_ID" value="WEB">
       <button type="submit" class="btn btn-primary po_buy">PROCEED</a></button>
    </div>
       </form>
    ';
}
 


       ?>
     </div>
     </div>
   </div>
   </div>
  </div>


  
  <!-- <button type="button" class="mb-3 btn btn-outline-primary cart">ADD TO CART</button><br> -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>