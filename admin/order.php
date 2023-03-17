<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['admin_login_success'])){
    header("Location: login.php");
}



if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM orders WHERE id = $id");
};

if(isset($_GET['com'])){
   $id = $_GET['com'];
   mysqli_query($conn, "UPDATE orders SET status = 'complete' WHERE id = $id");
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DashBoard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">
   


</head>
<body>

<?php
     @include 'partials/header.php';
 ?>


<?php

$select = mysqli_query($conn, "SELECT * FROM orders where status='pending'");

?>
<div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>Order id</th>
         <th>Product</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Customer & Mobile</th>
         <th>Address</th>
         <th>Option</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['order_id']; ?></td>
         <td><?php echo $row['prod_name']; ?></td>
         <td><?php echo $row['price']; ?></td>
         <td><?php echo $row['quantity']; ?></td>
         <td><?php echo $row['cust_name']."-".$row['cust_mobile']; ?></td>
         <td><?php echo $row['cust_address']; ?></td>
         <td width="200px">
            <a href="order.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            <a href="order.php?com=<?php echo $row['id']; ?>" class="btn "> Complete </a>
         </td>
      </tr>
   <?php } ?>
   </table>
</div>

</div>



<?php
include 'partials/footer.php';
?>



</body>
</html>