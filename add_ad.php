<?php
    require 'header.php';
    require 'database.php'
?>

<div id="content">
  <div class="data" id="ad-form">
    <form action="insert_ad" method="post">
      <div id="ad-info">
        <table>
          <tr><td>Naslov:</td>
              <td><input type="text" name="title" required></td>
            </tr>
          <tr><td>Cena:</td>
              <td><input type="number" name="price" required></td>
          </tr>
          <tr><td>Min. cena:</td>
              <td><input type="number" name="min_price"></td>
          </tr>
          <tr><td>Tip izdelka:</td>
              <td><select id="type" name="type" onchange="select_cat()">
                <option disabled selected value>Izberite tip...</option>
                <?php
                  $query = "SELECT id, naziv FROM tipi;";
                  $result = mysqli_query($conn, $query);

                  while($row = mysqli_fetch_array($result))
                  {
                    echo '<option value="'.$row['id'].'">'.$row['naziv'].'</option>';
                  }
                 ?>
              </select>
              </td>
          </tr>
          <tr><td>Kategorija Izdelka:</td>
              <td><select id="cat" name="cat">
                <option disabled selected value>Izberite kategorijo...</option>
                <?php
                  $type_id = $_POST['type'];

                  $query = "SELECT id, naziv FROM kategorije WHERE tip_id='$type_id'";
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
                  max="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days')); ?>" required></td>
          </tr>
          <tr><td id="desc-text">Opis:</td>
              <td><textarea id="desc-input" type="text" name="desc"></textarea></td>
          </tr>
        </table>
      </div>
      <div id="ad-media">
          <p>Dodajte sliko/-e (do 5):</p>
          <div id="pictures-containter">
          <input type="file" name="file1"><br><br>
          </div>
          <button onclick="picture_slot();" type="button" id="add-pic-slot">Dodaj sliko</button>

        </form>
      </div>
    </from>
  </div>
</div>

<?php
  include_once 'footer.php';
?>
