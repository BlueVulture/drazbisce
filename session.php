<?php
    session_start();

    if (!isset($_SESSION['user_id']) &&
            $_SERVER['REQUEST_URI'] != '/drazbisce/registration.php' &&
            $_SERVER['REQUEST_URI'] != '/drazbisce/login.php' &&
            $_SERVER['REQUEST_URI'] != '/drazbisce/user_new.php' &&
            $_SERVER['REQUEST_URI'] != '/drazbisce/login_action.php')
    {
        header("location: login.php");
        die();
    }
?>
