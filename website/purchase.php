<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];

}

?>
<?php include "partials/_dbconnect.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Purchase</title>
    <link rel="stylesheet" href="website.css">
    <style>
      <?php require "website.css"; ?>
      <?php require "footer.css"; ?>
    </style>
  </head>
  <body>

  <?php include "partials/_navbar.php";?>

  <?php
 
 if(isset($_POST['search'])){

  $search_box = $_POST['search_box'];

  echo '<script>
  window.location = "search.php?s='.$search_box.'"
  </script>';
 }
 
 ?>

 
<div class="container">
<div class="input_box" id="search_box">
    <form method="post">
  <input type="text" name="search_box" placeholder="Search Food " required>
  <button type="submit" class="btn btn-primary" name="search">Search</button>
</form>
</div>
</div>


<div class="container text-center">

<div class="row">
<?php



$sql = "SELECT * FROM `food_details` ORDER BY `food_id` DESC";
$result = mysqli_query($conn, $sql);
while($rows = mysqli_fetch_assoc($result)){

    $food_id = $rows['food_id'];
    $food_name = $rows['name'];
    $food_ammount = $rows['amount'];
    $food_id = $rows['food_id'];
    $food_delivery_charge = $rows['delivery_charge'];
    $food_category = $rows['category'];
    $food_image = $rows['image'];

    if(isset($_SESSION['login'])){
      $sql1 = "SELECT * FROM user_carts where food_id='$food_id' AND user_email='$user_email'";
    $result1 = mysqli_query($conn, $sql1);
    
    }

    

    echo '

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3 ">
            <div id="purhcase_card">
                <img src="/food planet /admin/Food_image/'.$food_image.'" class="purchase_card_image" alt="...">
                 <div class="card-body">
                     <b><p class="card-text"> '.$food_name.'</p></b>
                     <b><p class="card-text">Prize: '.$food_ammount.'/per plate</p></b>';

                     if(isset($_SESSION['login'])){

                      if(mysqli_num_rows($result1) == 0){
                        echo '<form action="purchase.php" method="post">
                        <input type="number" value="1" name="cart_value">/Plate
                        <input type="hidden" value="'.$food_id.'" name="food_id">
                        <button type="submit" class="btn btn-primary mx-1 my-1" name="cart_add">Add to Cart</button>
                        </form>';
                      }else{
                        echo '<form action="purchase.php" method="post">
                        <input type="hidden" value="'.$food_id.'" name="food_id">
                        <button type="submit" class="btn btn-primary mx-1 my-1" name="cart_delete">Remove from Cart</button>
                        </form>';
                      }
                        
                      echo '<a href="view_purchase_food.php?food_id='.$food_id.'" class="btn">View</a>';
                     }
                     else{
                      echo '
                      <input type="number" value="1" name="cart_value">/Plate
                      <button type="submit" class="btn btn-primary mx-1 my-1" onclick="showbox()">Add to Cart</button>
                      <a href="#" class="btn" onclick="showbox()">View</a>';
                     }

                     echo '
                 </div>
            </div>
        </div>  
              
';
      }


?>
    </div>
</div>

<?php
 if(isset($_POST['cart_add'])){
    $food_id = $_POST['food_id'];
    $quantity = $_POST['cart_value'];
    $user_email = $_SESSION['user_email'];

    $food_table= mysqli_query($conn, "SELECT * FROM food_details where food_id='$food_id'");
    $food_row = mysqli_fetch_assoc($food_table);

    $food = $food_row['name'];
    $food_id = $food_row['food_id'];
    $image = $food_row['image'];
    $delivery = $food_row['delivery_charge'];
    $amount = $food_row['amount'];
    $category = $food_row['category'];
    $total = $quantity * $amount;

    $user_table = mysqli_query($conn, "SELECT * FROM users where email ='$user_email'");
    $user_row = mysqli_fetch_assoc($user_table);

    $u_name = $user_row['name'];
    $address = $user_row['address'];
    $mobile = $user_row['mobile'];
    $email = $user_row['email'];


    $sql = "INSERT INTO `user_carts` (`user_name`, `user_email`, `user_mobile`, `food_name`, `food_quantity`, `delivery_charge`, `food_price`, `food_category`, `food_img`, `date`, `food_id`, `address`, `total`) 
    VALUES ('$u_name', '$email', '$mobile', '$food', '$quantity', '$delivery', '$amount', '$category', '$image', current_timestamp(), '$food_id', '$address', '$total')";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo '<script>window.location="purchase.php"</script>';
    }


 }


 if(isset($_POST['cart_delete'])){
  $food_id = $_POST['food_id'];
  $sql = "DELETE FROM user_carts where food_id ='$food_id' AND user_email='$user_email'";
  $result = mysqli_query($conn, $sql);

  if($result){
    echo '<script>window.location="purchase.php"</script>';
  }

 }

?>


<div id="login_box">
  You need to login first<br>
  <a href="purchase.php" class="btn btn-danger">OK</a>

  </div>
  
  <?php include "partials/_footer.php"; ?>

  <script>
    function showbox(){
      window.loation='purchase.php'
      document.getElementById('login_box').style.display = 'block';
    }
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>