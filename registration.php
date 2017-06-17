<?php
  include_once 'header.php';
 ?>
<head>
  <title>Registration</title>
</head>

<h1>Registracija</h1>

<form action="user_new.php" method="post">
    <span class="user_input">
    Uporabniško ime: <input type="text" name="username"><br>
    Ime: <input type="text" name="first_name"><br>
    Priimek: <input type="text" name="last_name"><br>
    E-pošto: <input type="email" name="email" required><br>
    Geslo: <input type="password" name="pass1" required><br>
    Ponovi geslo: <input type="password" name="pass2" required><br>
    <input type="submit" name="submit" value="Pošlji">
    <input type="reset" name="reset" value="Prekliči">
    </span>
</form>

<?php
  include_once 'footer.php'
 ?>
