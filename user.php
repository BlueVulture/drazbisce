<?php
require 'header.php';
require 'database.php';

$id = (int) $_GET['id'];

$query = "SELECT upor_ime, ime, priimek, email FROM uporabniki WHERE id = $id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_array($result);
 ?>

 <div id="content">
   <div class="data" id="user-profile">
     <?php
        echo '<h2>'.$user['upor_ime'].'</h2>';
        echo '<p>'.$user['ime'].' '.$user['priimek'].'</p>';
        echo '<p>'.$user['email'].'</p>';

        echo '<p>Ocene:</p>';

        $query = "SELECT ocena FROM ocene WHERE prodajalec_id = $id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($result);

        echo '<p>'.$user['ocena'].'</p>';
      ?>


   </div>
 </div>

 <?php
include_once 'footer.php';
  ?>
