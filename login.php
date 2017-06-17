<?php
  require 'session.php';
 ?>

<head>
  	<title>Login</title>
</head>

 <body>
         <div class="login">
             <h1>Prijava</h1>
             <form method="post" action="login_action.php">
                 <input type="text" name="user-txt" placeholder="Username" required>
                 <input type="password" name="pass-txt" placeholder="Password" required>
                 <button type="submit" class="bt bt-h">Login</button>
             </form>

             <span><a href="registration.php">Registracija</a>
         </div>
     </body>

 <?php
   include_once 'footer.php'
  ?>
