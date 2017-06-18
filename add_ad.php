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
              <td><input type="num" name="min_price"></td>
          </tr>
          <tr><td>Tip izdelka:</td>
              <td><select name="type">
                <?php

                 ?>
              </select>
              </td>
          </tr>
          <tr><td>Kategorija Izdelka:</td>
              <td><td><select name="cat">

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
