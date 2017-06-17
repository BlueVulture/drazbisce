<?php
  require 'session.php';
 ?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Dražbišče</title>
    </head>

    <body>
      <div>
        <header>
          <h1>Dražbišče</h1>
          <div id="nav-bar">
                <div id="nav-bar-wrapper">
                    <ul>
                        <li><a href="#">Domov</a></li>
                        <li><a href="#">Dražbe</a></li>
                        <li><a href="#">Pomoč</a></li>
                    </ul>
                </div>
                <div id="search">
                </div>
            </div>
        </header>
        <?php
        if (isset($_SESSION['notice']) && !empty($_SESSION['notice']))
        {
            echo '<div id="notice">'.$_SESSION['notice'].'</div>';
            unset($_SESSION['notice']);
        }
        ?>
