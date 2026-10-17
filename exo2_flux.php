<?php
require_once 'config.php';

echo "<h2>Exercice 2.1 : Mention</h2>";

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

$notes = [18, 15, 13, 10, 7];

foreach ($notes as $note) {
    echo "Note : $note / 20 — Mention : " . mention($note) . "<br>";
}
?>

<?php
echo "<h2>Exercice 2.2 : Switch</h2>";

$mois = date("m");

switch ($mois) {
    case "01": $nomMois = "Janvier"; break;
    case "02": $nomMois = "Février"; break;
    case "03": $nomMois = "Mars"; break;
    case "04": $nomMois = "Avril"; break;
    case "05": $nomMois = "Mai"; break;
    case "06": $nomMois = "Juin"; break;
    case "07": $nomMois = "Juillet"; break;
    case "08": $nomMois = "Août"; break;
    case "09": $nomMois = "Septembre"; break;
    case "10": $nomMois = "Octobre"; break;
    case "11": $nomMois = "Novembre"; break;
    case "12": $nomMois = "Décembre"; break;
    default: $nomMois = "Mois inconnu";
}

echo "Mois actuel : " . $nomMois . "<br>";
?>

<?php
echo "<h2>Exercice 2.3.1 : Triangle</h2>";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>
<?php
echo "<h3>Exercice 2.3.2 : While</h3>";

$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
}
?>
<?php
echo "<h3>Exercice 2.3.3 : Continue</h3>";

for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo "$i<br>";
}
?>
<?php
echo "<h3>Exercice 2.3.4 : Break 2</h3>";

$i = 1;

while ($i <= 15) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}
?>
<?php
echo "<h3>Exercice 2.3.5 : Do-while</h3>";

$i = 0;

do {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
} while ($i <= 20);
?>