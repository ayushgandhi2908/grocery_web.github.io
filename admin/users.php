<?php
session_start();
if(!isset($_SESSION['admin_login_success'])){
    header("Location: login.php");
}
@include 'config.php';
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

$select = mysqli_query($conn, "SELECT * FROM login");

?>
<div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Cust_id</th>
         <th>Mobile</th>
         <th>Email</th>

      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['fname']." ". $row['lname']; ?></td>
         <td><?php echo $row['cust_id']; ?></td>
         <td><?php echo $row['mobile']; ?></td>
         <td><?php echo $row['email']; ?></td>
      </tr>
   <?php } ?>
   </table>
</div>

</div>



</body>
</html>