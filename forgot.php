<?php
    require 'header.php';
 ?>
    
<div class="data">
    <h1>Pozabljeno geslo</h1>
     <span id="forgot">
     <form method="post" action="forgot_action.php">
         
         <p>Vpišite svoj e-poštni naslov. Če račun s takšnim naslovom obstaja vam bomo po e-pošti poslali povezavo za ponastavitev gesla.</p>
         
         <input type="email" name="email" placeholder="E-naslov" required>
         <br><br>
         <button type="submit">Pošlji</button>
     </form>
    </span>
</div>

<?php
    require 'footer.php';
?>