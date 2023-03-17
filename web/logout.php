<?php

session_start();

if(isset($_SESSION['login_success'])){
    session_destroy();
    session_reset();
    echo '<script>window.location="index.php"</script>';
}
?>