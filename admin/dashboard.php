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

        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <title>Dashboard</title>

    <style>
    <?php include "admin.css";?>
    </style>

  </head>
  <body>
  
  <div id="main_contain">

<?php include "partials/_navbar.php"?>
<div class="side_navbar">
    <h4> DashBoard</h4>
</div>
</div>
 <div id="dash_info">

<div class="dash_box1">
  <?php
  $sql = "SELECT SUM(`txn_amt`) as `sum` FROM `admin_orders` where order_status = 'Completed' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result);
  $sum = $row[0];
  ?>
  <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
</svg> Total Income : 
<?php
if($sum > 999 & $sum < 1000000){
  echo $sum/1000; echo 'K';
}
elseif($sum > 1000000 & $sum < 100000000){
  echo $sum/1000; echo 'M';
}
elseif($sum > 100000000){
  echo $sum/1000; echo 'B';
}
else{
  echo $sum." Rs";
}
 ?>
</div>

<div class="dash_box2">
<?php
  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);

  ?>
<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
</svg> Active Users : <?php
if($row > 999 & $row < 1000000){
  echo $row/1000; echo 'K';
}
elseif($row > 1000000 & $row < 100000000){
  echo $row/1000; echo 'M';
}
elseif($row > 100000000){
  echo $row/1000; echo 'B';
}
elseif($row<999){
  echo $row;
}
 ?>
</div>

<div class="dash_box3">
<?php
  $sql = "SELECT * FROM category";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);

  ?>
<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg>
</svg> Total Categories : <?php
if($row > 999 & $row < 1000000){
  echo $row/1000; echo 'K';
}
elseif($row > 1000000 & $row < 100000000){
  echo $row/1000; echo 'M';
}
elseif($row > 100000000){
  echo $row/1000; echo 'B';
}
elseif($row<999){
  echo $row;
}
 ?>
</div>

<div class="dash_box4">
<?php
  $sql = "SELECT * FROM food_details";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);

  ?>
<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-egg" viewBox="0 0 16 16">
  <path d="M8 15a5 5 0 0 1-5-5c0-1.956.69-4.286 1.742-6.12.524-.913 1.112-1.658 1.704-2.164C7.044 1.206 7.572 1 8 1c.428 0 .956.206 1.554.716.592.506 1.18 1.251 1.704 2.164C12.31 5.714 13 8.044 13 10a5 5 0 0 1-5 5zm0 1a6 6 0 0 0 6-6c0-4.314-3-10-6-10S2 5.686 2 10a6 6 0 0 0 6 6z"/>
</svg>
</svg> Total Foods : <?php
if($row > 999 & $row < 1000000){
  echo $row/1000; echo 'K';
}
elseif($row > 1000000 & $row < 100000000){
  echo $row/1000; echo 'M';
}
elseif($row > 100000000){
  echo $row/1000; echo 'B';
}
elseif($row<999){
  echo $row;
}
 ?>
</div>

<div class="dash_box5">
<?php
  $sql = "SELECT * FROM admin_orders where order_status = 'Completed'";
  $result = mysqli_query($conn, $sql);
  $ord_row = mysqli_num_rows($result);

  $sql2 = "SELECT * FROM admin_orders where order_status = 'pending'";
  $result2 = mysqli_query($conn, $sql2);
  $ord_row2 = mysqli_num_rows($result2);

  $total_orders = $ord_row + $ord_row2;
  // $total_percent = $ord_row / $total_orders * 100;

  ?>
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg>
Total Orders: <?php 
if($total_orders > 999 & $total_orders < 1000000){
  echo $total_orders/1000; echo 'K';
}
elseif($total_orders > 1000000 & $total_orders < 100000000){
  echo $total_orders/1000; echo 'M';
}
elseif($total_orders > 100000000){
  echo $total_orders/1000; echo 'B';
}
elseif($total_orders<999){
  echo $total_orders;
}
 ?>

</div>




<div class="dash_box6">

<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg>
</svg> 
Orders Completed : <?php 
if($ord_row > 999 & $ord_row < 1000000){
  echo $ord_row/1000; echo 'K';
}
elseif($ord_row > 1000000 & $ord_row < 100000000){
  echo $ord_row/10000; echo 'M';
}
elseif($ord_row > 100000000){
  echo $ord_row/100000; echo 'B';
}
elseif($ord_row<999){
  echo $ord_row;
}
 ?>

  
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
</svg>

  Orders Pending :  <?php echo $ord_row2; ?>
  <div class="progress mx-5 my-4">
  <div class="progress-bar" role="progressbar" style="width:   <?php echo $ord_row / $total_orders * 100;?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo intval($ord_row / $total_orders * 100);?>%</div>
</div>



</div>








<div id = "dash_info2">

<?php
  $sql = "SELECT * FROM food_comment";
  $result_comment = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result_comment);
  ?>

<div class="box1_dashboard">
<img src="/food planet/admin/bg_img/comment.png" width="30px" height="30px"> Total Comments :
<?php
if($row > 999 & $row < 1000000){
  echo $row/1000; echo 'K';
}
elseif($row > 1000000 & $row < 100000000){
  echo $row/1000; echo 'M';
}
elseif($row > 100000000){
  echo $row/1000; echo 'B';
}
elseif($row<999){
  echo $row;
}
 ?>
</div>

<div class="box2_dashboard">
<img src="/food planet/admin/bg_img/users.png" width="50px" height="30px"> Recent Users<br>
<?php
  $sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  while($rows = mysqli_fetch_assoc($result)){
    echo "UserName: ".$rows['name']."<br>Email: ".$rows['email'];
  }
  ?>
</div>

</div>

<div class="dash_recent">
<br>Recent Comments: 
 <?php
  $sql = "SELECT * FROM food_comment ORDER BY comment_id DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  while($rows = mysqli_fetch_assoc($result)){
    echo '<span> <p style="font-size:20px">- by '. $rows['user_name']. '<span style="font-size:13px"> on '.substr($rows['date'], 0,10).'</span><br>'.substr($rows['comment'],0,50).'</p></span>';
  }
  ?>
  </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>