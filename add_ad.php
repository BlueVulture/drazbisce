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
          <p>Dodajte sliko/-e:</p>
          <input type="file" name="file">

        </form>
      </div>
    </from>
  </div>
</div>

<?php
  include_once 'footer.php';
?>
