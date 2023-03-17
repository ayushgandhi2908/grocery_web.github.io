<?php 
session_start();
if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged']== FALSE){
    header("Location: login.php");
} ?>

<?php include "partials/_dbconnect.php";?>
<?php
if(isset($_GET['dlt_id'])){
  $id = $_GET['dlt_id'];
  $sql = "DELETE FROM `delivery_boy` WHERE `id` = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("Location: delivery.php");
  }
}

?>
<?php

if(isset($_POST['snoEdit'])){

  $snoEdit = $_POST['snoEdit'];
  $edit_d_boy_name =$_POST['edit_d_boy_name'];
  $edit_d_boy_email= $_POST['edit_d_boy_email'];
  $edit_d_boy_mobile= $_POST['edit_d_boy_mobile'];

  $sql = "UPDATE `delivery_boy` SET `d_name` = '$edit_d_boy_name', `d_email` = '$edit_d_boy_email', `d_mobile` = '$edit_d_boy_mobile' WHERE `delivery_boy`.`id` = '$snoEdit';";
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
            <h4>Manage Delivery Boy</h4>
        </div>
        <div id="d_success">
        <?php
        if(isset($editsuccess)){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Success!! </strong> Successfully Edited
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        </div>
        <div class="add_category">
            <button type="button" class="btn btn-info"><a href="add_delivery.php"
                    style="color:black; font-weight:700; font-size:20px">Add Delivery Boy</a></button>
        </div>
    </div>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col"> ID</th>
                <th scope="col"> Name</th>
                <th scope="col"> Email</th>
                <th scope="col"> Mobile No.</th>
                <th scope="col">Added On</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
    $sql = "SELECT * FROM `delivery_boy` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    while($rows = mysqli_fetch_assoc($result)){
      $id = $rows['id'];
      $d_name = $rows['d_name'];
      $d_email = $rows['d_email'];
      $d_mobile = $rows['d_mobile'];
      $date = $rows['date'];
      $sno = $sno+1;

      echo '<tr>
      <th scope="row">'.$sno.'</th>
      <td>'.$d_name.'</td>
      <td>'.$d_email.'</td>
      <td>'.$d_mobile.'</td>
      <td>'.$date.'</td>
      <td>
      <button type="submit" data-bs-toggle="modal" data-bs-target="#modalEdit" class="edit_delivery_info btn btn-info" id =e'.$id.'>EDIT</button>
      <button type="submit" class="dlt_delivery_info btn btn-danger" id ='.$id.'>DELETE</button></td>
      </tr>';
      
    }
  ?>

<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Delivery Boy Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="" method="post">
      <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="d_name form-floating my-3">
                <input type="text" class="form-control" name="edit_d_boy_name" id="edit_d_boy_name" placeholder="Category Name"
                    required>
                <label for="floatingInput">Delivery Boy Name</label>
            </div>

            <div class="d_email form-floating my-3">
                <input type="email" class="form-control" name="edit_d_boy_email" id="edit_d_boy_email" placeholder="Email"
                    required>
                <label for="floatingInput">Email</label>
            </div>

            <div class="d_mobile form-floating my-3">
                <input type="tel" class="form-control" name="edit_d_boy_mobile" id="edit_d_boy_mobile"
                    placeholder="Category Name" required>
                <label for="floatingInput">Mobile No.</label>
            </div>
            <button tyoe="submit" value="Add" name="d_submit" id="d_submit">Update</button>
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
            deletes = document.getElementsByClassName('dlt_delivery_info');

            Array.from(deletes).forEach((element) => {

                element.addEventListener('click', (e) => {
                    sno = e.target.id;

                    if (confirm("Are you sure! You want to Delete This Info")) {
                        window.location = `/food planet/admin/delivery.php?dlt_id=${sno}`;
                        console.log("yes");
                    } else {
                        console.log("no");
                    }
                });

            });

            edits = document.getElementsByClassName('edit_delivery_info');
            Array.from(edits).forEach((element) => {
                element.addEventListener('click', (e) => {
                    tr = e.target.parentNode.parentNode;
                    d_name = tr.getElementsByTagName('td')[0].innerText;
                    d_email = tr.getElementsByTagName('td')[1].innerText;
                    d_mobile = tr.getElementsByTagName('td')[2].innerText;
                    console.log(d_name, d_email, d_mobile);
                    edit_d_boy_name.value = d_name;
                    edit_d_boy_email.value = d_email;
                    edit_d_boy_mobile.value = d_mobile;
                    console.log(edit_d_boy_name.value, edit_d_boy_email.value, edit_d_boy_email.value);
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