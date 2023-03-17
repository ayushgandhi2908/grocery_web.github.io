<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['admin_login_success'])){
    header("Location: login.php");
}
?>

<?php

if(isset($_POST['add_product'])){

    $disc_product_price = $_POST['disc_product_price'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;
    $cat = $_POST['category'];

    $disc_percentage = ($product_price - $disc_product_price)/$product_price * 100;
 
    if(empty($product_name) || empty($product_price) || empty($product_image)){
       $message[] = 'please fill out all';
    }else{
       $insert = "INSERT INTO `products` (`name`, `list_price`, `disc_price`, `disc_percentage`,`image`, `date`, `cat`)
        VALUES ('$product_name', '$product_price', '$disc_product_price', '$disc_percentage', '$product_image', current_timestamp(),'$cat');";
       $upload = mysqli_query($conn,$insert);
       if($upload){
          move_uploaded_file($product_image_tmp_name, $product_image_folder);
          $message[] = 'new product added successfully';
       }else{
          $message[] = 'could not add the product';
       }
    }
 
 };
 




 //Delect product
 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location: products.php');
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

<!-- <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="number" placeholder="enter product price" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box"> -->
   
<section class="contact" id="contact">

    <h1 class="heading"> <span>Add</span> Product </h1>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="inputBox">
        <input type="text" placeholder="Product name" name="product_name" class="box">
         <input type="number" placeholder="Real Product price" name="product_price" class="box">
        </div>

        <div class="inputBox">
        <input type="number" placeholder="Discounted product prize" name="disc_product_price" class="box">
        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box"> 
        </div>

        <div class="inputBox" style="width: 200px;border: 1px solid black;">
         <h1>Category</h1><select name="category" class="box" style="font-size: 20px; width: 200px;">
        
         
         <?php
         $sql ="SELECT * FROM admin_cat";
         $res = mysqli_query($conn, $sql);
         while($row= mysqli_fetch_assoc($res)){
            echo'<option value="'.$row['name'].'" style="font-size: 20px; width: 200px;"> '.$row['name'].'</option>';
         }
         ?>
        
        </select>
        
        </div>
        <input type="submit" value="Add Product" class="btn" name="add_product">

    </form>

</section>

<?php

$select = mysqli_query($conn, "SELECT * FROM products");

?>
<div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Price</th>
         <th>Discounted Price</th>
         <th>Image</th>
         <th>Option</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['list_price']; ?></td>
         <td><?php echo $row['disc_price']; ?></td>
         <td>
            <?php
             echo '<img src="uploaded_img/'.$row['image'].'" style="width:100px;">';
            ?>
           
         </td>
         <td width="200px">
            <a href="products.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
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