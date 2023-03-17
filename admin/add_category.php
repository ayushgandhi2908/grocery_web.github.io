<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>
<?php include "partials/_dbconnect.php";?>

<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

  $category_name = $_POST['category'];

  $sql = "INSERT INTO `category` (`category`, `date`) VALUES ('$category_name', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: category.php");
  }
}

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
            <h4>Add Food Category</h4>
        </div>
        

    </div>

    <form action = "" method="post">
        <div class="category form-floating mb-3">
            <input type="text" class="form-control" name="category" id="floatingInput" placeholder="Category Name" required>
            <label for="floatingInput">Category Name</label>
            <input type="submit" value="ADD" class="add_cat btn btn-info my-4">
        </div>

        </form>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>