<?php
include_once 'session.php';
include_once 'database.php';

$query = "SELECT * FROM oglasi";
$result = mysqli_query($conn, $query);

$task = mysqli_fetch_array($result);

while($row = mysqli_fetch_array($result))
{
  if($row['datum_k']<date('Y-m-d H:i:s') && $row['prodan'] != 1)
  {
    $buyer="SELECT u.ime, u.priimek, u.email FROM uporabniki u INNER JOIN oglasi o ON o.uporabnik_id=u.id WHERE o.id=".$row['id'].";";
    $buyer_query = mysqli_query($conn, $buyer);
    $buyer_result = mysqli_fetch_array($buyer_query);

    //echo var_dump($buyer_result);
    $mail = $buyer_result['email'];

    mail("$mail", "Konec dražbe", "Uspešno ste zaključili dražbo z nazivom ".$row['naslov'].".");

    $seller="SELECT u.ime, u.primke, u.email FROM uporabniki u INNER JOIN oglasi o ON a.uporabnik_id=u.id WHERE o.id=".$row['id'].";";
    $seller_query = mysqli_query($conn, $seller);
    $seller_result = mysqli_fetch_array($seller_query);

    $mail = $seller_result['email'];

    mail("$mail", "Konec dražbe", "Uspešno ste zaključili dražbo z nazivom ".$row['naslov'].".
    Kupec je ".$buyer_result['ime']." ".$buyer_result['priimek']."(".$buyer_result['email'].").");

    $prodan = "UPDATE oglasi SET prodan='1' WHERE id=".$row['id'].";";
    mysqli_query($conn, $prodan);

    echo 'OK?';
  }
}
