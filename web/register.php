<?php
include "partials/dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $email = $_POST['email'];
 $mobile = $_POST['mobile'];
 $password = $_POST['password'];
 $c_pass = $_POST['c_pass'];
 $address= $_POST['address'];
 $cust_id = "#".random_int(0, 10000000000000);

$sql = "SELECT * FROM `login` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);
$fetch_email = mysqli_num_rows($result);


$sql3 = "SELECT * FROM `login` WHERE `mobile` = '$mobile'";
$result3 = mysqli_query($conn, $sql3);
$fetch_mobile = mysqli_num_rows($result3);


    if($password == $c_pass){

        $hash_pass = password_hash($password , PASSWORD_DEFAULT);

        if($fetch_mobile == 0 && $fetch_email == 0){

            $sql2 = "INSERT INTO `login` ( `fname`, `lname`,`cust_id`, `email`, `mobile`, `address`, `password`, `date`) 
            VALUES ( '$fname', '$lname','$cust_id', '$email', '$mobile', '$address', '$hash_pass', current_timestamp())";
            $result2 = mysqli_query($conn, $sql2);

            if(!$result){
            echo "Not Success";
            }
        }
        else{
            echo "Email or Mobile number already used try again!!";
        }


    }
    else{
        echo "PAssword nott matched";
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

    <h1 class="heading"> <span>register now</span></h1>

    <form action="" method="post">

        <div class="inputBox">
            <input type="text" placeholder="First Name" name="fname" required>
            <input type="text" placeholder="Last Name" name="lname" required>
           
        </div>

        <div class="inputBox">
            <input type="number" placeholder="Mobile" name="mobile" required>
            <input type="email" placeholder="Email" name="email" required>
           
        </div>

        <div class="inputBox">
            <input type="password" placeholder="Enter Password" name="password" required>
            <input type="password" placeholder="Confirm Password" name="c_pass" required>

        </div>

        <textarea placeholder="Addrress" name="address" cols="20" rows="3" required></textarea>
                    
        <input type="checkbox" required>I agree with terms and conditions<br>

       
        <input type="submit" value="REGISTER" class="btn" name="contact_btn">
    
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

