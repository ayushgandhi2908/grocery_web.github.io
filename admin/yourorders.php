<?php include "partials/_dbconnect.php";?>
<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>
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
            <h4>YOUR ORDERS</h4>
            <button class="btn btn-success" id="draft_btn"><a href="Drafts.php" style="color:white">Drafts</a></button>
        </div>
    </div>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col"> Sno</th>
                <th scope="col"> Name</th>
                <th scope="col"> Mobile</th>
                <th scope="col">Food Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Payment</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Order Status</th>
                <th scope="col">Action</th>
                <th scope="col">Dlivery Boy</th>
            </tr>
        </thead>

        <tbody>

            <?php
    $sql = "SELECT * FROM `admin_orders` where order_status = 'pending' ORDER BY `sno` DESC ";
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
    $dboy = $rows['dboy'];
    

      $sno = $sno+1;

      echo '<tr>
      <th scope="row" width="50px">'.$sno.'</th>
      <td>'.$user_name.'</td>
      <td>'.$user_mobile.'</td>
      <td width="100px">'.$food_name.'</td>
      <td width="80px">'.$food_no_of_plates.'</td>
      <td width="100px">'.$payment_type.'</td>
      <td width="100px">'.$Status.'</td>
      <td width="100px">'.$order_status.'</td>
      <td width="230px">

      <button style="width:80px; padding:10px; font-size:13px" type="submit" class="complete_btn btn btn-outline-success my-2" id="'.$sno_id.'">Complete</button>
      <button style="width:80px; padding:10px; font-size:13px" type="submit" class="dlt_food_info btn btn-primary"><a href="view_bill.php?bill_no='.$sno_id.'" style="color:white">View Bill</a></button></td>
      <td width="100px">';
      if($dboy ==""){
        echo '<button style="width:80px; padding:10px; font-size:13px" type="submit" class="assign_bdoy btn btn-outline-success my-2" id="'.$sno_id.'">Assign DBoy</button>';
      }
      else{
        echo $dboy;
      }
      
      echo '</td>
      </tr>';
      
    }

  ?>
<?php 
  
  if(isset($_GET['complete'])){

    $complete_id = $_GET['complete'];

    $sql = "UPDATE `admin_orders` SET `Status` = 'TxnSuccess', `order_status` = 'Completed' WHERE `admin_orders`.`sno` = '$complete_id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '<script>window.location = "/food planet/admin/yourorders.php"</script>';
    }


  }
  
  ?> 

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Delivery Boy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      

      <form method="post" action="/food planet/admin/yourorders.php">

      <input type="hidden" name="snoEdit" id="snoEdit">
      <select class="mx-5" style="width:80%; text-align:center;" name="dboy" id="dboy">
        <?php
        
        $sql = "SELECT * FROM delivery_boy";
        $result = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_assoc($result)){
                echo '
                <option value="'.$rows['d_name'].'">'.$rows['d_name'].'</option><br>
                ';
        }
        
        ?>
        </select>
        <button type="submit" class="btn btn-success my-4" name="assign_dboy_submit" required>Assign Boy</button>

    </form>

      </div>
    </div>
  </div>
</div>
<?php 

if(isset($_POST['snoEdit'])){
    $dname=  $_POST['dboy'];
    echo $dname;
    $update = $_POST['snoEdit'];
    $sql = "UPDATE admin_orders SET dboy='$dname' where sno = '$update'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<script>window.location = "/food planet/admin/yourorders.php"</script>';
    }
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
            deletes = document.getElementsByClassName('complete_btn');

            Array.from(deletes).forEach((element) => {

                element.addEventListener('click', (e) => {
                    sno = e.target.id;
                    console.log(sno);

                    if (confirm("Are you sure! the Order is completed")) {
                        window.location = `/food planet/admin/yourorders.php?complete=${sno}`;
                        console.log("yes");
                    } else {
                        console.log("no");
                    }
                });

            });
        


            dboy = document.getElementsByClassName('assign_bdoy');
            Array.from(dboy).forEach((element) => {
                element.addEventListener('click', (e) => {
                    $('#modalEdit').modal('toggle');
                    snoEdit.value = e.target.id

                });

            });
            </script>



            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
</body>

</html>