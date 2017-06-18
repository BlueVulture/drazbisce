<?php
  require 'session.php';
 ?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Dražbišče</title>

        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="functions.js"></script>
    </head>

    <body>
      <div id="page">
        <header>
          <h1>Dražbišče</h1>

          <div id="nav-bar">
                <div id="nav-bar-wrapper">
                    <ul>
                        <li><a href="index.php">Domov</a></li>
                        <?php
                          if(isset($_SESSION['user_id'])){
                            echo '<li><a href="ad_list.php">Dražbe</a></li>';
                          }
                         ?>
                        <li><a href="help.php">Pomoč</a></li>
                        <?php
                          if(isset($_SESSION['user_id'])){
                            echo '<li><a href="add_ad.php">Dodaj oglas</a></li>';
                          }
                         ?>
                    </ul>
                </div>
                <?php
                  if (isset($_SESSION['username']))
                  {
                    echo '<div id="user"><a id="user-link" href="user.php?id='.$_SESSION['user_id'].'">'
                    .$_SESSION['username'].'</a> (<a id="user-logout" href="logout.php">Odjava</a>)'.'</div>';
                  }
                  else
                  {
                    echo '<div id="user"><a id="user-link" href="login.php">Prijava</a></div>';
                  }
                 ?>
            </div>
        </header>
        <?php
        if (isset($_SESSION['notice']) && !empty($_SESSION['notice']))
        {
            echo '<div id="notice">'.$_SESSION['notice'].'</div>';
            unset($_SESSION['notice']);
        }
        ?>
