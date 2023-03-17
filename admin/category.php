<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['admin_login_success'])){
    header("Location: login.php");
}


if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
    $insert = "INSERT INTO `admin_cat` (`name`, `date`) VALUES ('$product_name', current_timestamp())";
    $upload = mysqli_query($conn,$insert);


};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM admin_cat WHERE id = $id");
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
   
   <div class="container">

<div class="admin-product-form-container">

   <form action="" method="post">
      <h3>add a new category</h3>
      <input type="text" placeholder="enter product name" name="product_name" class="box">
      <input type="submit" class="btn" name="add_product" value="add product">
   </form>

</div>

<?php

$select = mysqli_query($conn, "SELECT * FROM admin_cat");

?>
<div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Option</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td width="200px">
            <a href="category.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
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