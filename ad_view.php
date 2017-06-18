<?php
include_once 'header.php';
include_once 'database.php';

$ad_id = (int) $_GET['id'];

$query = "SELECT o.naslov, o.cena, o.datum_z, o.datum_k, o.opis, o.min_cena, k.naziv
          FROM oglasi o INNER JOIN kategorije k ON o.kategorija_id=k.id
          WHERE o.id = $ad_id";

$result = mysqli_query($conn, $query);
$ad = mysqli_fetch_array($result);

$query_bid = "SELECT ponudba
              FROM ponudbe
              WHERE oglas_id = $ad_id";

$result_bid = mysqli_query($conn, $query_bid);

?>

<div class="data" id="ad">
  <div id="ad-data">
    <?php
      echo '<h1>'.$ad['naslov'].'</h1>';
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

  <div id="ad-pictures">
  </div>
</div>

<?php
  include_once 'footer.php';
?>
