<?php
include_once 'session.php';
include_once 'database.php';

$picture_id = (int) $_GET['id'];
$ad_id = (int) $_GET['ad_id'];

$query = "SELECT * FROM slike s
          INNER JOIN oglasi o ON o.id=s.oglas_id
          WHERE s.id = $picture_id AND
          o.uporabnik_id = ".$_SESSION['user_id'];
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    mysqli_query($conn, "DELETE FROM slike WHERE id = $picture_id");
    header("Location: ad_view.php?id=$ad_id");
}

?>
