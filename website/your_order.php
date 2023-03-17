<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];

}

?>
<?php include "partials/_dbconnect.php";?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Your Orders</title>
    <link rel="stylesheet" href="website.css">
    <style>
    <?php require "website.css";
    ?>
    </style>
</head>

<body>
    <?php require "partials/_navbar.php";?>

    <?php 
  if(isset($_SESSION['login'])){

  $email = $_SESSION['user_email'];
  $sql = "SELECT * FROM admin_orders where user_email = '$email' ORDER BY sno DESC";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);

  echo '<div class="container text-center">

  <div class="row">';

  if($num_rows > 0){

    while($rows = mysqli_fetch_assoc($result)){
      $user_name = $rows['user_name'];
      $user_email = $rows['user_email'];
      $food_image = $rows['food_image'];
      $food_name = $rows['food_name'];
      $food_no_of_plates = $rows['food_no_of_plates'];
      $payment_type = $rows['payment_type'];
      $order_id = $rows['order_id'];
      $txn_status = $rows['Status'];
      $txn_amt = $rows['txn_amt'];
      $user_cust_id = $rows['user_cust_id'];
      $gateway = $rows['gateway'];
      $user_cust_id = $rows['user_cust_id'];
      $bank_name = $rows['bank_name'];
      $order_status = $rows['order_status'];
      $txn_date = $rows['txn_date'];
      $cancel_id = $rows['sno'];
      $view_id = $rows['sno'];

      echo '<div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3 ">
      <div id="purhcase_card">
          <img src="/food planet /admin/Food_image/'.$food_image.'" class="purchase_card_image" alt="...">
           <div class="card-body">
               <b><h5 class="card-text"> '.$food_name.'</h5></b>
               <b><p class="card-text mt-3">Order Status: '.$order_status.'</p></b>
               <b><p class="card-text mt-3">Transaction : '.$txn_status.'</p></b>
               <b><p class="card-text mt-3">Type : '.$payment_type.'</p></b>
               <a href="view_your_order.php?vi='.$view_id.'" class="btn btn-primary mt-3">More Details</a>
            </div>
        </div>
      </div>';
    

      // echo '
      // <div id="your_order_box">
      // <img class="your_order_img" src= "/food planet/admin/Food_Image/'.$food_image.'">
      // <div class="order_dply_block">
      // <h6><b>Payment Type:</b> '.$payment_type.'</h6>
      // <h6><b>Order On:</b> '.$txn_date.'</h6>
      // <h6><b>Order ID:</b> '.$order_id.'</h6>
      // <h6><b>Food Name:</b> '.$food_name.'</h6>
      // <h6><b>Quantity:</b> '.$food_no_of_plates.'</h6>
      // <div class="order_btn_block">
      // <button class="btn btn-primary" disabled>Status: '.$order_status.'</button>
      // <button class="btn btn-primary" disabled>TXN Status: '.$txn_status.'</button>
      // <a href="view_your_order.php?vi='.$view_id.'"><button class="btn btn-primary">View</button></a>';
      // if($order_status =="pending"){
      //   echo '<a href="your_order.php?cancel_id='.$cancel_id.'"><button class="mx-1 btn btn-primary">Cancel Order</button></a>';
      // }
      
      // echo '
      // </div>
      // </div>
      // </div>
      // ';

    }

    echo '</div>
    </div>';
        

  }
  else{
    echo '<div class="alert alert-secondary d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <div>
     You Havent Purchase any food yet
    </div>
  </div>';
  }

    
  }
  else{
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <div>
      You are not logged into our website please login to continue.
    </div>
  </div>';
  }
  ?>

  <?php
  if(isset($_GET['cancel_id'])){
    $c_id = $_GET['cancel_id'];
    $sql = "DELETE FROM admin_orders where `sno` = '$c_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo '<script>window.location="/food planet/website/your_order.php"</script>';
    }
  }
  
  ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

