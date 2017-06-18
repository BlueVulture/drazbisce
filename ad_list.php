<?php
include_once 'header.php';
include_once 'database.php';

$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
$current_date = date('Y-m-d', $yesterday);

$sql = "SELECT a.id, a.title, a.price, c.name, a.enabled
      FROM ads a INNER JOIN categories c ON c.id=a.category_id
      WHERE a.date_e > '$curent_date'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result))
{
  echo '<div class="oglas">';
  echo '<a href=ad_view.php?id='.$row['id'].'>';

  $slike = "SELECT * FROM pictures WHERE ad_id = ".$row['id'];
  $r = mysqli_query($conn, $slike);
  if (mysqli_num_rows($r) > 0)
  {
      $slika = mysqli_fetch_array($r);
      echo '<img src="'.$slika['url'].'" width="100px" />';
  }

  echo '</a>';
  echo "<h3>".$row['title']."</h3>";
  echo "<b>".$row['price']." € </b>";
  echo '<br />';
  echo "<i>".$row['name']."</i>";
  echo '<br />';
  echo '<br />';
  echo '</div>';

  include_once 'footer.php';
?>
