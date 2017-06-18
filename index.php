<?php
    require 'header.php';
    require 'database.php';

    $yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
    $current_date = date('Y-m-d', $yesterday);
    $tomorrow = date('Y-m-d H:i:s', strtotime(date('Y-m-d'). ' + 2 days'));

    // var_dump($current_date);
    // var_dump($tomorrow);

    $sql = "SELECT o.id, o.naslov, o.cena, k.naziv
            FROM oglasi o INNER JOIN kategorije k ON k.id=o.kategorija_id
            WHERE o.datum_k > $current_date
            ORDER BY o.datum_z DESC";

    $result = mysqli_query($conn, $sql);
?>
<div id="content">
  <div class="data" id="new-ads">
    <p>Najnovejše dražbe</p>
    <hr>
    <?php
    if($result)
    {

    }
    else
    {
      echo '<p>Hmmm... tu ni ničesar</p>';
    }
    while ($row = mysqli_fetch_array($result))
    {
      echo '<div class="oglas">';
      echo '<a href=ad_view.php?id='.$row['id'].'>';

      $slike = "SELECT * FROM slike WHERE oglas_id = ".$row['id'];
      $r = mysqli_query($conn, $slike);
      if (mysqli_num_rows($r) > 0)
      {
          $slika = mysqli_fetch_array($r);
          echo '<img src="'.$slika['url'].'" width="100px" />';
      }

      echo '</a>';
      echo '<a href=ad_view.php?id='.$row['id'].'><h3>'.$row['naslov'].'</h3></a>';
      echo "<b>".$row['cena']." € </b>";
      echo '<br>';
      echo "<i>".$row['naziv']."</i>";
      echo '<br>';
      echo '</div>';
    }
    ?>
  </div>

<?php
  $sql = "SELECT o.id, o.naslov, o.cena, k.naziv
          FROM oglasi o INNER JOIN kategorije k ON k.id=o.kategorija_id
          WHERE o.datum_k > $current_date AND o.datum_k < '$tomorrow'
          ORDER BY o.datum_k ASC";

          // var_dump($sql);

  $result = mysqli_query($conn, $sql);
 ?>

  <div class="data" id="special-ads">
    <p>Kmalu konec...</p>
    <hr>
    <?php
    if($result)
    {

    }
    else
    {
      echo '<p>Hmmm... tu ni ničesar</p>';
    }
    while ($row = mysqli_fetch_array($result))
    {
      echo '<div class="oglas">';
      echo '<a href=ad_view.php?id='.$row['id'].'>';

      $slike = "SELECT * FROM slike WHERE oglas_id = ".$row['id'];
      $r = mysqli_query($conn, $slike);
      if (mysqli_num_rows($r) > 0)
      {
          $slika = mysqli_fetch_array($r);
          echo '<img src="'.$slika['url'].'" width="100px" />';
      }

      echo '</a>';
      echo '<a href=ad_view.php?id='.$row['id'].'><h3>'.$row['naslov'].'</h3></a>';
      echo "<b>".$row['cena']." € </b>";
      echo '<br>';
      echo "<i>".$row['naziv']."</i>";
      echo '<br>';
      echo '</div>';
    }
    ?>
  </div>
</div>

<?php
  include_once 'footer.php';
?>
