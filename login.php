<?php
  require 'session.php';
 ?>

 <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="styles/login_view.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
    </head>

 <body>
         <div class="login">
             <h1>LOGIN</h1>
             <form method="post" action="php/login_action.php">
                 <input type="text" name="user-txt" placeholder="Username" required>
                 <input type="password" name="pass-txt" placeholder="Password" required>
                 <div class="msg-div-hidden">Invalid username or password</div>
                 <button type="submit" class="bt bt-h">Login</button>
             </form>
         </div>
     </body>

 <?php
   include_once 'footer.php'
  ?>
