<?php
session_start();
include "partials/_dbconnect.php";
?>

<?php
$_SESSION['admin_logged'] = FALSE;
if($_SERVER['REQUEST_METHOD']=="POST"){

    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    $sql = " SELECT * FROM `admin` where `admin_id`='1' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);    

    while($rows = mysqli_fetch_assoc($result)){
    $admin_user = $rows['admin_user'];
    $admin_pass = $rows['admin_pass'];
    }
   
    
    if($username == $admin_user){
        
        if($password == $admin_pass){
            $_SESSION['admin_logged'] = TRUE;
            $_SESSION['admin_info'] = $admin_user;
            header("Location: dashboard.php");

        }
        else{
            $admin_user_failed = TRUE;
        }    
    }
    else{
        $admin_user_failed = TRUE;
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
    <title>Admin Login</title>

    <style>
    <?php include "admin.css";
    ?>
    </style>

</head>

<body>
    <div id="login_page">

        <div id="login_form">
            <h2>Admin Login</h2>

            <form action="/food planet/admin/login.php" method="post">

                <span class="admin_failed_info">
                    <?php 
                if(isset($admin_user_failed)){echo '<div class="alert alert-danger" role="alert">
                You Entered Wrong Username or Password!! Please Enter Correct details
                </div>';
                }
                ?>
            </span>
            
                <div id="admin_user">
                    <i class="bi bi-person"></i>
                    <input type="text" name="admin_username" placeholder="Username" required>
                </div>

                <div id="admin_pass">
                    <span class="admin_failde_info">
                        <i class="bi bi-lock" id="lock"></i>
                        <input type="password" name="admin_password" placeholder="Password" required>
                </div>

                <input type="submit" name="admin_submit" id="admin_submit" value="Login">

            </form>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>