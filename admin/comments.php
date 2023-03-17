<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>

<?php include "partials/_dbconnect.php";?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Comments</title>

    <style>
    <?php include "admin.css";
    ?>
    </style>

</head>

<body>

    <div id="main_contain">

        <?php include "partials/_navbar.php"?>
        <div class="side_navbar">
            <h4>User Comments</h4>
        </div>
    </div>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col"> Sno</th>
                <th scope="col"> Name</th>
                <th scope="col"> Email</th>
                <th scope="col"> Comment</th>
                <th scope="col"> Date</th>

            </tr>
        </thead>

        <tbody>

            <?php
    $sql = "SELECT * FROM `food_comment`";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    while($rows = mysqli_fetch_assoc($result)){
      $sno = $sno+1;
      

      echo '<tr>
      <th scope="row" width="50px">'.$sno.'</th>
      <td width="100px">'.$rows['user_name'].'</td>
      <td width="100px">'.$rows['user_email'].'</td>
      <td width="400px">'.$rows['comment'].'</td>
      <td width="150px">'.$rows['date'].'</td>';
      
    }

  ?>


            <script src="https://code.jquery.com/jquery-2.2.4.js"
                integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            </script>

            <script>
        
            // </script>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
</body>

</html>