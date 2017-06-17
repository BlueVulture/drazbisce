<?php
  require 'header.php';
 ?>


 <div class="data">
     <h1>Prijava</h1>
     <span id="login">
     <form method="post" action="login_action.php">
         <input type="text" name="user" placeholder="Uporabnik" required>
         <br>
         <input type="password" name="pass" placeholder="Geslo" required>
         <br>
         <button type="submit">Prijava</button>
     </form>
    </span>

     <span><a href="registration.php">Registracija</a>
 </div>


 <?php
   include_once 'footer.php'
  ?>
