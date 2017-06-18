<?php
include_once 'header.php';
include_once 'database.php';

$ad_id = (int) $_GET['id'];

$query = "SELECT o.naslov, o.cena, o.datum_z, o.datum_k, o.opis, o.min_cena, k.naziv, o.uporabnik_id
          FROM oglasi o INNER JOIN kategorije k ON o.kategorija_id=k.id
          WHERE o.id = $ad_id";

$result = mysqli_query($conn, $query);
$ad = mysqli_fetch_array($result);

$query_bid = "SELECT ponudba
              FROM ponudbe
              WHERE oglas_id = $ad_id";

$result_bid = mysqli_query($conn, $query_bid);

$user_query = "SELECT upor_ime FROM uporabniki WHERE id = ".$ad['uporabnik_id']."";

$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_array($user_result);
?>

<div class="data" id="ad">
  <div id="ad-data">
    <?php
      echo '<h1>'.$ad['naslov'].'</h1>';
      echo '<b>Prodajalec:</b> <a id="user-link" href="user.php?id='.$ad['uporabnik_id'].'">'.$user['upor_ime'].'</a>';
      echo '<p><b>Izklicna cena: </b>'.$ad['cena'].' €</p>';

      if($bid = mysqli_fetch_array($result_bid))
      {
        echo '<p><b>Trenutna ponudba: </b>'.$bid['ponudba'].' €</p>';
      }
      else
      {
        echo '<p><b>Trenutna ponudba: </b>0 €</p>';
      }

      $query_bid = "SELECT ponudba
                    FROM ponudbe
                    WHERE oglas_id = $ad_id AND uporabnik_id = ".$_SESSION['user_id'].";";

      $result_bid = mysqli_query($conn, $query_bid);

      if($bid = mysqli_fetch_array($result_bid))
      {
        echo '<p><b>Vaša ponudba: </b>'.$bid['ponudba'].' €</p>';

      }
      else
      {
        echo '<p><b>Vaša ponudba: </b>0 €</p>';
      }

      echo '<form action="bid.php" method="post">';
      echo '<input type="hidden" name="id" value="'.$ad_id.'">';
      echo 'Oddajte ponudbo: <input type="number" name="bid"><button type="submit">Pošlji</button>';
      echo '</form>';
      echo '<p id="ad-desc-text">'.$ad['opis'].'</p>';
     ?>
  </div>

  <div id="ad-media">
    <?php
      echo '<b>Oglas velja do: </b>';
      echo $ad['datum_k'];
      echo '<br><br>';


      if ($_SESSION['user_id'] == $ad['uporabnik_id'])
      {
        echo 'Naloži slike: <br>';
    ?>
      <form action="add_picture.php" method="post" enctype="multipart/form-data" id="nalozi-slike">
          <input type="hidden" name="id" value="<?php echo $ad_id; ?>">
          <input type="file" name="file">
          <input type="submit" value="Naloži">
      </form>
    <?php
        }
        else {
          echo 'Slike: <br>';
        }

     $query = "SELECT * FROM slike
             WHERE oglas_id = '$ad_id'";
     $result = mysqli_query($conn, $query);

     if (mysqli_num_rows($result) == 0)
     {
     }
     else
     {
         while ($picture = mysqli_fetch_array($result)) {
             echo '<div class="pic-wrap">';
             if ($_SESSION['user_id'] == $ad['uporabnik_id']) {
                 echo '<a href="delete_picture.php?id='.$picture['id'].'&ad_id='.$ad_id.'"
                 class="delete-pic" onclick="return confirm(\'Ali ste prepričani?\');">Izbriši</a>';
             }
             echo '<a data-fancybox="gallery" href="' . $picture['url'] . '">
                   <img src="' . $picture['url'] . '" alt="slika" width="120" />
                   </a>';

             echo '</div>';
         }
     }
     ?>
     <div id="ad-buttons">

     </div>
  </div>
</div>

<?php
  include_once 'footer.php';
?>
