<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>

<?php include "partials/_dbconnect.php";?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Category</title>

    <style>
    <?php include "admin.css";
    ?>
    </style>

</head>

<body>

    <div id="main_contain">

        <?php include "partials/_navbar.php"?>
        <div class="side_navbar">
            <h4>Drafts : Shows Order Completed</h4>
        </div>
    </div>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col"> Sno</th>
                <th scope="col"> Name</th>
                <th scope="col"> Mobile</th>
                <th scope="col"> Address</th>
                <th scope="col">Food Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Payment</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Order Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
    $sql = "SELECT * FROM `admin_orders` where order_status = 'Completed'  AND `Status` = 'TxnSuccess' ORDER BY `sno` DESC ";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
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
    $order_status = $rows['order_status'];
    

      $sno = $sno+1;

      echo '<tr>
      <th scope="row" width="50px">'.$sno.'</th>
      <td>'.$user_name.'</td>
      <td>'.$user_mobile.'</td>
      <td width="200px">'.$user_address.'</td>
      <td width="100px">'.$food_name.'</td>
      <td width="80px">'.$food_no_of_plates.'</td>
      <td width="100px">'.$payment_type.'</td>
      <td width="100px">'.$Status.'</td>
      <td width="100px">'.$order_status.'</td>

      <td width="150px"> 
      <button type="submit" class="btn btn-outline-success my-2" disabled="disabled">Completed</button>
      <button type="submit" class="dlt_food_info btn btn-outline-success"><a href="view_bill.php?bill_no='.$sno_id.'">View Bill</a></button></td>
      </tr>';
      
    }

  ?>


            <script src="https://code.jquery.com/jquery-2.2.4.js"
                integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            </script>

            <script>
        
            // </script>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
</body>

</html>