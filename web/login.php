<?php
include "partials/dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
$phone = $_POST['phone'];
$password = $_POST['password'];

$check_login = "SELECT * FROM login where mobile = '$phone'";
$run_login = mysqli_query($conn, $check_login);
$login_rows = mysqli_num_rows($run_login);

$rows = mysqli_fetch_assoc($run_login);
$hash_pass = $rows['password'];

//checking data os available or not

if($login_rows == 1){

//Verifying password
    if(password_verify($password, $hash_pass)){
        session_start();
        $_SESSION['f_name'] = $rows['fname'];
        $_SESSION['l_name'] = $rows['lname'];
        $_SESSION['cust_id'] = $rows['cust_id'];
        $_SESSION['email'] = $rows['email'];
        $_SESSION['mobile'] = $rows['mobile'];
        $_SESSION['address'] = $rows['address'];
        $_SESSION['login_success'] = true;
        // header("Location: index.php");

        // echo '<script> window.location = "index.php" </script>';
        

        

    }else{
        echo 'passwword not matched';
    }

}else{
    echo 'Mobile number not available please register first';
}


}
// if(isset($_SESSION['login_success'])){
//     header("Location: index.php");
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
include "partials/header.php";
?>

<!-- <?php
if(isset($loginsucce)){

  echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Your feedback has been send succesfully</strong>
  <a href="contactus.php">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
}
?> -->
<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>LOGIN</span></h1>

    <form action="" method="post">

        <div class="inputBox">
            <input type="number" placeholder="Enter Phone Number" name="phone" required>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>

        <input type="submit" value="LOGIN" class="btn" name="contact_btn">
        <div class="inputBox">
            <a href="register.php" style="text-decoration:none"><h3>Create a new account here</h3></a>
        </div>
    </form>

</section>

<!-- contact section ends -->



<?php
include "partials/footer.php";
?>






<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

