<?php

// Expérience 1 : include
include 'fichier_inexistant.php';

echo "Suite du script avec include<br>";

// Expérience 2 : require
require 'fichier_inexistant.php';

echo "Suite du script avec require<br>";

?>
/*
include : affiche un avertissement si le fichier est absent,
mais le script continue généralement.

require : provoque une erreur fatale si le fichier est absent,
et le script s'arrête.
*/