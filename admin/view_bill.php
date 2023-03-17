<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>

<?php include "partials/_dbconnect.php"; ?>
<?php 

if($_GET['bill_no']){
    $bill_no = $_GET['bill_no'];

    $sql = "SELECT * FROM `admin_orders` where `sno` = '$bill_no'";
    $result = mysqli_query($conn, $sql);

    while($rows = mysqli_fetch_assoc($result)){
    $sno_id = $rows['sno'];
    $orderid = $rows['order_id'];
    $txn_amt = $rows['txn_amt'];
    $bank_name = $rows['bank_name'];
    $Status = $rows['Status'];
    $gateway = $rows['gateway'];
    $txn_date = $rows['txn_date'];
    $user_name = $rows['user_name'];
    $user_email = $rows['user_email'];
    $user_mobile = $rows['user_mobile'];
    $user_address = $rows['user_address'];
    $user_cust_id = $rows['user_cust_id'];
    $food_name = $rows['food_name'];
    $food_no_of_plates = $rows['food_no_of_plates'];
    $payment_type = $rows['payment_type'];
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Bill</title>
    <style>
    <?php include "admin.css";
    ?>
    </style>
</head>
<body>

<div class="container">

<div id= "view_bill">
<div class="view_bill_flex">
<img src = "/food planet/admin/bg_img/nav_img.png" width="100px" height="100px"><span style="font-size:30px; margin-top:30px">Food Planet </span>
<b class="invoice_txt">INVOICE</b>
<span class="bill_order_id"><b>Order ID:</b> <?php echo $orderid;?></span>
<span class="bill_cust_id"><b>Customer ID:</b> <?php echo $user_cust_id;?></span>
</div>

<div class="bill_details">
<div class="bill_d1">
<div class="bill_user_name bill_text"><b> Name: </b><?php echo $user_name;?></div>
<div class="bill_user_name bill_text"><b> Address: </b><?php echo $user_address;?></div>
<div class="bill_user_name bill_text"><b> Mobile: </b><?php echo $user_mobile;?></div>
<div class="bill_user_name bill_text"><b> Email: </b><?php echo $user_email;?></div>
</div>
<div class="bill_d2">
<div class="bill_user_name bill_text"><b>Bank Name: </b><?php echo $bank_name;?>
<div class="bill_user_name bill_text"><b> Gateway:</b> <?php echo $gateway;?></div>
<div class="bill_user_name bill_text"><b>Payment Type </b><?php echo $payment_type;?></div>
<div class="bill_user_name bill_text"><b>Payment Status: </b><?php echo $Status;?></div>
<div class="bill_user_name bill_text"><b>Order date: </b><?php echo $txn_date;?></div>
</div>

</div>
<div class="food_bill">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">Food</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
<?php
$sno = 0;
    $sno = $sno+1;
    echo ' 
    <tbody>
    <tr>
      <th scope="row" width="80px">'.$sno.'</th>
      <td width="450px">'.$food_name.'</td>
      <td width="100px">'.$food_no_of_plates.'</td>
      <td width="250px">'.$txn_amt.'rs</td>
    </tr>
    <tr>
    <th width="400px">TOTAL :- '.$txn_amt.'rs</th>
    </tr>
  </tbody>';

?>

</table>
</div>
</div>
</div>
<button class="btn btn-outline-success my-5 mx-5" type="submit" onclick="window.print()">Print</button>
</body>
</html>