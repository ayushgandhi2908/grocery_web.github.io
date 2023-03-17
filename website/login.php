<?php
 include "partials/_dbconnect.php";?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

$login_mobile = $_POST['login_mobile_number'];
$login_pass = $_POST['login_password'];

$sql = "select * from `users` where `mobile`='$login_mobile'";
$result = mysqli_query($conn, $sql);
$login_row = mysqli_num_rows($result);

  if($login_row == 1){

      while($rows = mysqli_fetch_assoc($result)){
          $user_address = $rows['address'];
          $user_mobile = $rows['mobile'];
          $user_email = $rows['email'];
          $user_name = $rows['name'];
          $cust_id = $rows['cust_id'];
          $user_id_number = $rows['user_id'];

            if(password_verify($login_pass, $rows['password'])){
              session_start();
              $_SESSION['login'] = TRUE;
              $_SESSION['user_address'] = $user_address;
              $_SESSION['user_mobile'] = $user_mobile;
              $_SESSION['user_email'] = $user_email;
              $_SESSION['user_name'] = $user_name;
              $_SESSION['customer_id'] = $cust_id;
              $_SESSION['user_id_number'] = $user_id_number;
              header("Location: index.php");
            }
            else{
              $login_pass_error = TRUE;
              $_SESSION['login'] = FALSE;
            }

      }
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
  <title>Login</title>
  <link rel="stylesheet" href="website.css">
  <style>
      <?php require "website.css"; ?>
  </style>
</head>

<body>
  <div id="Login_form">

  <img src="/food planet/website/web_img/signup.jpg" id="login_img" >

  <div id="login_form_details">

  <img src="/food planet/website/web_img/nav_img.png" alt="Image Loading" class="login_logo_img" style = "width: 150px; height:150px">
  
  <form method="post">
  <h2>Login</h2>
    <span>
      <?php
      if(isset($login_pass_error)){
        echo'Password Do Not Match Try Again';
      }
      ?>
    </span>
    <div class="form-floating  mb-3 my-3">
    <input type="number" class="form-control" id="login_mobile_number" name="login_mobile_number" placeholder="Enter Mobile Number" required>
    <label for="floatingInput">Mobile Number</label>
    </div>

    <div class="form-floating  mb-3 my-3">
    <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Create Password" required>
    <label for="floatingPassword">Password</label>
    </div>

    <a href="signup.php">Dont Have an Account?</a><br>
    <button type="submit" name="login" class="btn btn-primary login_btn" onclick="clickme()">Login</button>
    </form>
    </div>

    </div>

  

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>