<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];
  $user_name = $_SESSION['user_name'];

}

?>
<?php
 require "partials/_dbconnect.php";?>
<?php

if(isset($_GET['food_id'])){
    $food_id  = $_GET['food_id'];
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

    if(isset($_POST['buy_cart'])){
      $quantity = $_POST['quantity'];

      $radioval = $_POST['radio'];
      
      foreach($radioval as $item){
        if($item == "COD"){
        
          header("Location: cashondelivery.php?id=$food_id&q=$quantity");
        }
        elseif($item == "PO"){
          header("Location: payonline.php?id=$food_id&q=$quantity");
        }
      }
    }
}


?>

<?php

if(isset($_POST['add_cart'])){
  echo $_POST['quantity'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <title>Order</title>
    <link rel="stylesheet" href="website.css">

    <style>
          <?php require "footer.css"; ?>
      <?php require "website.css"; ?>
    </style>
  </head>
  <body>

  <?php require "partials/_navbar.php";?>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

  <?php
  if(!isset($_SESSION['login'])){
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
     <span style ="font-size:25px"> Cannot Order Food Login First <a href= "login.php" style="color:blue; font-size:20px">Click here to login</a></span>
    </div>
  </div>';
  }
  ?>

<div id="view_purchase_page">

<?php
$rand_order_id = rand(1,1000000000).''.$food_id;
// echo substr($rand_order_id, -1);
  echo '<div class="container mt-5">
  <div class="card mb-4">
     <div class="containt_flex">
     <img class="card-img-top view_img" src="/food planet/admin/Food_Image/'.$food_image.'" alt="Image">
     <div class="card-body">
       <h5 class="card-title">'.$food_name.'</h5>
       <p class="card-text2"><b>Category:</b> '.$food_category.'</p>
       <p class="card-text3"><b>Price:</b> '.$food_ammount.'rs</p>
       <p class="card-text4"><b>Delivery Charge:</b> '.$food_delivery_charge.'rs</p>
       <p class="card-text5"><b>Total Price:</b> '.$total_ammount.'rs</p>';

      if(isset($_SESSION['login'])){
        echo '<form method="post">
        <input type="radio" name="radio[]" value = "COD" class = "view_radio" required> <span class="radio-text">Cash on Delivery</span><br>
        <input type="radio" name="radio[]" value = "PO" class = "view_radio" required><span class="radio-text"> Pay Online</span><br>
         
         ';
      }


       echo '<input type="hidden" id="'.$food_id.'" value="'.$food_id.'" name="snoEdit" id="snoEdit">
       <p class="card-text1 mt-5" style="font-size:15px"><b>Discription:</b><br>'.$food_disc.'...</p>
       ';

      if(isset($_SESSION['login'])){
        $user_email_id = $_SESSION['user_email'];
        $carts_query = "SELECT * FROM `user_carts` where `user_email` = '$user_email_id' AND `food_id` = $food_id";
       $query_run = mysqli_query($conn, $carts_query);
       $fetch_rows= mysqli_num_rows($query_run);
       if($fetch_rows == 0){
        echo '<input type="number" id="quantity" value="1" name="quantity"><button type="submit" id="'.$food_id.'"  name="add_cart" class="my-3 A_cart btn-outline-primary buy">ADD TO CART</button>';
       }
      elseif($fetch_rows > 0){
          echo '<button type="button"  id="'.$food_id.'" name="remove_cart" class="my-3 R_cart btn-outline-primary buy">REMOVE FROM CART</a></button>';
        }
       
      }

      echo  '<button type="submit" name="buy_cart" class="btn btn-primary buy">BUY</a></button>

       </form>';


       ?>

       <form action='' method="post">

      <textarea name="comment" placeholder="Comment" rows="5" cols="60" id="comments_box" required></textarea><br>
      <input type="submit" id="comment_btn" class="btn btn-success" name="comment_btn" value="Post Comment">
      </form>

        <?php
        
        if(isset($_POST['comment_btn'])){
          
          $text_comment =  $_POST['comment'];

          $sql = "INSERT INTO `food_comment` (`food_id`, `user_name`, `user_email`, `comment`, `date`)
           VALUES ('$food_id', '$user_name', '$user_email_id', '$text_comment', current_timestamp())";
           $result = mysqli_query($conn, $sql);

        }

        $sql2 = "SELECT * FROM food_comment where food_id = '$food_id' ORDER BY `date` DESC";
        $result2 = mysqli_query($conn, $sql2);
        $com_rows = mysqli_num_rows($result2);

        if($com_rows > 0){
        
        while($rows = mysqli_fetch_assoc($result2)){
          $comment_id = $rows['comment_id'];
          $comment = $rows['comment'];
          $c_user_email = $rows['user_email'];
          $c_user_name = $rows['user_name'];
          $date = $rows['date'];


            echo '<div class="comment_by"><b>'.$c_user_name.'</b><span class= "comment_date">'.substr($date, 0, 10).'</div>
            <div class="comment_text"> - '.$comment.'</div>';
          }
        }
          elseif($com_rows == 0){
            echo '<div class="jumbotron my-5">
            <h1 class="display-4">No Comment Found</h1>
            <p>Be the first one to comment</p>
          </div>';
          }

        
        ?>
          
     </div>
     </div>
   </div>
   </div>
  </div>
  
  

  <script>
    carts = document.getElementsByClassName('A_cart');
    Array.from(carts).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        id = e.target.id
        quantity = document.getElementById('quantity').value
        console.log(document.getElementById('quantity').value)
        window.location = `/food planet/website/your_cart.php?add_cart_id=${id}&quan=${quantity}`;
      });
    
    });

    r_carts = document.getElementsByClassName('R_cart');
    Array.from(r_carts).forEach((element)=>{
      element.addEventListener("click", (e)=>{

        id = e.target.id
        console.log(id)
        window.location = `/food planet/website/your_cart.php?dlt_cart_id=${id}`;
      });
    
    });
    </script>
      
<?php include "partials/_footer.php"; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>