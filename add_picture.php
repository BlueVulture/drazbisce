<?php
include_once 'session.php';
include_once 'database.php';

$ad_id = $_POST['id'];

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM oglasi WHERE id=$ad_id AND uporabnik_id=$user_id;");

if (mysqli_num_rows($result) == 0)
{
    $_SESSION['notice'] = 'Napaka';
    //header("Location: ad_list.php");
    die();
}

$allowed = array("jpg", "png", "gif", "jpeg");

$ext = end(explode(".",$_FILES['file']['name']));

if (in_array($ext, $allowed) && ($_FILES["file"]["size"] < 1000000))
{
    $new_name = "pictures/".date("Ymd")."-".$ad_id."-".$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $new_name);

    mysqli_query($conn, "INSERT INTO slike (oglas_id, url)
                 VALUES ($ad_id, '$new_name')");

    $_SESSION['notice'] = "Uspešno ste dodali sliko";
}
header("Location: ad_view.php?id=".$ad_id);
?>
