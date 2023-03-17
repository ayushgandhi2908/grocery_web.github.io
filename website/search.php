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
 
 if($_SERVER['REQUEST_METHOD']=="POST"){

  $search_box = $_POST['search_box'];

  echo '<script>
  window.location = "search.php?s='.$search_box.'"
  </script>';
 }
 
 ?>
    <div class="input_box" id="search_box">
    <form method="post">
  <input type="text" name="search_box" required>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</div>
<div class="container text-center">

<div class="row">
    <?php
    if($_GET['s']){
        $seach_text = $_GET['s'];
        

        $sql = "SELECT * FROM food_details where match (`name`, `category`) against ('$seach_text')";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);
 
        if($num > 0){
            echo '<h1 class="my-5 text-center"> '.$num.' Result Found for '.$seach_text.'</h1>' ;
            while($rows = mysqli_fetch_assoc($result)){
                $food_id = $rows['food_id'];
                $food_name = $rows['name'];
                $food_disc = $rows['discription'];
                $food_ammount = $rows['amount'];
                $food_id = $rows['food_id'];
                $food_delivery_charge =$rows['delivery_charge'];
                $food_category = $rows['category'];
                $food_image = $rows['image'];
                
                 echo '<div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3 ">
                 <div id="purhcase_card">
                     <img src="/food planet /admin/Food_image/'.$food_image.'" class="purchase_card_image" alt="...">
                      <div class="card-body">
                          <b><h5 class="card-text"> '.$food_name.'</h5></b>
                          <b><p class="card-text mt-3">Prize: '.$food_ammount.'/per plate</p></b>
                          <a href="view_purchase_food.php?food_id='.$food_id.'" class="btn btn-primary mt-5">View</a>
                       </div>
                   </div>
                 </div>';
        }

        }
        else{
            echo '
            <div class="container my-5"><div class="jumbotron" style="background-color:#E7E5E5; padding:20px">
            <h1 class="display-4 text-center">No Result Found for '.$seach_text.'</h1>
            <p class="lead"></p>
            <hr class="my-4">
            <p>There are more categories food  in our resataurant with fastest delivery  </p>
            <a class="btn btn-primary btn-lg" href="purchase.php" role="button">Explore More Foods</a>
          </div></div>';
        }
        
    }
    
    ?>

  </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

