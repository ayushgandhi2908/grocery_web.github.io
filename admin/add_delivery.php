<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>
<?php include "partials/_dbconnect.php";?>

<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

  $d_boy_name = $_POST['d_boy_name'];
  $d_boy_email = $_POST['d_boy_email'];
  $d_boy_mobile = $_POST['d_boy_mobile'];

  $sql = "INSERT INTO `delivery_boy` (`d_name`, `d_email`, `d_mobile`, `date`) VALUES ('$d_boy_name', '$d_boy_email', '$d_boy_mobile', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: delivery.php");
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
            <h4>Add Delivery Boy</h4>
        </div>


    </div>

    <form action="" method="post">
        <div id="d_boy_info">
            <div class="d_name form-floating my-3">
                <input type="text" class="form-control" name="d_boy_name" id="floatingInput" placeholder="Category Name"
                    required>
                <label for="floatingInput">Delivery Boy Name</label>
            </div>

            <div class="d_email form-floating my-3">
                <input type="email" class="form-control" name="d_boy_email" id="floatingInput" placeholder="Email"
                    required>
                <label for="floatingInput">Email</label>
            </div>

            <div class="d_mobile form-floating my-3">
                <input type="number" class="form-control" name="d_boy_mobile" id="floatingInput"
                    placeholder="Category Name" required>
                <label for="floatingInput">Mobile No.</label>
            </div>
            <button tyoe="submit" value="Add" name="d_submit" id="d_submit">Add</button>
        </div>
    </form>

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>