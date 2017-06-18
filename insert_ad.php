<?php
require 'database.php';
include_once 'session.php';

date_default_timezone_set('Europe/Ljubljana');

$user_id = (int)$_SESSION['user_id'];

$title = $_POST['title'];
$price = $_POST['price'];
$min_price = $_POST['min_price'];
$cat = $_POST['cat'];
$date_e = $_POST['date_e'];
$date_b = date('Y-m-d H:i:s');
$desc = $_POST['desc'];

if(empty($desc))
{
  $desc = "(ni opisa)";
}

if (!empty($title) && !empty($date_e) && !empty($price))
{
  $query = sprintf("INSERT INTO oglasi (kategorija_id, uporabnik_id, naslov, cena, datum_z, datum_k, opis, min_cena)
                    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                    mysqli_real_escape_string($conn, $cat),
                    mysqli_real_escape_string($conn, $user_id),
                    mysqli_real_escape_string($conn, $title),
                    mysqli_real_escape_string($conn, $price),
                    mysqli_real_escape_string($conn, $date_b),
                    mysqli_real_escape_string($conn, $date_e),
                    mysqli_real_escape_string($conn, $desc),
                    mysqli_real_escape_string($conn, $min_price));

  mysqli_query($conn, $query);
  $ad_id = mysqli_insert_id($conn);

  header("Location: ad_view.php?id=$ad_id");
}
else
{
  $_SESSION['notice'] = "Vnesite pravilne podatke";
  header("Location: ad_add.php");
}

 ?>
