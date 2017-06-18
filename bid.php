<?php
require 'database.php';
include_once 'session.php';

$ad_id = $_POST['id'];
$new_bid = $_POST['bid'];
$current_datetime = date('Y-m-d H:i:s');

$date_query = "SELECT  datum_k FROM oglasi WHERE id=$ad_id";
$date_result = mysqli_query($conn, $date_query);

$date = mysqli_fetch_array($date_result);

$query = "SELECT MAX(ponudba) as ponudba FROM ponudbe WHERE oglas_id=$ad_id";
$result = mysqli_query($conn, $query);

$old_bid = mysqli_fetch_array($result);

if($new_bid > $old_bid['ponudba'] && $current_datetime<$date['datum_k'])
{
$sql = sprintf("INSERT INTO ponudbe (uporabnik_id, oglas_id, ponudba, datum_ponudbe)
                VALUES ('%s', '%s', '%s', '%s')",
                mysqli_real_escape_string($conn, $_SESSION['user_id']),
                mysqli_real_escape_string($conn, $ad_id),
                mysqli_real_escape_string($conn, $new_bid),
                mysqli_real_escape_string($conn, date('Y-m-d H:i:s')));

  mysqli_query($conn, $sql);

  $_SESSION['notice'] = "Uspešno ste oddali ponudbo.";
  header("Location: ad_view.php?id=$ad_id");
}
else
{
  $_SESSION['notice'] = "Premajhna ponudba";
  header("Location: ad_view.php?id=$ad_id");
}





 ?>
