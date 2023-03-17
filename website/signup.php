<?php include "partials/_dbconnect.php";?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $fullname = $fname." ". $lname;
  $email = $_POST['email'];
  $mobile_number = $_POST['mobile_number'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $con_password = $_POST['con_password'];

  $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);


  $sql_for_mobile = "SELECT * from `users` WHERE `mobile`='$mobile_number'";
  $result1 = mysqli_query($conn ,$sql_for_mobile);
  $mob_num = mysqli_num_rows($result1);

  $sql_for_email = "SELECT * from `users` WHERE `email`='$email'";
  $result2 = mysqli_query($conn ,$sql_for_email);
  $email_num = mysqli_num_rows($result2);

  $cust_id = "#".rand(1,1000000000000000000);

  if($mob_num > 0 && $email_num > 0){
    $mob_email_available = TRUE;
      header("Location signup.php");
     }
  elseif($mob_num > 0 ){
    $mobile_available = TRUE;
    header("Location signup.php");
    }
    elseif($email_num > 0){
    $email_available = TRUE;
  header("Location signup.php");
    }elseif(!ctype_alpha($fname)){
      $onlyalpha = true;
    }elseif(!ctype_alpha($lname)){
      $onlyalpha = true;
    }
    elseif(!$uppercase || !$lowercase || !$number){
      $nostrongpass = true;
    }
  
else{

  if($password == $con_password){
  
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $sql_insert_data = "INSERT INTO `users` (`cust_id`, `name`, `email`, `mobile`, `address`, `password`) VALUES('$cust_id','$fullname', '$email', '$mobile_number', '$address', '$hash')";
  $result_insert_data = mysqli_query($conn, $sql_insert_data);
  
  if($result_insert_data){
    header("Location: index.php");
    $_SESSION['signup_successfully'] = TRUE;
  }


  }
  else{
    $password_error = TRUE;
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
  <title>Signup</title>

  <style>
    <?php include "website.css";
    include "media_480.css";
    ?>
  </style>

</head>

<body>
  <div id="Signup_form">

  <img src="/food planet/website/web_img/signup.jpg" id="signup_img">

  <div id="sign_form_details">
  <!-- /food planet/website/index.php -->
  <form method="post">
  <h2>Signup to Food Planet</h2>
  <span style="color:red">

<?php
if(isset($email_available)){
    echo "This Email is already exists choose a diifferant email or log in";
}
elseif(isset($mobile_available)){
    echo "This Mobile Number is already exists choose a diifferant Mobile or log in";
}
elseif(isset($mob_email_available)){
    echo "This Email & mobile number is already exists";
}
elseif(isset($onlyalpha)){
  echo "Only Characters allowed in name field";
}
elseif(isset($nostrongpass)){
  echo "Password is not strong Contain uppercase, lowercase, number";
}
?>
 </span>

    <div class="form-floating mb-3 my-3">
    <input type="text" class="form-control"  id="fullname" name="fname" placeholder="First Name" required>
    <label for="floatingInput">First Name<span style="color:red"> *</span></label>
    </div>

    <div class="form-floating mb-3 my-3">
    <input type="text" class="form-control"  id="fullname" name="lname" placeholder="Last Name" required>
    <label for="floatingInput">Last Name<span style="color:red"> *</span></label>
    </div>

    <div class="form-floating  mb-3 my-3">
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
    <label for="floatingPassword">Email <span style="color:red"> *</span></label>
    </div>

    <div class="form-floating  mb-3 my-3">
    <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number"  maxlength="10" required>
    <label for="floatingInput">Mobile Number <span style="color:red"> *</span></label>
    </div>

    <div class=" mb-3 my-3">
  <label for="address" class="form-label" style="font-size:20px; font-weight:500">Residential Address <span style="color:red"> *</span></label>
  <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
  </div>

    <div class="form-floating  mb-3 my-3">
    <input type="password" class="form-control" id="password" name="password" placeholder="Create Password" minlength="8" maxlength="16" required>
    <label for="floatingPassword">Create Password <span style="color:red"> *</span></label>
    </div>

    <div class="form-floating  mb-3 my-3">
    <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm Password" required>
    <label for="floatingPassword">Confirm Password <span style="color:red"> *</span></label>
    </div>
    <a href="login.php">Already Have an Account?</a><br>
    <button type="submit" name="signup" class="btn btn-primary signup_btn">Signup</button>

</form>
</div>

    </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>