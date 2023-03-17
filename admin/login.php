<?php
include "partials/dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
$uname = $_POST['uname'];
$password = $_POST['password'];

$check_login = "SELECT * FROM admin_login where username = '$uname'";
$run_login = mysqli_query($conn, $check_login);
$login_rows = mysqli_num_rows($run_login);

$rows = mysqli_fetch_assoc($run_login);

//checking data os available or not

if($login_rows == 1){

//Verifying password
    if($password == $rows['password']){
        session_start();
        $_SESSION['username'] = $rows['username'];
        $_SESSION['admin_login_success'] = true;

        header("Location: index.php");

    }else{
        echo 'passwword not matched';
    }

}else{
    echo 'Mobile number not available please register first';
}


}

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

@include 'partials/head_nav.php';
?>

<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>LOGIN</span></h1>

    <form action="" method="post">

        <div class="inputBox">
            <input type="text" placeholder="Username" name="uname" required>
            <input type="password" placeholder="Password" name="password" required>
        </div>

        <input type="submit" value="LOGIN" class="btn" name="contact_btn">
    </form>

</section>

<!-- contact section ends -->







<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

