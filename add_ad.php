<?php
    require 'header.php';
    require 'database.php';

    date_default_timezone_set('Europe/Ljubljana');
?>

<div id="content">
  <div class="data" id="ad-form">
    <h2>Dodaj oglas</h2>
    <form action="insert_ad.php" method="post" >
      <div id="ad-info">
        <table>
          <tr><td>Naslov:</td>
              <td><input type="text" name="title" required></td>
            </tr>
          <tr><td>Cena:</td>
              <td><input type="number" name="price" onchange="price_m();" id="price" required></td>
          </tr>
          <tr><td>Min. cena:</td>
              <td><input type="number" name="min_price" id="min_price"></td>
          </tr>
          <tr><td>Kategorija izdelka:</td>
              <td><select name="cat" required>
                <option disabled selected value>Izberite kategorijo...</option>
                <?php
                  $query = "SELECT id, naziv FROM kategorije;";
                  $result = mysqli_query($conn, $query);

                  while($row = mysqli_fetch_array($result))
                  {
                    echo '<option value="'.$row['id'].'">'.$row['naziv'].'</option>';
                  }
                 ?>
              </select>
              </td>
          </tr>
          <tr><td>Datum konca:</td>
              <td><input type="date" name="date_e" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days')); ?>"
                  max="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days')); ?>" min="<?php echo date('Y-m-d');?>" required></td>
          </tr>
          <tr><td id="desc-text">Opis:</td>
              <td><textarea id="desc-input" type="text" name="desc"></textarea></td>
          </tr>
          <tr><td><button type="reset">Prekliči</button></td>
              <td><button type="submit">Shrani</button></td>
          </tr>
        </table>
      </div>
      <!-- <div id="ad-media">
          <p>Dodajte sliko/-e (do 5):</p>
          <div id="pictures-containter">
          <input type="file" name="file"><br><br>
          </div>
          <button onclick="picture_slot();" type="button" id="add-pic-slot">Dodaj sliko</button>
        </form>
      </div> -->
    </form>
  </div>
</div>

<?php
  include_once 'footer.php';
?>
