<?php
    include_once 'session.php';
    include_once 'database.php';

    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM slike
            WHERE oglas_id = $id;";

            mysqli_query($conn, $sql);

    $sql = "DELETE FROM oglasi
            WHERE id = $id AND uporabnik_id = $user_id;";

            mysqli_query($conn, $sql);

    header("Location: ad_list.php");
?>
