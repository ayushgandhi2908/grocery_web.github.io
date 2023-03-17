<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>

<?php include "partials/_dbconnect.php";?>
<?php
if(isset($_GET['dlt_id'])){
  $id = $_GET['dlt_id'];
  $sql = "DELETE FROM `food_details` WHERE `food_id` = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: your_food.php");
  }
}

?>
<?php

if(isset($_POST['snoEdit'])){

$edit_food_name = $_POST['edit_food_name'];
$edit_food_disc = $_POST['edit_food_disc'];
$edit_food_ammount = $_POST['edit_food_ammount'];
$edit_food_delivery_charge = $_POST['edit_food_delivery_charge'];
$snoEdit = $_POST['snoEdit'];

$sql1 = "SELECT * FROM `food_details` where `food_id`='$snoEdit'";
$result2 = mysqli_query($conn, $sql1);

while($rows = mysqli_fetch_assoc($result2)){
    $image_name = $rows['image'];
    $category = $rows['category'];
}
  
$sql = "UPDATE `food_details` SET `name` = '$edit_food_name', `discription` = '$edit_food_disc', `amount` = '$edit_food_ammount', `delivery_charge` = '$edit_food_delivery_charge', `no_of_plates` = '$edit_number_of_plates', `image` = '$image_name', `category`='$category' WHERE `food_details`.`food_id` = $snoEdit;";
$result = mysqli_query($conn, $sql);

if($result){
    $editsuccess = TRUE;
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
            <h4>Manage Food in Website</h4>
        </div>
        <div class="add_category">
            <button type="button" class="btn btn-info"><a href="add_food.php"
                    style="color:black; font-weight:700; font-size:20px">Add Food</a></button>
        </div>
    </div>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col"> ID</th>
                <th scope="col"> Food Title</th>
                <th scope="col"> Discription</th>
                <th scope="col"> Ammount</th>
                <th scope="col">Delivery Charge</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
    $sql = "SELECT * FROM `food_details` ORDER BY `food_id` DESC";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    while($rows = mysqli_fetch_assoc($result)){
      $id = $rows['food_id'];
      $food_name = $rows['name'];
      $food_disc = $rows['discription'];
      $food_ammount = $rows['amount'];
      $food_delivery_charge = $rows['delivery_charge'];
      $food_category = $rows['category']; 
      $sno = $sno+1;

      echo '<tr>
      <th scope="row">'.$sno.'</th>
      <td>'.$food_name.'</td>
      <td>'.substr($food_disc,0,70).'</td>
      <td>'.$food_ammount.'</td>
      <td>'.$food_delivery_charge.'</td>
      <td>'.$food_category.'</td>
      <td>
      <button type="submit" data-bs-toggle="modal" data-bs-target="#modalEdit" class="edit_food_info btn btn-info" id =e'.$id.'>EDIT</button>
      <button type="submit" class="dlt_food_info btn btn-danger" id ='.$id.'>DELETE</button></td>
      </tr>';
      
    }

  ?>



<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Food Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      

      <form method="post" action="" enctype="multipart/form-data">

      <input type="hidden" name="snoEdit" id="snoEdit">

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Food Name</label>
        <input type="text" class="form-control" name="edit_food_name" id="edit_food_name" placeholder="Food Name" required>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Food Discription</label>
        <textarea class="form-control" name="edit_food_disc" id="edit_food_disc" placeholder="Food Discription" rows="3"></textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Ammount</label>
        <input type="number" class="form-control" name="edit_food_ammount" id="edit_food_ammount" placeholder="Food Ammount" required>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Delivery Charge</label>
        <input type="number" class="form-control" name="edit_food_delivery_charge" id="edit_food_delivery_charge" placeholder="Delivery Charge" required>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Number of Plates (by ruppes)</label>
        <input type="number" class="form-control" name="edit_number_of_plates" id="edit_number_of_plates" placeholder="Number of plates" required>
        </div>

        <button type="submit" name="food_info_submit">ADD</button>

    </form>

      </div>
    </div>
  </div>
</div>

            <script src="https://code.jquery.com/jquery-2.2.4.js"
                integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            </script>

            <script>
            deletes = document.getElementsByClassName('dlt_food_info');

            Array.from(deletes).forEach((element) => {

                element.addEventListener('click', (e) => {
                    sno = e.target.id;

                    if (confirm("Are you sure! You want to Delete This Info")) {
                        window.location = `/food planet/admin/your_food.php?dlt_id=${sno}`;
                        console.log("yes");
                    } else {
                        console.log("no");
                    }
                });

            });

            edits = document.getElementsByClassName('edit_food_info');
            Array.from(edits).forEach((element) => {
                element.addEventListener('click', (e) => {
                    tr = e.target.parentNode.parentNode;
                    food_name = tr.getElementsByTagName('td')[0].innerText;
                    food_disc = tr.getElementsByTagName('td')[1].innerText;
                    food_ammount = tr.getElementsByTagName('td')[2].innerText;
                    food_delivery_charge = tr.getElementsByTagName('td')[3].innerText;
                    food_no_of_plates = tr.getElementsByTagName('td')[4].innerText;

                    console.log(food_name, food_disc, food_ammount, food_delivery_charge, food_no_of_plates);
                    edit_food_name.value = food_name;
                    edit_food_disc.value = food_disc;
                    edit_food_ammount.value = food_ammount
                    edit_food_delivery_charge.value = food_delivery_charge;
                    edit_number_of_plates.value = food_no_of_plates;
                    snoEdit.value = e.target.id.substr(1);
                    $('#modalEdit').modal('toggle');

                });

            });
            </script>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
</body>

</html>