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

      //   echo '<p>Ocene:</p>';
      //
      //   $query = "SELECT ocena FROM ocene WHERE prodajalec_id = $id";
      //   $result = mysqli_query($conn, $query);
      //   while($user = mysqli_fetch_array($result))
      //   {
      //     $five = 0;
      //     $four = 0;
      //     $three = 0;
      //     $two = 0;
      //     $one = 0;
      //
      //     switch($user['ocena'])
      //     {
      //       case 1:
      //         $one = $one +1;
      //         break;
      //       case 2:
      //         $two = $two +1;
      //         break;
      //       case 3:
      //         $three = $three +1;
      //         break;
      //       case 4:
      //         $four = $four +1;
      //         break;
      //       case 5:
      //         $five = $five +1;
      //         break;
      //     }
      //
      //     echo '5: '.$five.'<br>';
      //     echo '4: '.$four.'<br>';
      //     echo '3: '.$three.'<br>';
      //     echo '2: '.$two.'<br>';
      //     echo '1: '.$one.'<br><br>';
      //   }
      ?>
      <!-- // <form action="review.php" method="post">
      //   <input type="radio" name="grade" value="5">5<br>
      //   <input type="radio" name="grade" value="4">4<br>
      //   <input type="radio" name="grade" value="3">3<br>
      //   <input type="radio" name="grade" value="2">2<br>
      //   <input type="radio" name="grade" value="1">1<br>
      //   <input type="submit"  value="Pošlji">
      // </form> -->

   </div>
 </div>

 <?php
include_once 'footer.php';
  ?>
