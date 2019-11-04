<?php
require 'verse.php';

$verse = new Verse('99 s');
echo '<h4 style="color:blue;">Jouons la chanson: "99 shooters sans alcool."</h4>';

$verse->playVerse();//calling the method from the class to get started in the index



?>

</body>
</html>
<!--to avoid serious risks of cross-site scripting (XSS)("htmlspecialchars($_SERVER['PHP_SELF']") -->
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    <!-- field form to inform the choice of the user -->
    <input type="text" placeholder="Numéro de couplet" name="player_choice" />

    <!-- creation of the submitted button to pass on the class "Chorus" and begin the methods orders -->
    <input type="submit" value="Afficher le couplet !" />
</form>


