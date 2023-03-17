<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>

<?php include "partials/_dbconnect.php";?>
<?php
// error_reporting(E_ERROR | E_PARSE);

if($_SERVER['REQUEST_METHOD']=="POST"){

  $food_name = $_POST['food_name'];
  $food_disc = $_POST['food_disc'];
  $food_ammount = $_POST['food_ammount'];
  $food_delivery_charge = $_POST['food_delivery_charge'];
  $food_category = $_POST['food_category'];

  $food_image = $_FILES['food_image']['name'];
  $temp_img = $_FILES['food_image']['tmp_name'];
  // $img_error = $_FILES['food_image']['error'];
  $img_type = $_FILES['food_image']['type'];
  $img_size = $_FILES['food_image']['size'];
  $file_ext= explode('.',$_FILES['food_image']['name']);
  $extensions=array("jpeg","jpg","png");



  // if($img_error == 0){
  
    if($img_size <= 500000){

      if(in_array($file_ext[1],$extensions)){

        $sql = "INSERT INTO `food_details` (`name`, `discription`, `amount`, `delivery_charge`, `image`, `category`, `date`) 
        VALUES ('$food_name', '$food_disc', '$food_ammount', '$food_delivery_charge', '$food_image', '$food_category', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if($result){
          move_uploaded_file($temp_img, "Food_Image/$food_image");
          $food_insert = TRUE;
        }
      
      }
      //FIle Erore 
      else{
        $img_file_error = TRUE;
      }

      }
      // Img Error End
      else{
        $img_size_error = TRUE;
      }
      //Post Method End
    }
    else{
      echo "";
    }


//     }
//     else{
//       $img_error = FALSE;
//     }
// }

?>

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
      <h4>Add Food to Website </h4>
    </div>
  </div>

  

  <div id="food_insert">
  <?php
          if(isset($food_insert)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!! </strong> Your Food has been successfully added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
  ?>
    <?php
        if(isset($img_file_error)){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!! </strong> Only PNG, JPEG and JPG file format supported
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        elseif(isset($img_error)){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!! </strong>Something Went Wrong Try again
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        elseif(isset($img_size_error)){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!! </strong> Image Size should be less than 500kb.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
        
  ?>
</div>
<form method="post" action="" enctype="multipart/form-data">

<div id="food_add_info">
<button type="button" class="back_btn btn btn-primary"><a href="your_food.php" style="color:white;">Back</a></button>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Food Name</label>
  <span class="add_food_warning" style="color:red">*</span>
  <input type="text" class="form-control" name="food_name" id="food_name" placeholder="Food Name" required>
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Food Discription</label>
  <span class="add_food_warning" style="color:red">*</span>
  <textarea class="form-control" name="food_disc" id="food_disc" placeholder="Food Discription" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Ammount</label>
  <span class="add_food_warning" style="color:red">*</span>
  <input type="number" class="form-control" name="food_ammount" id="food_ammount" placeholder="Food Ammount" required>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Delivery Charge</label>
  <span class="add_food_warning" style="color:red">*</span>
  <input type="number" class="form-control" name="food_delivery_charge" id="food_delivery_charge" placeholder="Delivery Charge" required>
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Food Image</label>
  <span class="add_food_warning" style="color:red">*</span>
  <input type="file" class="form-control" name="food_image" id="food_image" placeholder="Choose File" required>
  <span class="add_food_warning" style="color:red">Only png, jpeg, jpg format supported, file size should be less than 400kb</span>
</div>

<label for="food_category">Select Food Category</label>
<select name="food_category" id="food_category" required>
    <?php
    $sql=  "SELECT `category` FROM `category`";
    $result = mysqli_query($conn, $sql);


    while($rows = mysqli_fetch_assoc($result)){

        echo '<option value='.$rows['category'].'>'.$rows['category'].'</option>';
    }

    ?>
  
</select><br>

<button type="submit" name="food_info_submit" id="food_info_submit">ADD</button>

</div>

  </form>


      <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function () {
          $('#myTable').DataTable();
        });
      </script>

    
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>