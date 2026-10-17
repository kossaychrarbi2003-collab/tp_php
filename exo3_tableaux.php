<?php
require_once 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "UML", "Probabilités"];

echo "<h2>Exercice 3.1 : Création</h2>";

echo "<h3>Avec foreach</h3>";
foreach ($modules as $module) {
    echo $module . "<br>";
}

echo "<h3>Avec les indices</h3>";
echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";

echo "<h2>Exercice 3.2 : Tableau HTML</h2>";

echo "<table border='1' cellpadding='6'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $couleur = ($note < SEUIL) ? "red" : "black";

    echo "<tr style='color: $couleur;'>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<h2>Exercice 3.3 : Statistiques</h2>";

$somme = 0;
$meilleure = null;
$plusFaible = null;

foreach ($notes as $note) {
    $somme += $note;

    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }

    if ($plusFaible === null || $note < $plusFaible) {
        $plusFaible = $note;
    }
}

$nombre = count($notes);
$moyenne = $somme / $nombre;

echo "Somme : $somme<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : $meilleure<br>";
echo "Plus faible note : $plusFaible<br>";
echo "<h3>Vérification avec les fonctions PHP</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre : " . count($notes) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";
echo "<h3>Effectifs par mention</h3>";

$effectifs = [];

foreach ($notes as $note) {
    $m = mention($note);

    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }

    $effectifs[$m]++;
}

foreach ($effectifs as $m => $nombre) {
    echo "$m : $nombre apprenant(s)<br>";
}

function afficher($tab) {
    echo "<table border='1' cellpadding='6'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";

    foreach ($tab as $nom => $note) {
        echo "<tr>";
        echo "<td>$nom</td>";
        echo "<td>$note</td>";
        echo "</tr>";
    }

    echo "</table><br>";
}
echo "<h2>Exercice 3.4 : Tri</h2>";

$tab = $notes;
ksort($tab);
echo "<h3>1. Noms croissants</h3>";
afficher($tab);

$tab = $notes;
arsort($tab);
echo "<h3>2. Notes décroissantes</h3>";
afficher($tab);

$tab = $notes;
krsort($tab);
echo "<h3>3. Noms décroissants</h3>";
afficher($tab);

$tab = $notes;
asort($tab);
echo "<h3>4. Notes croissantes</h3>";
afficher($tab);

echo "<h2>Exercice 3.5 : Opérateurs de tableaux</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<h3>Opérateur +</h3>";
var_dump($a + $b);

echo "<h3>Opérateur ==</h3>";
var_dump($a == $b);

echo "<h3>Opérateur ===</h3>";
var_dump($a === $b);
include 'includes/pied_inc.php';
?>