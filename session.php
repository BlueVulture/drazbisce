<?php
    session_start();

    if (!isset($_SESSION['user_id']) &&
            $_SERVER['REQUEST_URI'] != '/zajec/registration.php' &&
            $_SERVER['REQUEST_URI'] != '/zajec/login.php' &&
            $_SERVER['REQUEST_URI'] != '/zajec/login_check.php')
    {
        header("location: login.php");
        die();
    }
?>
