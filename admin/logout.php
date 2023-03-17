<?php
session_start();

if(isset($_SESSION['admin_login_success'])){
    session_destroy();
    session_reset();
    header("Location: login.php");
}

?>