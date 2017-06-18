<?php
include_once 'header.php';
include_once 'database.php';

$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
$current_date = date('Y-m-d', $yesterday);

$sql = "SELECT o.id, o.naslov, o.cena, k.naziv
        FROM oglasi o INNER JOIN kategorije k ON k.id=o.kategorija_id
        WHERE o.datum_k > $current_date";

$result = mysqli_query($conn, $sql);
?>

<div class="data" id="search">
  <form method="post" action="">
    <p>Poišči dražbe:</p><input type="text" name="search">
    <p>Kategorije:</p>
    <?php
    $cat_query = "SELECT id, naziv FROM kategorije;";
    $cat_result = mysqli_query($conn, $cat_query);

    while($cat = mysqli_fetch_array($cat_result))
    {
      echo '<input type="checkbox" name="category" value="'.$cat['id'].'">'.$cat['naziv'].'<br>';
    }
     ?>
     <button type="submit">Išči</button>
  </form>
</div>

<div class="data" id="ads-display">
<?php
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
  include_once 'footer.php';
?>
