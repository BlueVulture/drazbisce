<?php
include_once 'header.php';
include_once 'database.php';

error_reporting(0);
  $search = $_POST['search'];
  $category = $_POST['category'];
error_reporting(1);


$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
$current_date = date('Y-m-d', $yesterday);

if($search!="" && $category!="")
{
  $sql="SELECT o.id, o.naslov, o.cena, k.naziv, o.prodan
          FROM oglasi o INNER JOIN kategorije k ON k.id=o.kategorija_id
          WHERE o.datum_k > $current_date AND o.naslov LIKE '%$search%'
          AND o.kategorija_id =".(int)$category[0].";";

  $result = mysqli_query($conn, $sql);
  $_POST['search'] = "";
}
else
{
  $sql = "SELECT o.id, o.naslov, o.cena, k.naziv, o.prodan
          FROM oglasi o INNER JOIN kategorije k ON k.id=o.kategorija_id
          WHERE o.datum_k > $current_date";

  $result = mysqli_query($conn, $sql);
}

// var_dump((int)$category[0]);
// var_dump($sql);
?>

<div class="data" id="search">
  <form method="post" action="ad_list.php">
    <p>Poišči dražbe:</p><input type="text" name="search">
    <p>Kategorije:</p>
    <?php
    $cat_query = "SELECT id, naziv FROM kategorije;";
    $cat_result = mysqli_query($conn, $cat_query);

    while($cat = mysqli_fetch_array($cat_result))
    {
      echo '<input type="radio" name="category" value="'.$cat['id'].'">'.$cat['naziv'].'<br>';
    }
     ?>
     <button type="submit">Išči</button>
  </form>
  <form method="post" action="ad_list.php">
    <input type="hidden" name="search" value="">
    <input type="hidden" name="category" value="">
    <button type="submit">Počisti izbiro</button>
  </form>
</div>

<div class="data" id="ads-display">
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
    if($row['prodan']!=1)
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
}
?>
  </div>
<?php
  include_once 'footer.php';
?>
