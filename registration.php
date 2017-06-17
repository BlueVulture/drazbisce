<?php
  include_once 'header.php';
 ?>

<div class="data">

  <h1>Registracija</h1>

  <table>
    <form action="user_new.php" method="post">
          <tr><td>Uporabniško ime:</td>
              <td><input type="text" name="username"></td>
          </tr>
          <tr><td>Ime:</td>
              <td><input type="text" name="first_name"></td>
          </tr>
          <tr><td>Priimek:</td>
              <td> <input type="text" name="last_name"></td>
          </tr>
          <tr><td>E-pošta:</td>
              <td><input type="email" name="email" required></td>
          </tr>
          <tr><td>Geslo:</td>
              <td><input type="password" name="pass1" required></td>
          </tr>
          <tr><td>Ponovi geslo:</td>
              <td><input type="password" name="pass2" required></td>
          </tr>
          <tr><td><button type="reset" name="reset">Prekliči</button></td><td><button type="submit" name="submit">Pošlji</button></td></tr>
    </form>
  </table>
</div>

<?php
  include_once 'footer.php'
 ?>
