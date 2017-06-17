<?php
  require 'header.php';
 ?>

<head>
  	<title>Login</title>
</head>

 <body>
         <div class="login">
             <h1>Prijava</h1>
             <form method="post" action="login_action.php">
                 <input type="text" name="user" placeholder="Uporabnik" required>
                 <input type="password" name="pass" placeholder="Geslo" required>
                 <input type="submit" value="Login">
             </form>

             <span><a href="registration.php">Registracija</a>
         </div>
     </body>

 <?php
   include_once 'footer.php'
  ?>
