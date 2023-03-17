<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>
<?php include "partials/_dbconnect.php";?>
<?php
if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  $sql = "DELETE FROM `category` WHERE `id` = $id";
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
      <h4>Manage Food Categories </h4>
    </div>
  </div>

  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Name</th>
        <th scope="col">User Email</th>
        <th scope="col">User Mobile</th>
        <th scope="col">User Added on</th>
      </tr>
    </thead>

    <tbody>

      <?php
    $sql = "SELECT * FROM `users`ORDER BY `user_id` DESC";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    while($rows = mysqli_fetch_assoc($result)){
      $id = $rows['user_id'];
      $user_name = $rows['name'];
      $user_email = $rows['email'];
      $user_mobile = $rows['mobile'];
      $user_added_date = $rows['date'];

      $sno = $sno+1;

      echo '<tr>
      <th scope="row">'.$sno.'</th>
      <td>'.$user_name.'</td>
      <td>'.$user_email.'</td>
      <td>'.$user_mobile.'</td>
      <td>'.$user_added_date.'</td>
      </tr>';
      
    }
  ?>

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