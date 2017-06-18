<?php
include_once 'header.php';
include_once 'database.php';

$ad_id = (int) $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM oglasi
        WHERE id=$ad_id AND uporabnik_id=$user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 1) {
    header("Location: ad_list.php");
    die();
}

$ad = mysqli_fetch_array($result);

$query_ad = "SELECT naslov, cena, min_cena, kategorija_id, datum_k, opis FROM oglasi WHERE id = $ad_id";
$result_ad = mysqli_query($conn, $query_ad);

$ad_data = mysqli_fetch_array($result_ad);

?>
<div class="data" id="ad-form">
  <h2>Uredi oglas</h2>
  <form action="update_ad.php" method="post" >
    <input type="hidden" name="id" value="<?php echo $ad_id;?>">
    <div id="ad-info">
      <table>
        <tr><td>Naslov:</td>
            <td><input type="text" name="title" value="<?php echo $ad_data['naslov'];?>" required></td>
          </tr>
        <tr><td>Cena:</td>
            <td><input type="number" name="price" onchange="price_m();" id="price" value="<?php echo $ad_data['cena'];?>" required></td>
        </tr>
        <tr><td>Min. cena:</td>
            <td><input type="number" name="min_price" id="min_price" value="<?php echo $ad_data['min_cena'];?>"></td>
        </tr>
        <tr><td>Kategorija izdelka:</td>
            <td><select name="cat" required>
              <option disabled selected value>Izberite kategorijo...</option>
              <?php
                $query = "SELECT id, naziv FROM kategorije;";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result))
                {
                  if($row['id'] = $ad_data['kategorija_id'])
                  {
                    echo '<option value="'.$row['id'].'" selected>'.$row['naziv'].'</option>';
                  }
                  else
                  {
                    echo '<option value="'.$row['id'].'">'.$row['naziv'].'</option>';
                  }

                }
               ?>
            </select>
            </td>
        </tr>
        <tr><td>Datum konca:</td>
            <td><input type="date" name="date_e" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days')); ?>"
                max="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days')); ?>" min="<?php echo date('Y-m-d');?>"
                required></td>
        </tr>
        <tr><td id="desc-text">Opis:</td>
            <td><textarea id="desc-input" type="text" name="desc" ><?php echo $ad_data['opis'];?></textarea></td>
        </tr>
        <tr><td><button type="reset">Prekliči</button></td>
            <td><button type="submit">Shrani</button></td>
        </tr>
      </table>
    </div>
  </form>
</div>
