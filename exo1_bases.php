
<?php

// Variables valides
$x = 10;
$_x = 20;
$Prix_HT = 100;
$état = "Maroc";

// Variables invalides :
// $2x : commence par un chiffre
// $x-y : contient un tiret
// $prix ht : contient un espace
// Différence entre $a et $A
$a = 5;
$A = 15;

echo "Valeur de a : " . $a . "<br>";
echo "Valeur de A : " . $A;

?>

<?php

require 'config.php';

echo "Etablissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil de réussite : " . SEUIL . "<br>";

var_dump(defined('SEUIL'));
echo "<br>";

var_dump(defined('INCONNUE'));
// Réponse : afficher une constante non définie provoque
// généralement un avertissement/erreur de constante indéfinie,
// et la valeur ne peut pas être affichée correctement.
// Différence : const définit une constante directement
// dans le code, tandis que define() la définit à l'exécution.



echo "<hr>Exercice 1.3<br>";

$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " &euro;";


echo "<hr>Exercice 1.4<br>";

$test = 42;
$test = (string) $test;

var_dump($test);

var_dump((int) 3.9); //int(3)
var_dump((int) "12abc");//int(12)
var_dump((float) "1.5e3");//float(1500)
var_dump((int) true);//int(1)


$decimal = 255;
$hexadecimal = 0xFF;
$octal = 0377;
$binary = 0b11111111;

echo "Decimal : " . $decimal . "<br>";
echo "Hexadecimal : 0xFF<br>";
echo "Octal : 0377<br>";
echo "Binary : 0b11111111<br>";


echo "<hr>Exercice 1.5<br>";

$traitees = "égales à";
$ici = 2;

// 1. Guillemets et apostrophes
echo "Ahmed a dit : \"J'ai réussi\"<br>";
// 2. Antislash
echo 'Voulez-vous supprimer C:\*.*?<br>';
// 3. Afficher \n tel quel
echo "Ceci n'affichera pas \n de nouvelle ligne<br>";
// 4. Variables non interprétées
echo 'Les variables ne seront pas $traitees $ici<br>';
// 5. Variables interprétées
echo "Les variables seront $traitees $ici<br>";
// Retirer les étoiles
$chaine = "*Bonjour les développeurs*";
echo trim($chaine, "*") . "<br>";
// Afficher chaque caractère sur une ligne
for ($i = 0; $i < mb_strlen($chaine); $i++) {
    echo htmlspecialchars(mb_substr($chaine, $i, 1)) . "<br>";
}





?>
