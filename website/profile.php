<?php include "partials/_dbconnect.php"; ?>
<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];
  $sql = "SELECT * FROM users where email = '$user_email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
while($rows = mysqli_fetch_assoc($result)){
  $address = $rows['address'];
  $name = $rows['name'];
}


}else{
  echo '<script>window.location="index.php"</script>';
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
  <title>Profile</title>
  <link rel="stylesheet" href="website.css">

</head>
<?php include "partials/_navbar.php";?>
<body>


 <div id="profile_page">
  <?php 
  $sql = "SELECT * FROM users where email ='$user_email'";
  $result = mysqli_query($conn, $sql);
  while($rows = mysqli_fetch_assoc($result)){
    $email = $rows['email'];
    $name = $rows['name'];
    $addr = $rows['address'];
    $mobile = $rows['mobile'];
    $cust_id = $rows['cust_id'];
  }
  ?>
<h1>Profile Page</h1>
<p>Name : <?php echo $name; echo'<button class="mx-5 btn btn-outline-primary profile_Edit1" onclick="edit1()" id="edit">Edit</button>';?></p>
<?php echo '<form method="post"><input type="text" name="update_name" id="update_name" value="'.$name.'">  <button type ="submit" name="update_name_btn" class="btn btn-outline-success profile_update1" onclick="update1()" id="update">Update</button></form>';?>
<p>Email : <?php echo $email;?></p>
<p>Mobile : <?php echo $mobile;?></p>
<p>Address : <?php echo $addr; echo'<button class="mx-5 btn btn-outline-primary profile_Edit2" onclick="edit2()" id="edit2">Edit</button>'  ?></p>
<?php echo '<form method="post"> <input type="text" name="update_address" id="update_address" value="'.$address.'"> <button type ="submit" name="update_add_btn" class="btn btn-outline-success profile_update2" onclick="update2()" id="update2">Update</button></form> ';?>
<p>Customer ID : <?php echo $cust_id;?></p>

</div>

<?php
 if(isset($_POST['update_add_btn'])){
  $update_address = $_POST['update_address'];
  
  $sql = "UPDATE `users` SET `address` = '$update_address' WHERE `users`.`email` = '$user_email_num'";
  $result = mysqli_query($conn, $sql);
 }


 if(isset($_POST['update_name_btn'])){
  $update_name = $_POST['update_name'];
  
  $sql = "UPDATE `users` SET `name` = '$update_name' WHERE `users`.`email` = '$user_email_num'";
  $result = mysqli_query($conn, $sql);
 }
?>

<script>

function edit1(){
  document.getElementById('update').style.display = "inline-block";
  document.getElementById('edit').style.display = "none";
  document.getElementById('update_name').style.display = "inline-block";
}
function edit2(){
  document.getElementById('update2').style.display = "inline-block";
  document.getElementById('edit2').style.display = "none";
  document.getElementById('update_address').style.display = "inline-block";
}



  </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
